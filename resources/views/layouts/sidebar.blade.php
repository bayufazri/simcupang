<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{ route('penjual.index') }}" class=""><i class="fa fa-users"></i> <span>Penjual</span></a></li>
						<li><a href="{{ route('jenis.index') }}" class=""><i class="fa fa-line-chart"></i> <span>Jenis</span></a></li>
                        <li><a href="{{ route('koleksi.index') }}" class=""><i class="fa fa-credit-card"></i> <span>Koleksiku</span></a></li>
						{{-- <li><a href="{{ url('transaksi/index') }}" class=""><i class="fa fa-shopping-cart"></i> <span>Transaksi</span></a></li> --}}
						<li><a href="{{ route('kejuaraan.index') }}" class=""><i class="fa fa-calendar"></i> <span>Kejuaraan</span></a></li>
					</ul>
				</nav>
			</div>
		</div>