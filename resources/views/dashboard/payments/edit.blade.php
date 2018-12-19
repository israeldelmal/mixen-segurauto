@extends('dashboard.master')

@section('title', 'Escritorio: Editar Método de Pago')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar método de pago</h1>
			<form action="{{ url('/escritorio/metodos/actualizar/' . $payment->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del método de pago" autocomplete="off" autofocus value="{{ $payment->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($payment->status == false) selected @endif>Inactivo</option>
					</select>
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection