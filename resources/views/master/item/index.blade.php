@extends('layouts.app')

@section('title', 'Index Item')

@push('css')
@endpush

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>Item Data</h1>
		</div>

		<div class="section-body">
			<div class="card card-primary">
				<div class="card-header">
					<h4>Item List</h4>
					<div class="card-header-action">
						{{-- @can('create-user') --}}
							<a href="{{ route('item.create') }}" class="btn btn-primary">
								<i class="fa fa-plus"></i>
								<span> Add Item</span>
							</a>
						{{-- @endcan --}}
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped table-hover" id="item_table" data-table-route="{{ route('datatables.item') }}">
						<thead>
							<tr>
								<th width="25%">Name</th>
								<th width="30%">Category</th>
								<th width="15%">Price</th>
								<th width="20%">Stock</th>
								<th width="10%"></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('js')
{{-- <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.js"></script> --}}
	{{-- <script src="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.min.js"></script> --}}
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
	<script src="{{ asset('js/item.js') }}"></script>
@endpush
