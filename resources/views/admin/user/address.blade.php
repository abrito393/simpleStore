@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')
<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Direccion</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $address)
            <tr>
                <td>{{$address->address}}</td>
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
@endpush