@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<div class="row border rounded bg-foreground-element opcAdmin">
    <div class="col-sm-4">
        <div class="jumbotron">
            <h3>Direcciones </h3>     
            <a href="{{route('admin.user.show',$user->id)}}?type=address"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="jumbotron">
            <h3>Ordenes activas</h3>    
            <a href="{{route('admin.user.show',$user->id)}}?type=ordact"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="jumbotron">
            <h3>Ordenes finalizadas</h3>    
            <a href="{{route('admin.user.show',$user->id)}}?type=ordfinish"><button type="button" class="btn">Ver</button></a>
        </div>
    </div>
</div>
@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
@endpush