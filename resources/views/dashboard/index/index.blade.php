@extends('dashboard.master')

@section('title', 'Escritorio')

@section('content')
	<div id="index">
		<ul>
			<li>
				<span>Artículos</span>
				<span>{{ count($count_articles) }}</span>
			</li>
			<li>
				<span>Métodos de pago</span>
				<span>{{ count($count_payments) }}</span>
			</li>
			<li>
				<span>Usuarios</span>
				<span>{{ count($count_users) }}</span>
			</li>
		</ul>
		<div>
			<h1>Últimos artículos</h1>
			<table>
				<thead>
					<tr>
						<td>Artículo</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($articles) > 0)
						@foreach($articles as $article)
							<tr>
								<td>{{ $article->title }}</td>
								<td>{{ $article->user->name }} {{ $article->user->lastname }}</td>
								<td>
									@if($article->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $article->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div>
			<h1>Últimos métodos de pago</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($payments) > 0)
						@foreach($payments as $payment)
							<tr>
								<td>{{ $payment->title }}</td>
								<td>{{ $payment->user->name }} {{ $payment->user->lastname }}</td>
								<td>
									@if($payment->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $payment->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
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