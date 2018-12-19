@extends('dashboard.master')

@section('title', 'Escritorio: Método de Pago')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Método de Pago</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Decha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($payments) > 0)
						@foreach($payments as $payment)
							<tr>
								<td>{{ $payment->name }}</td>
								<td>{{ $payment->user->name }} {{ $payment->user->lastname }}</td>
								<td>
									@if($payment->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $payment->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/metodos/editar/' . $payment->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection