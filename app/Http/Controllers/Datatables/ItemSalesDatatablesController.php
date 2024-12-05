<?php

namespace App\Http\Controllers\datatables;

use App\Http\Controllers\Controller;
use App\Models\Master\Item;
use App\Models\Sales\ItemSales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemSalesDatatablesController extends Controller
{
    /**
     * 
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function datalist(Request $request) {
        $data = ItemSales::orderBy('id')->with('item', function($q) {
            $q->select('id','name');
        })->select('id', 'item_id', 'quantity', 'total', 'discount', 'created_at');

        return datatables($data)
            ->addColumn('total_formatted', function($item_sales) {
                return  "Rp. " . number_format($item_sales->total,0,'.','.');
            })
            ->addColumn('discount_formatted', function($item_sales) {
                return  $item_sales->discount . "%";
            })
            ->addColumn("transaction_date", function($item_sales) {
                return Carbon::parse($item_sales->created_at)->format("d F Y");
            })
            ->addColumn('actions', function($item) {
                $edit_button = "<a href='". route('item.edit', $item->id) ."' class='btn btn-icon btn-primary'><i class='fas fa-edit'></i></a>";
                $delete_button = "<button id='delete_button' class='btn btn-icon btn-danger' data-delete-route='" . route('item.destroy', ':id') . "'><i class='fas fa-trash'></i></button>";

                return "
                    <div class='button'>
                        {$edit_button} {$delete_button}
                    </div>
                ";
            })
            ->escapeColumns([])
            ->make();
    }

    public function laporanPenjualanDatalist(Request $request) {
        $laporan = [];
        $items = Item::all();

        // dd(Carbon::parse(11)->format('M'));
        // dd($items[1]->itemSales, Carbon::parse($items[1]->itemSales[0]->created_at)->format('Y'));

        foreach ($items as $item) {
            $total_quantity = 0;
            $total_revenue = 0;
            $low_sales = false;

            foreach ($item->itemSales as $item_sales) {
                // Filter by month & year
                if ($request->has('month') && $request->has('year')) {
                    if (Carbon::parse($item_sales->created_at)->format('m') == $request->get('month') &&
                        Carbon::parse($item_sales->created_at)->format('Y') == $request->get('year')) {
                            $total_quantity += $item_sales->quantity;
                            $total_revenue += $item_sales->total;
                    }
                } else {
                    // Calculate all data
                    $total_quantity += $item_sales->quantity;
                    $total_revenue += $item_sales->total;
                }
            }

            // filter data by sales
            if ($total_quantity > 0) {
                if ($total_quantity > 10) {
                    $low_sales = true;
                }
            }

            $laporan[] = [
                'name' => $item->name,
                'stock' => $item->stock,
                'total_quantity' => $total_quantity,
                'total_revenue' => $total_revenue,
                'low_sales' => $low_sales,
            ];
        }

        return datatables($laporan)
            ->addColumn('total_revenue_formatted', function ($item_sales) use ($request) {
                return "Rp. " . number_format($item_sales['total_revenue'], 0);
            })
            ->addColumn('low_sales_formatted', function ($item_sales) use ($request) {
                if ($item_sales['low_sales']) {
                    return "<span class='badge badge-success'>High Sales</span>";
                } else {
                    return "<span class='badge badge-danger'>Low Sales</span>";
                }
            })
            ->escapeColumns([])
            ->make();

        // dd($item, $laporan);
    }


    /**
     * Diguanakn untuk generate bulan berdasarkan nomer
     * 
     * @param mixed $month_number
     * @return string
     */
    private function generateMonthNumber($month_number) {
        if ($month_number == 1) {
            return "January";
        } else if ($month_number == 2) {
            return "February";
        } else if ($month_number == 3) {
            return "March";
        } else if ($month_number == 4) {
            return "April";
        } else if ($month_number == 5) {
            return "May";
        } else if ($month_number == 6) {
            return "June";
        } else if ($month_number == 7) {
            return "July";
        } else if ($month_number == 8) {
            return "August";
        } else if ($month_number == 9) {
            return "September";
        } else if ($month_number == 10) {
            return "October";
        } else if ($month_number == 11) {
            return "November";
        } else if ($month_number == 12) {
            return "December";
        }
    }
}
