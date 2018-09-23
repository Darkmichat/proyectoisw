@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Vehiculos <a href="vehiculo/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('proyecto.vehiculo.search')


			</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Patente</th>
					<th>Marca</th>
					<th>Tipo</th>
					<th>Modelo</th>
					<th>Opciones</th>
				</thead>
				@foreach ($vehiculos as $veh)
				<tr>
					<td>{{ $veh->id_vehiculo}}</td>
					<td>{{ $veh->patente}}</td>
					<td>{{ $veh->marca}}</td>
					<td>{{ $veh->tipo}}</td>
					<td>{{ $veh->modelo}}</td>

					<td>
						<a href="{{URL::action('VehiculoController@edit',$veh->id_vehiculo)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$veh->patente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('proyecto.vehiculo.modal')
				@endforeach
			</table>
		</div>
		{{$vehiculos->render()}}
	</div>
</div>
@endsection