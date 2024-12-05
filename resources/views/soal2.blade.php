@extends('layouts.app')

@section('title', 'Soal 2')

@push('css')
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Soal 2</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <form action="{{ route('soal2-process') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Input 1 <span class="text-danger">*</span></label>
                                        <input name="input1" type="text" class="form-control">
                                    </div>
            
                                    <div class="form-group">
                                        <label>Input 2 <span class="text-danger">*</span></label>
                                        <input name="input2" type="text" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Process</button>
                                </form>
                            </div>
                            <div class="col-5">
                                <b>Rule :</b> <br>
                                <small>Buat suatu fitur untuk pengecekan dua free input dari user, dan system akan menghitung berapa persen karakter dari input pertama ada di input kedua dan akan dimunculkan ke user.</small>
                                <b class="d-block">Contoh:</b>
                                <ul>
                                    <li>Input 1: ABBCD</li>
                                    <li>Input 2: Gallant Duck</li>
                                </ul>
                                <small>Karena karakter A dan D ada muncul di Gallant Duck, berarti 2 / 5 karakter (ABBCD = 5 karakter) itu muncul di input kedua, maka hasil = 40%</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-body">
                        <b class="d-block">Result : </b>

                        <ul>
                            <li>Input 1 : <b>{{ $input1 ?? '...' }}</b></li>
                            <li>Input 2 : <b>{{ $input2 ?? '...' }}</b></li>
                        </ul>

                        <div>Jumlah Karakter yang Ditemukan : <br>
                            ({{ isset($processing_data) ? implode('', $processing_data['data_array']) : '...'  }}) <b>{{ $processing_data['data_array_count'] ?? '...' }}</b> / <b>{{ $raw_data['input_length'] ?? '...' }} </b> ({{ $input1 ?? '...' }})
                        </div>
                        <div class="mt-3">Hasil : {{ $processing_data['persentage_count'] ?? '...' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection