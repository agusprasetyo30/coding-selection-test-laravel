@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<section class="section">
	<div class="section-header">
		<h1>Item Category</h1>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="section-body">
				<div class="card">
					<div class="card-header">
						<h4>Edit Item Category</h4>
						<div class="card-header-action">
						</div>
					</div>
					<div class="card-body">
						<form action="{{ route('item-category.update', $item_category->id) }}" method="post">
							@csrf
							@method('put')
							<div class="form-group">
								<label>Name <span class="text-danger">*</span></label>
								<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $item_category->name }}">

								@error('name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>

							<a href="{{ route('item-category.index') }}" class="btn btn-warning" type="reset">
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
