@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card" style="width: 18rem; margin:auto;">
        <div class="card-body">
            <h1>Crear nuevo Contacto</h1>
            <form action="{{url('/contacto')}}" method="post">
                @csrf
                @include('contacto.form')
            </form>
        </div>
    </div>
</div>

@endsection