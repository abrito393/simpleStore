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
                <h2>Bienvenido</h2><br>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Ingrese email" name="email">
                    <span style='color:red' id="errorEmail" class="spanError"><b>*Este Campo es requerido*</b></span>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="password" placeholder="Ingrese contraseña" name="password">
                    <span style='color:red' id="errorPsw" class="spanError"><b>*Este Campo es requerido*</b></span>
                </div>
                <a href="#" id="btnLogin" class="btn btn-primary">Login</a>
                <a href="{{route('form.register')}}" class="btn btn-dark d-none">Registrarme</a>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
@endpush