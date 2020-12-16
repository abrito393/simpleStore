@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
    <div class="container mx-auto rounded-sm " align="center"><br>
        <div class="row bg-light formLogin">
            <div class="mx-auto " action="#">
                {{ csrf_field() }}
                <h2>Nueva direccion</h2><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" placeholder="Nueva direccion" name="address">
                </div>
                <a href="#" class="btn btn-success createDireccion">Guardar</a>
            </div>
        </div>
    </div>
@endsection

@include('cart')

@push('js')
    <script>var urlx = "{{route('user.login')}}";var tokenCsrf = $( "input[name='_token']" ).val();</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>

    <script>var urlUserAddress = "{{route('client.address')}}";</script>
    <script>var urlUserOrders = "{{route('client.orders')}}";</script>
    <script>var urlUserData = "{{route('client.data')}}";</script>
    <script>var urlUserAddressSave = "{{route('address.save')}}";</script>
    <script>var urlcheckoutCart = "{{route('cart.review')}}";</script>
    <script>var urlcheckCart = "{{route('check.cart')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="{{asset('js/client.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
@endpush