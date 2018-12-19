<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dashboard/style.css') }}">
</head>
<body>
	{{-- Navegación --}}
	<nav>
		<div>
			<a href="{{ url('/escritorio/usuario/' . Auth::user()->id) }}">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
			<a href="{{ url('/escritorio') }}"><i class="fas fa-tachometer-alt"></i></a>
			<a href="{{ url('/') }}" target="_blank"><i class="fas fa-home"></i></a>
			<a href="{{ url('/autenticacion/cerrar-sesion') }}"><i class="fas fa-power-off"></i></a>
		</div>
	</nav>
	{{-- Menú --}}
	<aside>
		<div>
			<img src="{{ asset('assets/images/logo.png') }}">
			<h1>Escritorio</h1>
		</div>
		<ul>
			<li>
				<a href="#"
					@if(Route::is('escritorio/usuarios')) class="active" @endif
					@if(Route::is('escritorio/editar')) class="active" @endif
				><span class="icon-Users"></span> Usuarios</a>
				<ul
					@if(Route::is('escritorio/usuarios')) class="show" @endif
					@if(Route::is('escritorio/editar')) class="show" @endif
				>
					<li><a
						@if(Route::is('escritorio/usuarios')) class="active" @endif
						@if(Route::is('escritorio/editar')) class="active" @endif
						href="{{ url('/escritorio/usuarios') }}"><span class="icon-List"></span> Lista</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/cabecera')) class="active" @endif
					@if(Route::is('escritorio/descanso')) class="active" @endif
					@if(Route::is('escritorio/nosotros')) class="active" @endif
				><span class="icon-Home"></span> Inicio</a>
				<ul
					@if(Route::is('escritorio/cabecera')) class="show" @endif
					@if(Route::is('escritorio/descanso')) class="show" @endif
					@if(Route::is('escritorio/nosotros')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/cabecera')) class="active" @endif href="{{ url('/escritorio/cabecera') }}"><span class="icon-Edit"></span> Cabecera</a></li>
					<li><a @if(Route::is('escritorio/nosotros')) class="active" @endif href="{{ url('/escritorio/nosotros') }}"><span class="icon-Edit"></span> Nosotros</a></li>
					<li><a @if(Route::is('escritorio/descanso')) class="active" @endif href="{{ url('/escritorio/descanso') }}"><span class="icon-Edit"></span> Descanso</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/articulos')) class="active" @endif
					@if(Route::is('escritorio/articulos/crear')) class="active" @endif
					@if(Route::is('escritorio/articulos/editar')) class="active" @endif
				><span class="icon-Articles"></span> Blog</a>
				<ul
					@if(Route::is('escritorio/articulos')) class="show" @endif
					@if(Route::is('escritorio/articulos/crear')) class="show" @endif
					@if(Route::is('escritorio/articulos/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/articulos')) class="active" @endif href="{{ url('/escritorio/articulos') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/articulos/crear')) class="active" @endif href="{{ url('/escritorio/articulos/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/metodos')) class="active" @endif
					@if(Route::is('escritorio/metodos/crear')) class="active" @endif
					@if(Route::is('escritorio/metodos/editar')) class="active" @endif
				><span class="icon-Articles"></span> Métodos de pago</a>
				<ul
					@if(Route::is('escritorio/metodos')) class="show" @endif
					@if(Route::is('escritorio/metodos/crear')) class="show" @endif
					@if(Route::is('escritorio/metodos/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/metodos')) class="active" @endif href="{{ url('/escritorio/metodos') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/metodos/crear')) class="active" @endif href="{{ url('/escritorio/metodos/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	{{-- Contenido --}}
	<section>
		@yield('content')
	</section>
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/admin/main.js') }}"></script>
	@yield('js')
</body>
</html>