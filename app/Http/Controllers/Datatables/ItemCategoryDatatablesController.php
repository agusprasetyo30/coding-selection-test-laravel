<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Master\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryDatatablesController extends Controller
{
    /**
     * Summary of datalist
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function datalist(Request $request) {
        
        $data = ItemCategory::orderBy('id')->select('id', 'name');

        return datatables($data)
            ->addColumn('actions', function($item_category) {
                $edit_button = "<a href='". route('item-category.edit', $item_category->id) ."' class='btn btn-icon btn-primary'><i class='fas fa-edit'></i></a>";
                $delete_button = "<button id='delete_button' class='btn btn-icon btn-danger' data-delete-route='" . route('item-category.destroy', ':id') . "'><i class='fas fa-trash'></i></button>";

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
