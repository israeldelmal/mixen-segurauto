@extends('web.master')

@section('title')
	Segurauto
@endsection

@section('content')
	<!-- Cabecera -->
	<header id="inicio" data-parallax="scroll" data-image-src="{{ asset('assets/images/cabecera/' . $header->img) }}">
		<h1>{{ $header->h1 }}</h1>
		<a href="http://ibs_w.segupoliza.com/#/quotes/new" target="_blank">Comprar ahora <span class="icon-4"></span></a>
		<a href="#nosotros" class="item-nav"><span class="icon-6"></span></a>
	</header>
	<!-- Nosotros -->
	<section id="nosotros" style="background-image: url('assets/images/nosotros/figura1.png');">
		<div>
			<h2>Sobre Nosotros
			<strong>Conoce nuestra compañía</strong></h2>
			{!! $about->content !!}
			<a href="#contacto" class="item-nav">Contáctanos <span class="icon-4"></span></a>
		</div>
	</section>
	<!-- Asegúrate -->
	<section id="asegurate" data-parallax="scroll" data-image-src="{{ asset('assets/images/asegurate/' . $break->img) }}">
		<h3>{{ $break->h1 }}</h3>
		<a href="http://ibs_w.segupoliza.com/#/quotes/new" target="_blank">Asegúrate ahora <span class="icon-4"></span></a>
	</section>
	<!-- Servicios -->
	<section id="servicios">
		<div>
			<h2>Nuestros Servicios
			<strong>Te ayudamos en todo momento</strong></h2>
			<p>En Segurato nos comprometemos a proteger tu vehículo de manera fácil y rápida.</p>
			<ul>
				<li>
					<a href="#">
						<span class="icon-3"></span>
						<strong>RC</strong>
						Cobertura para 
						daños a terceros.
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon-5"></span>
						<strong>Limitada</strong>
						Cobertura para daños 
						a terceros y robo.
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon-9"></span>
						<strong>Amplia</strong>
						Cobertura completa.
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon-2"></span>
						<strong>Amplia Plus</strong>
						Cobertura completa
						sin deducible.
					</a>
				</li>
			</ul>
			<a href="http://ibs_w.segupoliza.com/#/quotes/new" target="_blank">Compra ahora <span class="icon-4"></span></a>
		</div>
	</section>
	<!-- Pagos -->
	<section id="pagos">
		<div>
			<h2>Contamos con diferentes
			<strong>formas de pago:</strong></h2>
			<ul>
				@if(count($payments) > 0)
					@foreach($payments as $payment)
						<li><span class="icon-4"></span> {{ $payment->name }}</li>
					@endforeach
				@else
					<li><span class="icon-4"></span> Próximamente</li>
				@endif
			</ul>
		</div>
		<img src="{{ asset('assets/images/pagos/figura1.png') }}">
	</section>
	<!-- Blog -->
	<section id="blog" style="background-image: url('{{ asset('assets/images/articulos/fondo.png') }}');">
		<div>
			<h1>Conoce nuestro Blog
			<strong>Mantente informado con las últimas noticias</strong></h1>
			<sub>Entérate de todo lo que tienes que saber sobre seguros de autos.</sub>
			<main>
				@if(count($articles) > 0)
					@foreach($articles as $article)
						<article>
							<div style="background-image: url('{{ asset('assets/images/articulos/' . $article->img) }}');"></div>
							<div>
								<time>{{ $article->created_at->format('d M') }}</time>
								<h1>{{ $article->title }}</h1>
							</div>
							<p>{!! strip_tags(trim(substr($article->content, 0, 220))) !!}...</p>
							<a href="{{ url('/noticias/' . $article->slug) }}">Leer más <span class="icon-4"></span></a>
						</article>
					@endforeach
				@else
					<h2 style="font-size: 3em; font-weight: 100; text-transform: uppercase;">Próximamente</h2>
				@endif
			</main>
		</div>
	</section>
@endsection

@section('js')
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script>
		$('#FormContact').on('submit', function(event) {
			event.preventDefault();
			let ID   = $(this).serialize();
			let Form = $(this);

			$(Form).find('figure').slideDown('normal');

			$.ajax({
				url: '{{ url("/contacto") }}',
				type: 'POST',
				dataType: 'json',
				data: ID,
				cache: false,
			})
			.done(function(data) {
				if (data.send == true) {
					alert('Gracias por escribirnos, nos ponemos en contacto a la brevedad.');
					$('.errors').fadeOut(300);
					$(Form).find('#name').val('');
					$(Form).find('#email').val('');
					$(Form).find('#tel').val('');
					$(Form).find('#message').val('');
				} else if (data.fail == true) {
					$.each(data.errors, function(index, val) {
						$('#' + index).focusin(function() {
							$('#error_' + index).slideUp('normal');
						});
						$('#error_' + index).html(val).slideDown('normal');
					});
				}
			})
			.fail(function() {
				alert('¡Ocurrió un error inesperado, inténtalo más tarde!');
			})
			.always(function(data) {
				if (data.send == true) {
					$(Form).find('figure').slideUp('normal');
				}

				if (data.fail == true) {
					$(Form).find('figure').slideUp('normal');
				}
			});
		});
	</script>
@endsection