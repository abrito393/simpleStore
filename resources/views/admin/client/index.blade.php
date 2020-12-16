@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<div class="row border rounded bg-foreground-element opcAdmin">
    <div class="col-sm-4">
        <div class="jumbotron">
            <h3>Datos de la cuenta</h3>    
            <a href="#"><button type="button" class="btn btnData">Ver</button></a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="jumbotron">
            <h3>Direcciones </h3>     
            <a href="#"><button type="button" class="btn btnAddress">Ver</button></a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="jumbotron">
            <h3>Ordenes</h3>    
            <a href="#"><button type="button" class="btn btnOrders">Ver</button></a>
        </div>
    </div>

</div>
@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>

    <script>var urlUserAddress = "{{route('client.address')}}";</script>
    <script>var urlUserOrders = "{{route('client.orders')}}";</script>
    <script>var urlUserData = "{{route('client.data')}}";</script>
    <script>var urlcheckCart = "{{route('check.cart')}}";</script>
    <script>var urlcheckoutCart = "{{route('cart.review')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="{{asset('js/client.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
@endpush