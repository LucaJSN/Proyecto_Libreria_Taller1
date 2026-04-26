@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div>
                <label for="exampleFormControlInput1" class="form-label">Nombre y apellido</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="+00 000 000000">
            </div>
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        <button type="button" class="btn btn-dark">Enviar</button>
    </div>
</div>
@endsection