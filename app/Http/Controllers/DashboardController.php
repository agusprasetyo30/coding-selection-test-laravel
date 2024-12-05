<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function soal2View(Request $request) {
        return view('soal2');
    }

    /**
     * Digunakan untuk memproses data pada soal nomer 2
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function soal2Process(Request $request) {
        // Memproses data input 1 menjadi array
        $raw_data = $this->getInputArrayProcessing($request->input1);

        // melakukan perhitungan terhadap input 1 yang sudah diolah dan input 2 
        $processing_data = $this->getArrayImplementationCount($request->input1, $request->input2);

        return view('soal2', [
            'input1' => $request->input1,
            'input2' => $request->input2,
            'raw_data' => $raw_data,
            'processing_data' => $processing_data
        ]);        
    }

    /**
     * Digunakan untuk filtering dan pemrosesan data array dari input yang diberikan 
     * 
     * @param mixed $input
     * @return array
     */
    private function getInputArrayProcessing($input) {
        $input_length = Str::length($input);
        $array_data = array_values(array_unique(str_split($input ))); // Split input & get unique data

        return [
            'input_length' => $input_length,
            'array_input' => $array_data
        ];
    }

    
    
    /**
     * Digunakan untuk menghitung perhitungan berdasarkan data array yang diberikan 
     * 
     * @param mixed $input1
     * @param mixed $input2
     * @return array
     */
    private function getArrayImplementationCount($input1, $input2) {
        $get_array_processing = $this->getInputArrayProcessing($input1);
        $get_array_constain = [];

        // Mengecek data per huruf pada input1 ke kalimat input2
        foreach ($get_array_processing['array_input'] as $char) {
            if (Str::of($input2)->contains($char)) {
                array_push($get_array_constain, $char);
            }
        }

        // Menghitung persentase berdasarkan huruf yang ditemukan
        $array_count = count($get_array_constain);
        $persentage_count = ($array_count / $get_array_processing['input_length']) * 100;

        return [
            'persentage_count' => number_format($persentage_count, 2) . '%',
            'data_array_count' => $array_count,
            'data_array'       => $get_array_constain
        ];
    }


}
