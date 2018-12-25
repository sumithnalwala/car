	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="#">
				<img src="{{ asset('vendors/images/deskapp-logo.png') }}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('carlist') }}">Home</a></li>
							<li><a href="{{ route('manufacturer') }}">Add Manufacturer</a></li>
							<li><a href="{{ route('carmodel') }}">Add Car model</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>