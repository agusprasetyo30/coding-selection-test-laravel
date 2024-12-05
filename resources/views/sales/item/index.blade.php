@extends('layouts.app')

@section('title', 'Sales Item Transaction')

@push('css')
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sales Item Transaction</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
				<div class="card-header">
					{{-- <h4>Item Tra</h4> --}}
					<div class="card-header-action">
						{{-- @can('create-user') --}}
							<a href="{{ route('sales.item.create') }}" class="btn btn-primary">
								<i class="fa fa-plus"></i>
								<span> Add Item Transaction</span>
							</a>
						{{-- @endcan --}}
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped table-hover" id="sales_item_table" data-table-route="{{ route('datatables.sales.item') }}">
						<thead>
							<tr>
								<th width="25%">Item Name</th>
								<th width="13%">Quantity</th>
								<th width="20%">Total</th>
								<th width="17%">Discount</th>
								<th width="25%">Transaction Date</th>
								{{-- <th width="15%"></th> --}}
							</tr>
						</thead>
                        {{-- <tbody>
                            <tr>
                                <td>Sikat Gigi Pepsodent</td>
                                <td>10</td>
                                <td>Rp. 80,000</td>
                                <td>0%</td>
                                <td>10 Januari 2024</td>
                                <td>
                                    <div class="button">
                                        <a href="http://localhost:8000/item/2/edit" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a> <button id="delete_button" class="btn btn-icon btn-danger" data-delete-route="http://localhost:8000/item/:id"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sikat Gigi Pepsodent</td>
                                <td>10</td>
                                <td>Rp. 80,000</td>
                                <td>0%</td>
                                <td>10 Januari 2024</td>
                                <td>
                                    <div class="button">
                                        <a href="http://localhost:8000/item/2/edit" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a> <button id="delete_button" class="btn btn-icon btn-danger" data-delete-route="http://localhost:8000/item/:id"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody> --}}
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
			$('#sales_item_table').DataTable({
				processing: true,
				serverSide: true,
				bDestroy: true,
				ordering: false,
				ajax: $('#sales_item_table').data('table-route'),
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
					{ data: 'item.name', name: 'item.name' , orderable: false, searchable: true},
					{ data: 'quantity', name: 'quantity' , orderable: false, searchable: true},
					{ data: 'total_formatted', name: 'total' , orderable: false, searchable: true},
					{ data: 'discount_formatted', name: 'discount' , orderable: false, searchable: true},
					{ data: 'transaction_date', name: 'created_at' , orderable: false, searchable: true},
				],
				language: {

				}
			});
		}
    </script>
@endpush