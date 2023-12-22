<nav class="navbar navbar-expand-lg navbar-light fixed-top data-navbar-on-scroll nav-header">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="{{asset('assets/img/logo.png')}}" width="200" alt="">
            <!-- <span class="text-primary fs-3 ms-2 fw-bolder">Mars</span><span class="fw-thin text-300 fs-3">Game</span> -->
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="mt-2 align-items-center mt-lg-0 movil-block">
              <div class="dropdown">
                  @auth
                  <button class="btn btn-sm d-flex btn-border" type="submit" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <i class="fas fa-user text-primary text-white"> </i> -->
                    <img class="imgclass" src="storage/{{ Auth::user()->avatar }}" alt="" style="width: 20px;border-radius: 60px;">
                    <span class="text-white text-justify-center px-2" style="display: block;margin-top: auto;margin-bottom: auto;">S/. {{$saldo}}</span>
                  </button>   
                  @else
                  <a href="/login" class="btn btn-sm d-flex btn-border text-white">Iniciar sesión</a>
                  @endauth
                <ul class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton2" style="top:55px;">
                  @auth   
                  <div class="row p-2">
                    <div class="col-7">
                      <span class="text-black" style="font-size: small;font-weight: bold;">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                    </div>
                    <div class="col-5">
                      <span class="text-black">S/. {{$saldo}}</span>
                    </div>
                  </div>
                  <div class="row p-2">
                    <div class="col-6">
                      <button class="btn btn-primary" style="padding: 10px;width: 100%;">Retirar</button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-secondary depositar" style="padding: 10px;width: 100%;">Depositar</button>
                    </div>
                  </div>  
                  @else
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Registrarme</a></li>
                  @endauth
                  
                  @auth
                  <li><hr class="dropdown-divider"></li>
                  <li>                    
                    <a class="dropdown-item" href="/perfil">
                      <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; Mi Cuenta 
                    </a>
                  </li>
                  <li>                    
                    <a class="dropdown-item" href="/codigos">
                      <i class="fa fa-code" aria-hidden="true"></i>&nbsp; Mis códigos
                    </a>
                  </li>
                  <li>                    
                    <button class="dropdown-item add_codigo" id="add_codigo">
                      <i class="fa fa-terminal" aria-hidden="true"></i>&nbsp;&nbsp; Agregar código
                    </button>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                  <li class="pb-4">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-clone" aria-hidden="true"></i>&nbsp;&nbsp; Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                  @endauth
                </ul> 
              </div>                                 
                             
            </div>  
            <button class="btn btn-sm p-2 add_sugerencia animacion" id="add_sugerencia" type="button" style="font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Suegerencia de premios">
              <i class="fa fa-gift text-white" aria-hidden="true"> </i>
            </button>            
            @auth
            <button class="btn btn-sm p-2 movil-block" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotificacion" aria-controls="offcanvasNotificacion">
              <i class="fa fa-bell text-white"> </i>
              <span class="badge rounded-pill bg-danger" style="font-size: 8px;float: right;display:block;position:relative;">
              {{$noticount}}
              </span>
            </button>             
            @endauth             
            <button class="btn btn-sm p-2 movil-block" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <i class="fas fa-shopping-cart text-white"> </i>
              <span class="badge rounded-pill bg-danger" id="totalCheckou" style="font-size: 8px;float: right;display:block;position:relative;">
               <input id="carcount" class="input-none p-0 text-center" style="width: 8px;" type="text" value="{{Cart::getContent()->count()}}">
              </span>
            </button> 
          
          <div class="collapse navbar-collapse pt-4 pt-lg-0" id="navbarSupportedContent">
          
              <ul class="list-unstyled list-inline my-2" style="margin-left: auto;margin-left: auto;">
                <li class="list-inline-item"><a class="text-decoration-none" target="_blank" href="https://www.facebook.com/groups/7721005837927044/?ref=share&mibextid=KtfwRi"><i class="fab fa-facebook-square fa-2x text-white"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" target="_blank" href="https://www.instagram.com/marsgame.pe?igshid=OGQ5ZDc2ODk2ZA=="><i class="fab fa-instagram fa-2x text-white"></i></a></li>
                <!-- <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-twitter-square fa-2x text-white"> </i></a></li> -->
                <li class="list-inline-item"><a class="text-decoration-none" target="_blank" href="https://www.tiktok.com/@adm.marsgame"><i class="fab fa-tiktok fa-2x text-white"></i></a></li>
              </ul>
          
            <ul class="navbar-nav ms-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item px-2"><a class="nav-link text-white" aria-current="page" href="/#">Inicio</a></li>
              <!-- <li class="nav-item px-2"><a class="nav-link text-white" href="/#participar">Premios</a></li> -->
              <li class="nav-item px-2"><a class="nav-link text-white" href="/#promociones">Planes</a></li>
              <!-- <li class="nav-item px-2"><a class="nav-link text-white" href="/tienda">Tienda</a></li> -->
              <li class="nav-item px-2"><a class="nav-link text-white" href="/#contact">Contáctanos</a></li>
            </ul>
            <!-- <span class="d-inline-block" > -->
              <button class="btn btn-sm p-2 add_sugerencia animacion" id="add_sugerencia" type="button" style="font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Suegerencia de premios">
                <i class="fa fa-gift text-white" aria-hidden="true"> </i>
              </button>
            <!-- </span> -->
            @auth
            <button class="btn btn-sm movil p-2" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotificacion" aria-controls="offcanvasNotificacion">
              <i class="fa fa-bell text-white"> </i>
              <span class="badge rounded-pill bg-danger" style="font-size: 8px;float: right;display:block;position:relative;">
              {{$noticount}}
              </span>
            </button>             
            @endauth 
            <button class="btn btn-sm movil p-2" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <i class="fas fa-shopping-cart text-white"> </i>
              <span class="badge rounded-pill bg-danger" id="totalCheckou" style="font-size: 8px;float: right;display:block;position:relative;">
               <input id="carcount" class="input-none p-0 text-center" style="width: 8px;" type="text" value="{{Cart::getContent()->count()}}">
              </span>
            </button> 
            <div class="mt-2 align-items-center mt-lg-0 movil">
              <div class="dropdown">
                  @auth
                  <button class="btn btn-sm d-flex btn-border" type="submit" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <i class="fas fa-user text-primary text-white"> </i> -->
                    <img class="imgclass" src="storage/{{ Auth::user()->avatar }}" alt="" style="width: 30px;border-radius: 60px;">
                    <span class="text-white text-justify-center px-2" style="display: block;margin-top: auto;margin-bottom: auto;">S/. {{$saldo}}</span>
                  </button>   
                  @else
                  <a href="/login" class="btn btn-sm d-flex btn-border text-white">Iniciar sesión</a>
                  @endauth
                <ul class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton2" style="top:55px;">
                  @auth   
                  <div class="row p-2">
                    <div class="col-7">
                      <span class="text-black" style="font-size: small;font-weight: bold;">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                    </div>
                    <div class="col-5">
                      <span class="text-black">S/. {{$saldo}}</span>
                    </div>
                  </div>
                  <div class="row p-2">
                    <div class="col-6">
                      <button class="btn btn-primary" style="padding: 10px;width: 100%;">Retirar</button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-secondary depositar" style="padding: 10px;width: 100%;">Depositar</button>
                    </div>
                  </div>  
                  @else
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Registrarme</a></li>
                  @endauth
                  
                  @auth
                  <li><hr class="dropdown-divider"></li>
                  <li>                    
                    <a class="dropdown-item" href="/perfil">
                      <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; Mi Cuenta 
                    </a>
                  </li>
                  <li>                    
                    <a class="dropdown-item" href="/codigos">
                      <i class="fa fa-code" aria-hidden="true"></i>&nbsp; Mis códigos
                    </a>
                  </li>
                  <li>                    
                    <button class="dropdown-item add_codigo" id="add_codigo">
                      <i class="fa fa-terminal" aria-hidden="true"></i>&nbsp;&nbsp; Agregar código
                    </button>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                  <li class="pb-4">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-clone" aria-hidden="true"></i>&nbsp;&nbsp; Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                  @endauth
                </ul> 
              </div>                                 
                             
            </div>            
          </div>
        </div>
        
    </nav>

  <script>
   

    $(".btn_comprar").click(function (e) {
      e.preventDefault();
      swal("Write something here:", {
        content: "input",
      })
      .then((value) => {
        swal(`You typed: ${value}`);
      });
    })
  </script>
