@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<div class="row border rounded bg-foreground-element opcAdmin">
    <div class="col-sm-6">
        <div class="jumbotron">
            <h3>Obtener Posts de Api externa</h3>     
            <a href="{{route('posts.get')}}"><button type="button" class="btn">Obtener</button></a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="jumbotron">
            <h3>Ver posts</h3>    
            <a href="{{route('posts.show')}}"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
</div>
@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
@endpush