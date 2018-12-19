@extends('dashboard.master')

@section('title', 'Escritorio: Crear Método de Pago')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear método de pago</h1>
			<form action="{{ url('/escritorio/metodos/almacenar') }}" method="POST">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del método de pago" autocomplete="off" autofocus value="{{ old('name') }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection