<footer>
	<section class="footernav pad-bottom pad-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 txt-center w-100">
					<nav class="footernav-menu d-inlineblock">
						<ul>
							<li><a href="{{ route('page.home') }}">Inicio</a></li>
							<li><a href="{{ route('page.faq') }}">FAQ</a></li>
							@if (Auth::guest())
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
							<li><a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
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
					<img src="{{ asset('img/logo-white.png') }}" alt="Office Guru">
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