@extends('layouts.app')

@section('title', 'Create Employee')

@section('content')
<section class="section">
	<div class="section-header">
		<h1>Add Item Category</h1>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('item-category.store') }}" method="post">
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
</section>
@endsection
