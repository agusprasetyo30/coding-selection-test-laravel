<aside id="sidebar-wrapper">
	<div class="sidebar-brand">
		<a href="{{ route('dashboard') }}">Reimburse Test</a>
	</div>
	<div class="sidebar-brand sidebar-brand-sm">
		<a href="{{ route('dashboard') }}">RT</a>
	</div>
	<ul class="sidebar-menu">
		@section('sidebar')
			<li class="menu-header">Dashboard</li>
			<li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

			<li class="menu-header">Master Data</li>
			<li class="#"><a class="nav-link" href="{{ route('item-category.index') }}"><i class="fas fa-layer-group"></i> <span>Kategori Barang</span></a></li>
			<li class="#"><a class="nav-link" href="{{ route('item.index') }}"><i class="fas fa-tachometer-alt"></i> <span>Barang</span></a></li>

			<li class="menu-header">Transaction</li>
			
			<li class="menu-header">Soal 2</li>

			{{-- @can('index-user')
				<li class="nav-item {{ Request::is('employee*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('employee.index') }}"><i class="fas fa-users"></i> <span>Employee List</span></a></li>
			@endcan

			@can('index-employee')
				<li class="nav-item {{ Request::is('reimbursement*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('reimbursement.index') }}"><i class="fas fa-money-bill"></i> <span>Reimbursement</span></a></li>
			@endcan

			@can('index-pembayaran')
				<li class="nav-item {{ Request::is('pembayaran*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran.index') }}"><i class="fas fa-money-check"></i> <span>Pembayaran</span></a></li>
			@endcan --}}
	</ul>
</aside>
