@extends('layouts.app')

@section('title', 'Create Item')

@push('css')
	<style>
		.is-invalid + .select2-container--default .select2-selection--single {
			border: 1px solid red;
		}
	</style>
@endpush


@section('content')
<section class="section">
	<div class="section-header">
		<h1>Add Item Transaction</h1>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-body">
				<form id="item_sales" action="{{ route('sales.item.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<label>Item <span class="text-danger">*</span></label>
						<select name="item" id="item" class="form-control @error('item') is-invalid @enderror">
							<option value="" selected disabled>Pilih item</option>
							@foreach ($item as $data)
								<option value="{{ $data->id }}" data-price="{{ $data->price }}" data-stock="{{ $data->stock }}">{{ $data->name }} (Rp. {{ number_format($data->price, 0) }})</option>
							@endforeach
						</select>

						<input type="hidden" name="price" id="price">
						{{-- <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"> --}}

						@error('item')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-12">
								<label for="item_buy">Item Buy <span class="text-danger">*</span></label>
								<input id="item_buy" type="number" class="form-control @error('item_buy') is-invalid @enderror" name="item_buy" value="0" max="" min="">

								@error('item_buy')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>

					<a href="{{ route('item.index') }}" class="btn btn-warning" type="reset">
						<i class="fa fa-arrow-left"></i>
						<span>Back</span>
					</a>
					<button class="btn btn-primary mr-1" type="submit" id="item_sales_save">
						<i class="fa fa-save"></i>
						<span> Save</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection

@push('js')
	<script>
		$(document).ready(function() {
			$('#item').select2();
		});

		$('#item').on('change', function(e) {
			e.preventDefault()

			$('#item_buy').attr({
				"min":1,
				"max": $('#item').find(':selected').data('stock')
			})

			$('#price').val($('#item').find(':selected').data('price'))
		})
	</script>
@endpush
