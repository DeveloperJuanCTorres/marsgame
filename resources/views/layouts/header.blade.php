<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 data-navbar-on-scroll" style="background-color: #2D2E83;" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="{{asset('assets/img/logo1.png')}}" width="200" alt="">
            <!-- <span class="text-primary fs-3 ms-2 fw-bolder">Mars</span><span class="fw-thin text-300 fs-3">Game</span> -->
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse pt-4 pt-lg-0" id="navbarSupportedContent">
          
              <ul class="list-unstyled list-inline my-2" style="margin-left: auto;margin-left: auto;">
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-facebook-square fa-2x social-icons"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-instagram fa-2x social-icons"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-twitter-square fa-2x social-icons"> </i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-linkedin fa-2x social-icons"></i></a></li>
              </ul>
          
            <ul class="navbar-nav ms-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="/#">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="/#products">Participar</a></li>
              <!-- <li class="nav-item px-2"><a class="nav-link" href="/#clientes">Próximo Sorteo</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="/#ultimosorteos">Último Sorteos</a></li> -->
              <li class="nav-item px-2"><a class="nav-link" href="/#promociones">Promociones</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="/#contact">Contáctanos</a></li>
            </ul>
            <div class="d-flex mt-2 align-items-center mt-lg-0">
              <div class="dropdown">
                  <button class="btn btn-sm d-flex" style="font-size: 20px;" type="submit" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user text-primary"> </i>
                  </button>                             
                <ul class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton2" style="top:55px;">
                  @auth   
                  <li><a class="dropdown-item" href="#">Datos Personales</a></li>
                  <li><a class="dropdown-item" href="#">Mis jugadas</a></li>
                  <li><a class="dropdown-item" href="#">Mis movimientos</a></li>
                  <li><a class="dropdown-item" href="#">Puntos acumulados</a></li>
                  <li><a class="dropdown-item" href="#">Mis premios</a></li>
                  @else
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Registrarme</a></li>
                  @endauth
                  
                  @auth
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        🚪 Cerrar sesión 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                  @endauth
                </ul> 
              </div>                                 
                             
            </div>
            <button class="btn btn-sm d-flex" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <i class="fas fa-shopping-cart text-primary"> </i>
              <span class="position-absolute top-10 start-97 translate-middle badge rounded-pill bg-danger" style="font-size: 8px;">
                0
                <span class="visually-hidden">unread messages</span>
              </span>
            </button>  
          </div>
        </div>
    </nav>