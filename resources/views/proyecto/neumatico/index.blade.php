@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Neumaticos <a href="neumatico/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('proyecto.neumatico.search')


			</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Aro</th>
					<th>Presion</th>
					<th>Kilometraje K/m</th>
					<th>Opciones</th>
				</thead>
				@foreach ($neumaticos as $neu)
				<tr>
					<td>{{ $neu->id_neumatico}}</td>
					<td>{{ $neu->marca}}</td>
					<td>{{ $neu->modelo}}</td>
					<td>{{ $neu->aro}}</td>
					<td>{{ $neu->presion}}</td>
					<td>{{ $neu->kilometraje}}</td>

					<td>
						<a href="{{URL::action('NeumaticoController@edit',$neu->id_neumatico)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$neu->id_neumatico}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('proyecto.neumatico.modal')
				@endforeach
			</table>
		</div>
		{{$neumaticos->render()}}
	</div>
</div>
@endsection