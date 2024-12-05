@extends('layouts.app')

@section('title', 'Laporan Penjualan')

@push('css')
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan Penjualan</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
				<div class="card-body">
                    <form action="{{ route('sales.item.laporan-penjualan') }}" method="get">
                        <div class="col-6">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Month</label>
                                    <select class="form-control" name="month" style="cursor: pointer">
                                        <option value="" selected disabled>Pilih Bulan</option>
                                        <option value="1" {{ request()->get('month') == 1 ? 'selected' : '' }}>January</option>
                                        <option value="2" {{ request()->get('month') == 2 ? 'selected' : '' }}>February</option>
                                        <option value="3" {{ request()->get('month') == 3 ? 'selected' : '' }}>March </option>
                                        <option value="4" {{ request()->get('month') == 4 ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ request()->get('month') == 5 ? 'selected' : '' }}>May</option>
                                        <option value="6" {{ request()->get('month') == 6 ? 'selected' : '' }}>June</option>
                                        <option value="7" {{ request()->get('month') == 7 ? 'selected' : '' }}>July</option>
                                        <option value="8" {{ request()->get('month') == 8 ? 'selected' : '' }}>August</option>
                                        <option value="9" {{ request()->get('month') == 9 ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ request()->get('month') == 10 ? 'selected' : '' }}>October</option>
                                        <option value="11" {{ request()->get('month') == 11 ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ request()->get('month') == 12 ? 'selected' : '' }}>December</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Year</label>
                                    <select class="form-control" name="year" style="cursor: pointer">
                                        <option value="" selected disabled>Pilih Tahun</option>
                                        <option value="2023" {{ request()->get('year') == 2023 ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ request()->get('year') == 2024 ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ request()->get('year') == 2025 ? 'selected' : '' }}>2025</option>
                                        <option value="2026" {{ request()->get('year') == 2026 ? 'selected' : '' }}>2026</option>
                                        <option value="2027" {{ request()->get('year') == 2027 ? 'selected' : '' }}>2027</option>
                                        <option value="2028" {{ request()->get('year') == 2028 ? 'selected' : '' }}>2028</option>
                                        <option value="2029" {{ request()->get('year') == 2029 ? 'selected' : '' }}>2029</option>
                                        <option value="2030" {{ request()->get('year') == 2030 ? 'selected' : '' }}>2030</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary" style="height: calc(2.25rem + 6px);">Filter</button>
                                    <a href="{{ route('sales.item.laporan-penjualan') }}" class="btn btn-warning ml-1 reset-filter" style="height: calc(2.25rem + 6px);">Reset Filter</a>
                                </div>
                            </div>
                        </div>
                    </form>
					<table class="table table-striped table-hover" id="laporan_penjualan_table" data-table-route="{{ route('datatables.sales.laporan-penjualan', ['month' => request()->get('month'), 'year' => request()->get('year') ]) }}">
						<thead>
							<tr>
								<th width="25%">Item Name</th>
								<th width="15%">Stock Remaining</th>
								<th width="15%">Total Sold</th>
								<th width="25%">Total Income</th>
								<th width="20%">Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            generateDatatables()
        })

        function generateDatatables()
		{
			$('#laporan_penjualan_table').DataTable({
				processing: true,
				serverSide: true,
				bDestroy: true,
				ordering: false,
				ajax: $('#laporan_penjualan_table').data('table-route'),
				lengthMenu: [5, 10, 25, 50, 100],
				columnDefs: [{
					// "targets": [0],
					// "visible": false,
					// "searchable": false
				}],
				"order": [
					[0, "asc"]
				],
				columns: [
					{ data: 'name', name: 'name' , orderable: false, searchable: true},
					{ data: 'stock', name: 'stock' , orderable: false, searchable: true},
					{ data: 'total_quantity', name: 'total_quantity' , orderable: false, searchable: true},
					{ data: 'total_revenue_formatted', name: 'total_revenue' , orderable: false, searchable: true},
					{ data: 'low_sales_formatted', name: 'low_sales' , orderable: false, searchable: true},
				],
				language: {

				}
			});
		}
    </script>
@endpush