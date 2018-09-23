@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Neumaticos: {{ $neumatico->id_neumatico}}</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::model($neumatico,['method'=>'PATCH','route'=>['proyecto.neumatico.update',$neumatico->id_neumatico]])!!}
            {{Form::token()}}
              <div class="form-group">
              <label for="marca">Marca</label>
              <input type="text" name="marca" class="form-control" value="{{$neumatico->marca}}" placeholder="Marca...">
            </div>
            <div class="form-group">
              <label for="modelo">Modelo</label>
              <input type="text" name="modelo" class="form-control" value="{{$neumatico->modelo}}" placeholder="Marca...">
            </div>
            <div class="form-group">
              <label for="aro">Aro</label>
              <input type="text" name="aro" class="form-control" value="{{$neumatico->aro}}" placeholder="15..">
            </div>
            <div class="form-group">
              <label for="presion">Presion</label>
              <input type="text" name="presion" class="form-control" value="{{$neumatico->presion}}" placeholder="2.2...">
            </div>
            <div class="form-group">
              <label for="kilometraje">Kilometraje</label>
              <input type="text" name="kilometraje" class="form-control" value="{{$neumatico->kilometraje}}" placeholder="300km">
            </div>
            
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Guardar</button>
              <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

      {!!Form::close()!!}   
            
    </div>
  </div>
@endsection