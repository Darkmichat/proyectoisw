@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Fichas <a href="registra/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('proyecto.registra.search')


			</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>ID </th>
					<th>Fecha revision</th>
					<th>Vehiculo</th>
					<th>Neumatico</th>
					<th>Presion</th>
					<th>Kilometraje Vida util </th>
					<th>Kilometraje Actual</th>
					
					
					<th>Opciones</th>
				</thead>
				@foreach ($registras as $reg)
				<tr>
	@if($reg->kilometraje>=($reg->vehiculoo-($reg->vehiculoo/10)))

					<td><div style="color:#FF0000;">{{ $reg->id_registra}}</div></td>
					<td><div style="color:#FF0000;">{{ $reg->fecha_revision}}</div></td>
					<td><div style="color:#FF0000;">{{ $reg->vehiculo}}</div></td>
					<td><div style="color:#FF0000;">{{ $reg->neumatico}}</div></td>
					<td><div style="color:#FF0000;">{{ $reg->presion}}</div></td>
					<td><div style="color:#FF0000;">{{ $reg->vehiculoo}}</div></td>
					<td><div style="color:#FF0000;">{{ $reg->kilometraje}}</div></td>

					<td>
	


						 <a href="" data-target="#modal-delete-{{$reg->id_registra}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						 <a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">ALERTA!</button></a>
					</td>
				</tr>
	@else

					<td>{{ $reg->id_registra}}</td>
					<td>{{ $reg->fecha_revision}}</td>
					<td>{{ $reg->vehiculo}}</td>
					<td>{{ $reg->neumatico}}</td>
					<td>{{ $reg->presion}}</td>
					<td>{{ $reg->vehiculoo}}</td>
					<td>{{ $reg->kilometraje}}</td>
					
					<td>
	


						 <a href="" data-target="#modal-delete-{{$reg->id_registra}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				
	@endif

				@include('proyecto.registra.modal')
				@endforeach
			</table>
		</div>
		{{$registras->render()}}
	</div>
</div>
@endsection