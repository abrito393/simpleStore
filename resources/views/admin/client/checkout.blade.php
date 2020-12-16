@extends('layouts.app')

@section('title')
  Home
@endsection

@section('container')

  <div class="row border rounded bg-foreground-element opcAdmin">
    <div class="col-sm-12">
        <div class="jumbotron">
            <h3>Mis Direcciones de envio </h3>    
            @if(count($direcciones) <= 0)
                <div class="alert alert-alert bg-alert" style="color:red;">
                    <strong>Importante!</strong> debe tener una direccion de envio para culminar el proceso.
                </div>
            @else 
                <div class="form-group">
                    <select class="form-control" id="sel1">
                        @foreach($direcciones as $direccion)
                            <option value={{$direccion->id}}>{{$direccion->address}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <h2 style="color:black;">Detalle del pedido</h2>
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($data as $single)
                        <tr>
                            <td>{{$single->product->name}}</td>
                            <td>{{$single->product->price}}$</td>
                        </tr>
                        @php $total+= $single->product->price; @endphp
                    @endforeach
                </tbody>
            </table>
            @if(count($direcciones) > 0)
            <div class="col-sm-12">
                <a href="{{route('cart.pay',$user_id)}}" ><button type="button" class="btn btn-success">pagar</button></a>
            </div>
            @endif
        </div>

    </div>


</div>
  


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