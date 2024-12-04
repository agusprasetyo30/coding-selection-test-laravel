<?php

namespace App\Http\Controllers;

use App\Models\Master\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.item-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.item-category.create');
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
                ->route('item-category.create')
                ->withErrors($validation_input->messages())
                ->withInput();
        }

        ItemCategory::create($request->all());

        return redirect()->route('item-category.index')
            ->with('alert_type', 'success')
            ->with('message', 'Add Item Category successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCategory $itemCategory)
    {
        return view('master.item-category.edit', [
            'item_category' => $itemCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemCategory $itemCategory)
    {
        $validation_input = $this->customValidation($request);

        // Validation checking
        if ($validation_input->fails()) {
            return redirect()
                ->route('item-category.create')
                ->withErrors($validation_input->messages())
                ->withInput();
        }

        $itemCategory->update(['name' => $request->name]);

        return redirect()->route('item-category.index')
            ->with('alert_type', 'success')
            ->with('message', 'Update item category successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemCategory $itemCategory)
    {
        $itemCategory->delete();

        return $this->success($itemCategory, "Delete item category successfully");
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
        $validation = [
            'name'     => ['required'],
        ];

        return Validator::make($request->all(), $validation, []);
    }
}
