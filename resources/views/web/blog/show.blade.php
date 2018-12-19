@extends('web.master')

@section('title')
	{{ $article->title }} | Segurauto
@endsection

@section('content')
	<!-- Artículo -->
	<section id="articulo">
		<header id="inicio" data-parallax="scroll" data-image-src="{{ asset('assets/images/cabecera/fondo.jpg') }}">
			<span>Mantente informado</span>
		</header>
		<article>
			<div>
				<h1>{{ $article->title }}</h1>
				{!! $article->content !!}
			</div>
			<div data-parallax="scroll" data-image-src="{{ asset('assets/images/articulos/' . $article->img) }}"></div>
		</article>
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