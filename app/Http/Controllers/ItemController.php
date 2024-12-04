<?php

namespace App\Http\Controllers;

use App\Models\Master\Item;
use App\Models\Master\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("master.item.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master.item.create", [
            'item_category' => ItemCategory::select('id', 'name')->get()
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
                ->route('item.create')
                ->withErrors($validation_input->messages())
                ->withInput();
        }

        Item::create($request->all());

        return redirect()->route('item.index')
            ->with('alert_type', 'success')
            ->with('message', 'Add Item successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('master.item.edit', [
            'item_category' => ItemCategory::select('id', 'name')->get(),
            'item'          => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validation_input = $this->customValidation($request);

        // Validation checking
        if ($validation_input->fails()) {
            return redirect()
                ->route('item.create')
                ->withErrors($validation_input->messages())
                ->withInput();
        }

        $item->update($request->all());

        return redirect()->route('item.index')
            ->with('alert_type', 'success')
            ->with('message', 'Update item successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return $this->success($item, "Delete item successfully");
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
            'name'              => ['required'],
            'price'             => ['required','numeric', 'min:0'],
            'stock'             => ['required','numeric','min:1'],
            'item_category_id'  => ['required'],
        ];

        return Validator::make($request->all(), $validation, [
            'item_category_id.required' => "Category field cannot be empty"
        ]);
    }
}
