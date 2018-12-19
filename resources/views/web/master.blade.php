<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Mixen: Boosting Brands">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/icons/style.css') }}">
</head>
<body>
	<!-- Navegación -->
	<nav>
		<div>
			<div>
				<a @if(Route::is('/')) href="#inicio" class="item-nav" @else href="{{ url('/') }}" @endif><img src="{{ asset('assets/images/logo.svg') }}" alt="Isotipo"></a>
				<ul>
					<li>¿Dudas? Nosotros te ayudamos</li>
					<li><a href="tel:018007770911"><span><span class="icon-7"></span></span> 01 800 777 0911</a></li>
					<li><a href="mailto:info@segurauto.com"><span><span class="icon-8"></span></span> info@segurauto.com</a></li>
				</ul>
			</div>
		</div>
		<div>
			<div>
				<a @if(Route::is('/')) href="#inicio" class="item-nav" @else href="{{ url('/') }}" @endif><img src="{{ asset('assets/images/logo.png') }}" alt="Isotipo"></a>
				<div>
					<a @if(Route::is('/')) href="#nosotros" class="item-nav" @else href="{{ url('/') }}#nosotros" @endif>Nosotros</a>
					<a href="http://ibs_w.segupoliza.com/#/quotes/new" target="_blank">Cotiza</a>
					<a @if(Route::is('/')) href="#servicios" class="item-nav" @else href="{{ url('/') }}#servicios" @endif>Servicios</a>
					<a @if(Route::is('/')) href="#blog" class="item-nav" @else href="{{ url('/') }}#blog" @endif>Noticias</a>
					<a @if(Route::is('/')) href="#contacto" class="item-nav" @else href="{{ url('/') }}#contacto" @endif>Contacto</a>
					<a @if(Route::is('/')) href="#contacto" class="item-nav" @else href="{{ url('/') }}#contacto" @endif>¿Dudas? Contáctanos</a>
				</div>
			</div>
		</div>
	</nav>
	@yield('content')
	<!-- Contacto -->
	<section id="contacto" data-parallax="scroll" data-image-src="{{ asset('assets/images/contacto/fondo.jpg') }}">
		<div>
			<h2>¡Escríbenos!
			Nosotros te asesoramos</h2>
			<form action="#" method="POST" id="FormContact">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre" autocomplete="off">
					<div id="error_name"></div>
				</div>
				<div>
					<label for="tel">Teléfono</label>
					<input type="tel" name="tel" id="tel" placeholder="000-0000000" autocomplete="off">
					<div id="error_tel"></div>
				</div>
				<div>
					<label for="email">Correo Electrónico</label>
					<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" autocomplete="off">
					<div id="error_email"></div>
				</div>
				<div>
					<label for="message">Mensaje</label>
					<textarea name="message" id="message" rows="5" placeholder="¿En qué te podemos ayudar?"></textarea>
					<div id="error_message"></div>
				</div>
				<div>
					<button type="submit">Enviar <span class="icon-4"></span></button>
				</div>
				<figure>
					<img src="{{ asset('assets/images/loader.svg') }}">
				</figure>
				{{ csrf_field() }}
			</form>
		</div>
		<img src="{{ asset('assets/images/contacto/figura1.jpg') }}" alt="¡Escríbenos! Nosotros te asesoramos">
	</section>
	<!-- Remate -->
	<div id="footer">
		<div>
			<ul>
				<li>
					<a href="#">
						<span>
							<span class="icon-8"></span>
						</span>
						Gonzalez Cossio, #3703 Col. Granjas, Chihuahua, Chih.
					</a>
				</li>
				<li>
					<a href="tel:018007770911">
						<span>
							<span class="icon-7"></span>
						</span>
						01 800 777 0911
					</a>
				</li>
				<li>
					<a href="mailto:info@segurauto.com">
						<span>
							<span class="icon-1"></span>
						</span>
						info@segurauto.com
					</a>
				</li>
			</ul>
			<img src="{{ asset('assets/images/logo.svg') }}" alt="Isotipo">
			<div>
				<a href="https://www.instagram.com/segurauto.oficial/" target="_blank">
					<i class="fab fa-instagram"></i>
				</a>
				<a href="https://www.facebook.com/Segurauto-716149845387300/" target="_blank">
					<i class="fab fa-facebook-f"></i>
				</a>
			</div>
		</div>
	</div>
	<footer>
		<div>Todos los derechos reservados &reg;</div>
		<div><a href="aviso-privacidad.pdf" target="_blank">Aviso de privacidad</a></div>
		<div><strong>Made By:</strong> <a href="https://mixen.mx"><img src="{{ asset('assets/images/mixen.svg') }}" alt="Mixen: Boosting Brands"></a></div>
	</footer>
	<!-- Botón de Navegación -->
	<button>
		<span></span>
		<span></span>
		<span></span>
	</button>
	@yield('js')
</body>
</html>