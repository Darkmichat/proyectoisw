@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Conductores <a href="conductor/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('proyecto.conductor.search')


			</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				
				<thead>
					<th>Rut</th>
					<th>Nombre conductor</th>
					<th>Email conductor</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
				@foreach ($conductores as $con)
				<tr>
					<td>{{ $con->rut}}</td>
					<td>{{ $con->nombre_conductor}}</td>
					<td>{{ $con->email_conductor}}</td>
					<td>{{ $con->telefono}}</td>
					<td>
						<a href="{{URL::action('ConductorController@edit',$con->rut)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$con->rut}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('proyecto.conductor.modal')
				@endforeach
			</table>
		</div>
		{{$conductores->render()}}
	</div>
</div>
@endsection