<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
	<link href="{{ asset('css/hamburgers.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="{{$body_class or ''}}">
	<header>	
		<div class="container group">
			<div class="row">
				<div class="navbarheader col-lg-12">
					<div class="menus group container">
						<nav class="headernav">
							<div class="headerlogo">
								<h1 class="logo">{{ config('app.name', 'Laravel') }}<a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Office Guru"></a></h1>
							</div>

							<div id="headernav-menu" class="headernav-menu">	
								<ul>
									<li class="menu-item-faq"><a href="faq.php">FAQ</a></li>
									@if (Auth::guest())
										<li class="menu-item-register"><a href="{{ route('register') }}">Registrate</a></li>
										<li class="menu-item-login"><a href="{{ route('login') }}">Ingresá</a></li>
			                        @else
										<li class="menu-item-user">
											<a href="profile.php">
												<img class="avatar avatar-sm" src="{{ Auth::user()->first_name }}" alt="{{ Auth::user()->first_name }}">
												{{ Auth::user()->first_name }}
											</a>
										</li>
										<li class="menu-item-user">
											<a href="{{ route('logout') }}" 
												onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												<i class="icon-lock"></i> Salir
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

		<script type="text/javascript" src="js/example.js"></script>

	</header>
	<main>
		@yield('content')
	</main>
	<footer>
		<section class="footernav pad-bottom pad-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 txt-center w-100">
						<nav class="footernav-menu d-inlineblock">
							<ul>
								<li><a href="index.php">Inicio</a></li>
								<li><a href="faq.php">Preguntas</a></li>
								@if (!Auth::guest())
									<li><a href="{{ route('register') }}">Regístrate</a></li>
									<li><a href="{{ route('login') }}">Iniciar sesión</a></li>
								@endif
							</ul>
						</nav>				
					</div>
				</div>
			</div>			
		</section>

		<section class="footersocial pad-bottom pad-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 txt-center w-100">
						<nav class="menu-social d-inlineblock">
							<ul>
								<li><a href="https://facebook.com" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="https://twitter.com" target="_blank"><i class="icon-twitter"></i></a></li>
								<li><a href="https://linkedin.com" target="_blank"><i class="icon-linkedin"></i></a></li>
								<li><a href="https://instagram.com" target="_blank"><i class="icon-instagram"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</section>

		<section class="footercopy pad-bottom pad-top">
			<div class="container">
				<div class="row">
					<div class="col-12 imgfooter">
						<img src="img/logo-1.png" alt="Office Guru">
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-12">
						<p class="copy">&copy; Copyright <?php echo date('Y'); ?> <em>Escuchame chiquito</em>, todos los derechos reservados.</p>
					</div>
				</div>
			</div>
		</section>	
	</footer>
</body>
</html>