<?php

namespace App\Http\Controllers;

use App\Models\Master\Item;
use App\Models\Sales\ItemSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales.item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = Item::select('id', 'name', 'stock', 'price')->get();

        return view('sales.item.create', [
            'item' => $item
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation_input = $this->customValidation($request);

        // Validation checking
        if ($validation_input->fails()) {
            return redirect()
                ->route('sales.item.create')
                ->with('alert_type', 'error')
                ->with('message', 'Something wrong')
                ->withErrors($validation_input->messages())
                ->withInput();
        }

        $total = $request->item_buy * $request->price;
        $discount = $this->discountValidation($request->item_buy, $total);

        // Add data to database
        ItemSales::create([
            'item_id'  => $request->item,
            'quantity' => $request->item_buy,
            'total'    => $discount['total'],
            'discount' => $discount['discount'],
        ]);

        // Reduce Stock & redirect
        if (Item::where('id', $request->item)->first()->reduceStock($request->item_buy)) {
            return redirect()->route('sales.item.index')
                ->with('alert_type', 'success')
                ->with('message', 'Item Transaction Successfully Added');
        }

        return redirect()->route('sales.item.index')
            ->with('alert_type', 'error')
            ->with('message', 'Something Wrong');
    }

    public function laporanPenjualan(Request $request) {
        $item = Item::where('id', 3)->with('itemSales')->first();

        // dd($item, $item->itemSales);

        return view('sales.item.laporan_penjualan');
    }

    public function monitoringStock(Request $request) {
        return view('sales.item.monitoring_stock');
    }

    /**
     * Digunakan untuk custom validation
     * 
     * @param mixed $request
     * @param mixed $type
     * @return \Illuminate\Validation\Validator
     */
    private function customValidation($request, $type = 'store')
    {
        $get_stock = Item::where('id', $request->item)->select('stock')->first();

        $validation = [
            'item'      => ['required'],
            'item_buy'  => ['required','numeric', 'max:' . $get_stock->stock],
        ];

        return Validator::make($request->all(), $validation, [
        ]);
    }

    
    /**
     * Digunakan untuk validasi dan menghitung diskon
     * 
     * @param mixed $quantity
     * @param mixed $total
     * @return array
     */
    private function discountValidation($quantity, $total) {
        // Diskon akan diberikan, jika : 
        //  - Membeli > 20 <=> 10%
        //  - Membeli > 50 <=> 12%
        //  - Membeli > 100 <=> 15%

        if ($quantity > 20) {
            return [
                'total' => $total - ($total * 0.1),
                'discount' => 10 
            ];
        
        } else if ($quantity > 50) {
            return [
                'total' => $total - ($total * 0.12),
                'discount' => 12 
            ];
            
        } else if( $quantity > 100) { 
            return [
                'total' => $total - ($total * 0.15),
                'discount' => 15
            ];
        }

        return [
            'total' => $total,
            'discount' => 0
        ];
    }
}
