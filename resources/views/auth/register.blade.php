@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
    <div class="container mx-auto rounded-sm " align="center"><br>
        <div class="row bg-light formLogin">

            <div class="mx-auto " action="#">
                {{ csrf_field() }}
                <div class="alert alert-danger text-center errorText">
                </div>
                <h2>Nueva cuenta</h2><br>
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input autocomplete="off" type="name" class="form-control" id="name" placeholder="Ingrese nombre" name="name">
                    <span style='color:red' id="errorName" class="spanError"><b>*Este Campo es requerido*</b></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input autocomplete="off" type="email" class="form-control" id="email" placeholder="Ingrese email" name="email">
                    <span style='color:red' id="errorEmail" class="spanError"><b>*Este Campo es requerido*</b></span>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input autocomplete="off" type="password" class="form-control" id="password" placeholder="Ingrese contraseña" name="password">
                    <span style='color:red' id="errorPsw" class="spanError"><b>*Este Campo es requerido*</b></span>
                </div>
                <a href="#" id="btnCreateUser" class="btn btn-success">Crear cuenta</a>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script>var urlx = "{{route('user.create')}}";</script>
    <script src="{{asset('js/create_user.js')}}"></script>
@endpush