@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
    <div class="container" align="center"><br>
        <div class="row">
        @foreach($products as $product)
        
            <div class="col-sm-3" align="center">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top productImg" src="https://icon-library.com/images/product-icon-png/product-icon-png-9.jpg" alt="Card image">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text">{{$product->description}}</p>
                        
                        <div class="card-body text-center">
                            <p class="card-text badge badge-dark" align="right">Precio: {{$product->price}}$</p>
                        </div>
                        <a href="#" class="btn btn-primary stretched-link addProduct" data-id="{{$product->id}}">Agregar al carro</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                {{$products->render()}}
            </div>
        </div>
    </div>



@include('cart')

@endsection



@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script>var urladdProduct = "{{route('product.add')}}";</script>
    <script>var urlcheckCart = "{{route('check.cart')}}";</script>
    <script>var urlcheckoutCart = "{{route('cart.review')}}";</script>
    
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
@endpush