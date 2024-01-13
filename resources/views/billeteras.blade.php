@extends('layouts.app')
<style>
    #gallery {
  padding-top: 40px;
}
@media screen and (min-width: 991px) {
  #gallery {
    padding: 60px 30px 0 30px;
  }
}

.img-wrapper {
  position: relative;
  margin-top: 15px;
}
.img-wrapper img {
  width: 100%;
}

.img-overlay {
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
}
.img-overlay i {
  color: #fff;
  font-size: 3em;
}

#overlay {
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#overlay img {
  margin: 0;
  width: 80%;
  height: auto;
  -o-object-fit: contain;
     object-fit: contain;
  padding: 5%;
}
@media screen and (min-width: 768px) {
  #overlay img {
    height: 95%;
  }
}
@media screen and (min-width: 1200px) {
  #overlay img {
    height: 95%;
  }
}

#exitButton {
  color: #fff;
  font-size: 2em;
  transition: opacity 0.8s;
  position: absolute;
  top: 15px;
  right: 15px;
}
#exitButton:hover {
  opacity: 0.7;
}
@media screen and (min-width: 768px) {
  #exitButton {
    font-size: 3em;
  }
}
</style>
@section('content')

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('layouts.header')
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content pt-0">          

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4 class="text-center">Lista de pagos con Billetera Digital</h4>
              </div>
              @if($orders->count() > 0)
              @foreach ($orders as $item)
              <div class="item">
                <ul class="p-0">
                    @if($item->type=="YAPE")
                    <li><img src="{{asset('assets/img/yape.png')}}" alt="" class="templatemo-item imgclass"></li>
                    @endif
                    @if($item->type=="PLIN")
                    <li><img src="{{asset('assets/img/plin.png')}}" alt="" class="templatemo-item imgclass"></li>
                    @endif
                    <li><h4>Usuario ID</h4><span>{{$item->user_id}}</span></li>    
                    <li><h4>Monto</h4><span>{{$item->monto}}</span></li>                
                    <li>
                        <!-- <h4>Vaucher</h4> -->
                        <span>
                            <section id="gallery">
                                <div class="container">
                                    <div id="image-gallery">
                                    <div class="row">
                                        <div class="image">
                                            <div class="img-wrapper" style="height: 50px;">
                                                <!-- <a href="https://marsgame.pe/storage/{{$item->vaucher}}"><img style="height: 50px;width: 50px;" src="https://marsgame.pe/storage/{{$item->vaucher}}" class="img-responsive"></a> -->
                                                <a href="http://127.0.0.1:8000/storage/{{$item->vaucher}}"><img style="height: 50px;width: 50px;" src="http://127.0.0.1:8000/storage/{{$item->vaucher}}" class="img-responsive"></a>
                                                <div class="img-overlay" style="width: 50px;height: 50px;margin-top: -30px;">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End row -->
                                    </div><!-- End image gallery -->
                                </div><!-- End container --> 
                            </section>
                        </span>
                    </li>
                    <li><h4>Teléfono</h4>
                      @if ($item->user->phone=="")
                      <span>Sin Cell</span>
                      @else
                      <span>{{$item->user->phone}}</span>
                      @endif
                    </li>  
                    <li>
                        <span>
                            <button data-id="{{$item->id}}" data-order="{{$item->order}}" data-userid="{{$item->user_id}}" data-tipo="{{$item->type}}" data-monto="{{$item->monto}}" style="border-radius: 30px;" 
                                class="btn btn-secondary main-border-button border-no-active aceptar-vaucher p-2 mt-2">
                                Aceptar
                            </button>
                            <button data-id="{{$item->id}}" style="border-radius: 30px;background-color: transparent;" 
                                class="btn btn-secondary main-border-button border-no-active rechazar-vaucher p-2 mt-2">
                                Rechazar
                            </button>
                        </span>
                    </li>
                    <!-- <li>
                        <span>
                            <button data-id="$item->order" style="border-radius: 30px;background-color: transparent;" 
                                class="btn btn-secondary main-border-button border-no-active rechazar-codigo p-2">
                                Rechazar
                            </button>
                        </span>
                    </li> -->
                </ul>
              </div>
              @endforeach
              @else
              <div>
                  <img src="{{asset('assets/img/illustrations/notificacion.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                  <h4 class="p-2 text-center text-ligth">No tienes pagos por revisar</h4>
                  <p class="text-ligth text-center" style="font-size: 16px;">Cuando tengas pagos por revisar, podrás verlos en esta sección.</p>
              </div>
              @endif
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>


  @include('layouts.footer')

      @include('layouts.offcanvas')
      @include('layouts.noticanvas')
 
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets1/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets1/js/tabs.js')}}"></script>
    <script src="{{asset('assets1/js/popup.js')}}"></script>
    <script src="{{asset('assets1/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>
    <script>
  $(".copiar_codigo").click(function (e) {
    e.preventDefault();
    var ele = $(this);
    var codigo = ele.attr("data-codigo");
    navigator.clipboard.writeText(codigo);

    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "success",
      title: "Tu código se copió en el portapapeles"
    });
  })
      
    </script>

    <script>
        $(".rechazar-vaucher").click(function (e){
            e.preventDefault();
            var ele = $(this);
            var id = ele.attr("data-id");
            $.ajax({
                url: "/rechazar-vaucher",
                method: "post",
				dataType: 'json',
                data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
                beforeSend: function () {
                    Swal.fire({
                        header: '...',
                        title: "cargando",
                        allowOutsideClick:false,
                        didOpen: () => {
                        Swal.showLoading()
                        }
                    });
                },
                success: function (response) {
                    if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito!',
                        text: response.msg,
                        allowOutsideClick: false,
                        confirmButtonText: "Ok",
                    })
                    .then(resultado => {
                        window.location.reload();
                    }) 
                    }
                    else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.msg,
                    })
                    }
                    
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: response.msg,
                    })
                }
            });
        })
    </script>

    <script>
        $(".aceptar-vaucher").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            var order = ele.attr("data-order");
            var userid = ele.attr("data-userid");
            var tipo = ele.attr("data-tipo");
            var monto = ele.attr("data-monto");
            var id = ele.attr("data-id");
            console.log(id);
            $.ajax({
                url: "/aceptar-vaucher",
                method: "post",
				dataType: 'json',
                data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
                    order: order,
                    userid: userid,
                    tipo: tipo,
                    monto: monto,
                    id: id
                },
                beforeSend: function () {
                    Swal.fire({
                        header: '...',
                        title: "cargando",
                        allowOutsideClick:false,
                        didOpen: () => {
                        Swal.showLoading()
                        }
                    });
                },
                success: function (response) {
                    if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito!',
                        text: response.msg,
                        allowOutsideClick: false,
                        confirmButtonText: "Ok",
                    })
                    .then(resultado => {
                        window.location.reload();
                    }) 
                    }
                    else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.msg,
                    })
                    }
                    
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: response.msg,
                    })
                }
            });
    
        })
    </script>

    <script>
        // Gallery image hover
        $( ".img-wrapper" ).hover(
        function() {
            $(this).find(".img-overlay").animate({opacity: 1}, 600);
        }, function() {
            $(this).find(".img-overlay").animate({opacity: 0}, 600);
        }
        );

        // Lightbox
        var $overlay = $('<div id="overlay"></div>');
        var $image = $("<img>");
        var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
        var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
        var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

        // Add overlay
        $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
        $("#gallery").append($overlay);

        // Hide overlay on default
        $overlay.hide();

        // When an image is clicked
        $(".img-overlay").click(function(event) {
        // Prevents default behavior
        event.preventDefault();
        // Adds href attribute to variable
        var imageLocation = $(this).prev().attr("href");
        // Add the image src to $image
        $image.attr("src", imageLocation);
        // Fade in the overlay
        $overlay.fadeIn("slow");
        });

        // When the overlay is clicked
        $overlay.click(function() {
        // Fade out the overlay
        $(this).fadeOut("slow");
        });

        // When next button is clicked
        $nextButton.click(function(event) {
        // Hide the current image
        $("#overlay img").hide();
        // Overlay image location
        var $currentImgSrc = $("#overlay img").attr("src");
        // Image with matching location of the overlay image
        var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
        // Finds the next image
        var $nextImg = $($currentImg.closest(".image").next().find("img"));
        // All of the images in the gallery
        var $images = $("#image-gallery img");
        // If there is a next image
        if ($nextImg.length > 0) { 
            // Fade in the next image
            $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
        } else {
            // Otherwise fade in the first image
            $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
        }
        // Prevents overlay from being hidden
        event.stopPropagation();
        });

        // When previous button is clicked
        $prevButton.click(function(event) {
        // Hide the current image
        $("#overlay img").hide();
        // Overlay image location
        var $currentImgSrc = $("#overlay img").attr("src");
        // Image with matching location of the overlay image
        var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
        // Finds the next image
        var $nextImg = $($currentImg.closest(".image").prev().find("img"));
        // Fade in the next image
        $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
        // Prevents overlay from being hidden
        event.stopPropagation();
        });

        // When the exit button is clicked
        $exitButton.click(function() {
        // Fade out the overlay
        $("#overlay").fadeOut("slow");
        });
    </script>
  @endsection
