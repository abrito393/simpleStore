<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
  <title>@yield("title")</title>
  <link rel="icon" href="https://2eo55h24wdu6nyeph4frss2b76-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/store-mng-icon-1.png">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  @yield('css')
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">DesafioLaravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active d-none">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Carrito <span><img style="width:1.5rem;" src="https://images.vexels.com/media/users/3/200097/isolated/lists/942820836246f08c2d6be20a45a84139-shopping-cart-icon-shopping-cart.png"></span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts')}}" >Posts <span><img style="width:1.5rem;" src="https://aux2.iconspalace.com/uploads/new-post-icon-256.png"></span> </a>
                </li>
                <li class="nav-item dropdown d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Carrito
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0 btnCreateAddress" href="{{route('client.address.create')}}">Agregar direccion</a>
            <a class="btn btn-outline-success my-2 my-sm-0 btnUser" href="{{route('user.info')}}">Usuario</a>
            <a class="btn btn-outline-success my-2 my-sm-0 btnUserClient" href="{{route('user.client.info')}}">Usuario</a>
            <a href="{{route('form.login')}}" class="btn btn-outline-success my-2 my-sm-0 btnLogin" >Login</a>
            <a href="#" class="btn btn-outline-danger my-2 my-sm-0 btnCloseSession" >Cerrar sesion</a>
 
                
            </div>
        </div>
    </nav>
  <div class="">
    @yield("container")
  </div>

  @stack('js')
</body>
</html>