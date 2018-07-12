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
					<th>Patente</th>
					<th>Marca</th>
					<th>Tipo</th>
					<th>Modelo</th>
					<th>Nombre conductor</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach ($vehiculos as $veh)
				<tr>
					<td>{{ $veh->patente}}</td>
					<td>{{ $veh->marca}}</td>
					<td>{{ $veh->tipo}}</td>
					<td>{{ $veh->modelo}}</td>
					<td>{{ $veh->conductor}}</td>
					<td>{{ $veh->estado}}</td>
					<td>
						<img src="{{asset('imagenes/vehiculos/'.$veh->imagen)}}" alt="{{ $veh->marca}}" height="100px" width="150px" class="img-tumbnail">
					</td>

					<td>
						<a href="{{URL::action('VehiculoController@edit',$veh->patente)}}"><button class="btn btn-info">Editar</button></a>
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