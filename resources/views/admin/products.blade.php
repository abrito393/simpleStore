@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{$single->id}}</td>
                <td>{{$single->name}}</td>
                <td>{{$single->description}}</td>
                <td>{{$single->price}}$</td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <div class="row">
    <div class="col-lg-12">
        {{$data->render()}}
    </div>
</div>



@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
@endpush