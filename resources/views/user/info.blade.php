@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<div class="row border rounded bg-foreground-element opcAdmin">
    <div class="col-3">
        <div class="jumbotron">
            <h3>Usuarios</h3>     
            <a href="{{route('admin.users')}}"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
    <div class="col-3">
        <div class="jumbotron">
            <h3>Ordenes</h3>    
            <a href="{{route('admin.orders')}}"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
    <div class="col-3">
        <div class="jumbotron">
            <h3>Productos</h3>    
            <a href="{{route('admin.products')}}"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
</div>
@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
@endpush