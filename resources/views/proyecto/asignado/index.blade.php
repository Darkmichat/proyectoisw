@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Asignados <a href="asignado/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('proyecto.asignado.search')


			</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Conductor</th>
					<th>Vehiculo</th>
					<th>Opciones</th>
				</thead>
				@foreach ($asignados as $asi)
				<tr>
					<td>{{ $asi->id_asignado}}</td>
					<td>{{ $asi->conductor}}</td>
					<td>{{ $asi->vehiculo}}</td>
					<td>
						<a href="{{URL::action('AsignadoController@edit',$asi->id_asignado)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$asi->id_asignado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('proyecto.asignado.modal')
				@endforeach
			</table>
		</div>
		{{$asignados->render()}}
	</div>
</div>
@endsection