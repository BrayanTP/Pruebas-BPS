@if(count($errors)>0)

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
    
@endif
<div class="form-group">
    <label for="nombres" class="form-label">Nombres</label>
    <input type="text" class="form-control" name="nombres" value="{{ isset($contacto->nombres)?$contacto->nombres:''}}" id="">
</div>
<div class="form-group">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" value="{{ isset($contacto->apellidos)?$contacto->apellidos:''}}" id="">
</div>
<div class="form-group">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="{{ isset($contacto->direccion)?$contacto->direccion:''}}" id="">
</div>
<div class="form-group">
    <label for="departamento" class="form-label">Deparatamento</label>
    <input type="text" class="form-control" name="departamento" value="{{ isset($contacto->departamento)?$contacto->departamento:''}}" id="">
</div>
<div class="form-group">
    <label for="ciudad" class="form-label">Ciudad</label>
    <input type="text" class="form-control" name="ciudad" value="{{ isset($contacto->ciudad)?$contacto->ciudad:''}}" id="">
</div>
<div class="form-group">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="{{ isset($contacto->telefono)?$contacto->telefono:''}}" id="">
</div>
    <button type="submit" class="btn btn-success">Enviar</button>
    <a href="{{url('contacto')}}"><button type="button" class="btn btn-danger">Cancelar</button>
    </a>