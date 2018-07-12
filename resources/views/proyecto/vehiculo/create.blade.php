@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Vehiculo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            </div>
            {!!Form::open(array('url'=>'proyecto/vehiculo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="row"> 
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                         <label for="patente">Patente</label>
                               <input type="text" name="patente" class="form-control" placeholder="XXXXXX">
                   </div>     
                  </div>
                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       <div class="form-group">
                              <label>Conductor</label>
                              <select name="rut" class="form-control">
                                  @foreach ($conductores as $con) 
                                  <option value="{{$con->rut}}">{{$con->nombre_conductor}}</option>
                                  @enforeach
                             </select>
                       </div> 
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                               <label for="marca">Marca</label>
                                     <input type="text" name="marca"  class="form-control" placeholder="Marca....">
                        </div>    
                   </div>

                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="tipo">Tipo</label>
                                <input type="text" name="tipo"  class="form-control" placeholder="Tipo....">
                        </div>   
                  </div>
                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                               <label for="modelo">Modelo</label>
                                 <input type="text" name="modelo"  class="form-control" placeholder="modelo....">
                        </div>   
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                               <label for="imagen">Imagen</label>
                                 <input type="file" name="imagen"  class="form-control" >
                        </div>   
                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
                         </div>
                  </div>
           </div>
			{!!Form::close()!!}		
            
@endsection