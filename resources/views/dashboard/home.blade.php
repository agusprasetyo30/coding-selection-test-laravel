@extends('layouts.app')

@section('title', 'Dashboard Area')

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<i class="fas fa-users"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
							<h4>Total Item</h4>
							</div>
							<div class="card-body">
							{{ $item_count }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-danger">
							<i class="fas fa-money-bill"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Sales Total</h4>
							</div>
							<div class="card-body">
								{{ $sales_count }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-12">
					<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-money-bill-wave"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
						<h4>Total Revenue</h4>
						</div>
						<div class="card-body">
						{{ $total_revenue }}
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('sidebar')

@endsection
