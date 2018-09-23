@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Conductor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'proyecto/conductor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group"> 
            	<label for="rut">Rut</label>
            	<input id="rut" type="text" name="rut"  class="form-control" placeholder="Ej: 123456789">
            </div>
            <div class="form-group">
            	<label for="nombre_conductor">Nombre del conductor</label>
            	<input type="text" name="nombre_conductor" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="email_conductor">E-mail</label>
            	<input type="text" name="email_conductor" class="form-control" placeholder="example@example.cl">
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" placeholder="telefono...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection