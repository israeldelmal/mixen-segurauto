@extends('dashboard.master')

@section('title', 'Escritorio: Editar Nosotros')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Nosotros</h1>
			<form action="{{ url('/escritorio/nosotros/actualizar/' . $about->id) }}" method="POST">
				<div>
					<label for="content">Contenido</label>
					<textarea name="content" id="formcontent">{{ $about->content }}</textarea>
					@if ($errors->has('content'))
						<div>{{ $errors->first('content')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection

@section('js')
	<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'formcontent' );
	</script>
@endsection