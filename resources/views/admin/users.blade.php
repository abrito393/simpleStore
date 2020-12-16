@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{route('admin.user.show',$user->id)}}" id="btnLogin" class="btn btn-primary">ver</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>



  <div class="row">
    <div class="col-lg-12">
        {{$users->render()}}
    </div>
</div>



@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
@endpush