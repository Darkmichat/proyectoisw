@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Conductor: {{ $conductor->nombre_conductor}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($conductor,['method'=>'PATCH','route'=>['proyecto.conductor.update',$conductor->rut]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="rut">Rut</label>
            	<input type="text" name="rut" class="form-control" value="{{$conductor->rut}}" placeholder="12345678-9">
            </div>
            <div class="form-group">
            	<label for="nombre_conductor">Nombre del conductor</label>
            	<input type="text" name="nombre_conductor" class="form-control" value="{{$conductor->nombre_conductor}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="email_conductor">E-mail</label>
            	<input type="text" name="email_conductor" class="form-control" value="{{$conductor->email_conductor}}"  placeholder="example@example.cl">
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$conductor->telefono}}" placeholder="telefono...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection