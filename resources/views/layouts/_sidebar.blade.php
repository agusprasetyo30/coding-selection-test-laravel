<aside id="sidebar-wrapper">
	<div class="sidebar-brand">
		<a href="{{ route('dashboard') }}">CODING SELECTION TEST</a>
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
			<li class="#"><a class="nav-link" href="{{ route('sales.item.index') }}"><i class="fas fa-cash-register"></i> <span>Item Sales</span></a></li>
			<li class="#"><a class="nav-link" href="{{ route('sales.item.laporan-penjualan') }}"><i class="fas fa-chart-line"></i> <span>Laporan Penjualan</span></a></li>
			

			<li class="menu-header">Soal 2</li>
			<li class="#"><a class="nav-link" href="{{ route('soal2-process') }}"><i class="fas fa-hourglass-start"></i> <span>Perhitungan Huruf</span></a></li>
	</ul>
</aside>
