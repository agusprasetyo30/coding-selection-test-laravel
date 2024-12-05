@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<section class="section">
	<div class="section-header">
		<h1>Edit Item Data</h1>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('item.update', $item->id) }}" method="post">
							@csrf
							@method('put')
							<div class="form-group">
								<label>Name <span class="text-danger">*</span></label>
								<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}">
		
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
										<input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $item->price }}">
		
										@error('price')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<div class="col-6">
										<label for="stock">Stock <span class="text-danger">*</span></label>
										<input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $item->stock }}">
		
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
									@foreach ($item_category as $value)
										<option value="{{ $value->id }}" @if($value->id == $item->item_category_id) selected @endif>{{ $value->name }}</option>
									@endforeach
								</select>
		
								@error('item_category_id')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>

							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="discount" name="discount">
									<label class="custom-control-label" for="discount">Set Discount</label>
								</div>
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
		</div>
	</div>
</section>
@endsection
