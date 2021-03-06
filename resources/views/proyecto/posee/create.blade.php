@extends ('layouts.admin')
@section ('contenido')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Nuevo Posee</h3>
                  @if (count($errors)>0)
                  <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                        @endforeach
                        </ul>
                  </div>
                  @endif

                  {!!Form::open(array('url'=>'proyecto/posee','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

      
            <div class="form-group">
                  <label> Vehiculo </label>
                  <select name="id_vehiculo" class="form-control" >
                        @foreach ($vehiculos as $veh)
                        <option value="{{$veh->id_vehiculo}}">{{$veh->marca}}</option>
                        @endforeach
                  </select>
              </div>   

            <div class="form-group">
                  <label> Neumatico </label>
                  <select name="id_neumatico" class="form-control" >
                        @foreach ($neumaticos as $neu)
                        <option value="{{$neu->id_neumatico}}">{{$neu->marca}}</option>
                        @endforeach
                        </select>
                  </div>      

              

            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            </div>
      </div>
      </div>
      {!!Form::close()!!}           
@endsection