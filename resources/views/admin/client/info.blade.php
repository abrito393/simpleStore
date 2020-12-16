@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<h2>Informacion</h2>
<ul class="list-group list-group-flush">
  <li class="list-group-item">Nombre: {{$data->name}}</li>
  <li class="list-group-item">Nombre: {{$data->email}}</li>
</ul>

@endsection

@include('cart')

@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>

    <script>var urlUserAddress = "{{route('client.address')}}";</script>
    <script>var urlUserOrders = "{{route('client.orders')}}";</script>
    <script>var urlUserData = "{{route('client.data')}}";</script>
    <script>var urlcheckoutCart = "{{route('cart.review')}}";</script>
    <script>var urlcheckCart = "{{route('check.cart')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="{{asset('js/client.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
@endpush