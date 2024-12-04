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
		<h1>Item Data</h1>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header">
				<h4>Create Item</h4>
				<div class="card-header-action">
				</div>
			</div>
			<div class="card-body">
				<form action="{{ route('item.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label>Name <span class="text-danger">*</span></label>
						<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

						@error('name')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-6">
								<label for="price">Price <span class="text-danger">*</span></label>
								<input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">

								@error('price')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="col-6">
								<label for="stock">Stock <span class="text-danger">*</span></label>
								<input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}">

								@error('stock')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Category <span class="text-danger">*</span></label>
						<select class="form-control item_category_id @error('item_category_id') is-invalid @enderror" name="item_category_id">
							<option selected disabled>Choose Item Category</option>
							@foreach ($item_category as $item)
								<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>

						@error('item_category_id')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<a href="{{ route('item.index') }}" class="btn btn-warning" type="reset">
						<i class="fa fa-arrow-left"></i>
						<span>Back</span>
					</a>
					<button class="btn btn-primary mr-1" type="submit">
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
			$('.item_category_id').select2();
		});
	</script>
@endpush
