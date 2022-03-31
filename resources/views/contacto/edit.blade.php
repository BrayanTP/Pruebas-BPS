@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card" style="width: 18rem; margin:auto;">
        <div class="card-body">
            <h1>Editar Contacto</h1>
            <form action="{{url('/contacto/'.$contacto->id)}}" method="post">
                @csrf
                {{ method_field('PATCH') }}
                @include('contacto.form')
            </form>
        </div>
    </div>
</div>

@endsection