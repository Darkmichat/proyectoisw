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

      {!!Form::open(array('url'=>'proyecto/vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
              <label for="patente">Patente</label>
              <input type="text" name="patente" class="form-control" placeholder="Ej: XXXXXX">
            </div>
            <div class="form-group">
              <label for="marca">Marca</label>
              <input type="text" name="marca" class="form-control" placeholder="Marca...">
            </div>
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <input type="text" name="tipo" class="form-control" placeholder="Tipo...">
            </div>
            <div class="form-group">
              <label for="modelo">Modelo</label>
              <input type="text" name="modelo" class="form-control" placeholder="Modelo...">
            </div>
            
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Guardar</button>
              <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

      {!!Form::close()!!}   
            
    </div>
  </div>
@endsection