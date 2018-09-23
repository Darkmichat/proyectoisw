@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Posee <a href="posee/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('proyecto.posee.search')


			</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Vehiculo</th>
					<th>Neumatico</th>
					<th>Opciones</th>
				</thead>
				@foreach ($posees as $pos)
				<tr>
					<td>{{ $pos->id_posee}}</td>
					<td>{{ $pos->vehiculo}}</td>
					<td>{{ $pos->neumatico}}</td>	
					<td>
						<a href="{{URL::action('PoseeController@edit',$pos->id_posee)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$pos->id_posee}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('proyecto.posee.modal')
				@endforeach
			</table>
		</div>
		{{$posees->render()}}
	</div>
</div>
@endsection