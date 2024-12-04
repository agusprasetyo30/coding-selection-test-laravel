<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Master\Item;
use Illuminate\Http\Request;

class ItemDatatablesController extends Controller
{
    /**
     * 
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function datalist(Request $request) {
        $data = Item::orderBy('id')->with('itemCategory', function($q) {
            $q->select('id','name');
        })->select('id', 'name', 'stock', 'price', 'item_category_id');

        return datatables($data)
            ->addColumn('price_formatted', function($item) {
                return  "Rp. " . number_format($item->price,0,'.','.');
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
}
