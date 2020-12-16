@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<h2>Ordenes</h2>

@php $x=1; @endphp
@foreach($data as $single)
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseOne{{$single->id}}">
                    Order #{{$single->id}}
                </a>
            </div>
            <div id="collapseOne{{$single->id}}" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    @foreach($single->products as $details)
                      <ul class="list-group">
                          <li class="list-group-item list-group-item-dark"><b>producto</b>: {{$details->product->name}}</li>
                          <li class="list-group-item list-group-item-dark"><b>Precio</b>: {{$details->product->price}}$</li>
                      </ul>
                      <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @php $x++; @endphp
@endforeach


  <div class="row">
    <div class="col-lg-12">
        {{$data->render()}}
    </div>
</div>



@endsection

@include('cart')

@push('js')
    <script>var urlx = "{{route('user.login')}}";</script>
    <script>var urlUserShow = "{{route('user.show')}}";</script>
    <script>var urlcheckoutCart = "{{route('cart.review')}}";</script>
    <script>var urlcheckCart = "{{route('check.cart')}}";</script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
@endpush