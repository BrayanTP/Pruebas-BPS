@extends('layouts.app')
@section('css1')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container-fluid">

    <h1>Contacto</h1>
    <a href="{{url('contacto/create')}}"><button type="button" class="btn btn-success">Agregar nuevo contacto</button>
    </a>
    <table id="contacto" class="table table-dark table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Direccion</th>
            <th scope="col">Departamento</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Télefono</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacto as $contacto)
            <tr>
            <td scope="row">{{$contacto -> nombres}}</td>
            <td scope="row">{{$contacto -> apellidos}}</td>
            <td scope="row">{{$contacto -> direccion}}</td>
            <td scope="row">{{$contacto -> departamento}}</td>
            <td scope="row">{{$contacto -> ciudad}}</td>
            <td scope="row">{{$contacto -> telefono}}</td>
            <td scope="row">
                <a href="{{url('/contacto/'.$contacto->id.'/edit')}}"><button type="button" class="btn btn-warning">Editar </button>
                </a>
                <form action="{{url('/contacto/'.$contacto->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('Seguro que quiere eliminar el registro?')" value="Eliminar">
                </form>
            </td>
            @endforeach
            @if(Session::has('msn'))
                <div class="alert alert-success" role="alert">
                    <strong>
                        {{Session::get('msn')}}
                    </strong>
                </div>
            @endif
            @if(Session::has('msn1'))
                <div class="alert alert-danger" role="alert">
                    <strong>
                        {{Session::get('msn1')}}
                    </strong>
                </div>
            @endif
            @if(Session::has('msn2'))
                <div class="alert alert-success" role="alert">
                    <strong>
                        {{Session::get('msn2')}}
                    </strong>
                </div>
            @endif
        </tbody>
    </table>
    @section('js1')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#contacto').DataTable();
        } );
    </script>
    @endsection
</div>


@endsection