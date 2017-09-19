<header>	
	<div class="container group">
		<div class="row">
			<div class="navbarheader col-lg-12">
				<div class="menus group container">
					<nav class="headernav">
						<div class="headerlogo">
							<h1 class="logo">{{ config('app.name', 'Office Gurú') }}<a href="{{ route('page.home') }}"><img src="{{ asset('img/logo.png') }}" alt="Office Guru"></a></h1>
						</div>

						<div id="headernav-menu" class="headernav-menu" style="visibility: hidden">
							<ul>
								<li class="menu-item-faq"><a href="{{ route('page.faq') }}">FAQ</a></li>
								@if (Auth::guest())
									<li class="menu-item-register"><a href="{{ route('register') }}">Registrate</a></li>
									<li class="menu-item-login"><a href="{{ route('login') }}">Ingresá</a></li>
		                        @else
									<li class="menu-item-user">
										<a href="{{ route('user.update') }}">
											<img class="avatar avatar-sm" src="/storage/user/image/{{ Auth::user()->image }}" alt="{{ Auth::user()->first_name }}">
											{{ Auth::user()->first_name }}
										</a>
									</li>
									<li class="menu-item-user">
										<a href="{{ route('logout') }}" 
											onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<i class="fa fa-lock"></i> Salir
										</a>
                                     </li>
		                        @endif
							</ul>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</div>
						
						<button id="menu-mobile" class="hamburger menu-mobile" type="button">
							<span class="hamburger-box">
							<span class="hamburger-inner"></span>
							</span>
						</button>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>