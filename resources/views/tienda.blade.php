@extends('layouts.app')
@section('content')

<style>
    /* Lazy Load Styles */
.card-image {
	display: block;
	min-height: 20rem; /* layout hack */
	background: #fff center center no-repeat;
	background-size: cover;
	/* filter: blur(3px);  */
}

.card-image > img {
	display: block;
	width: 100%;
	opacity: 0; /* visually hide the img element */
}

.card-image.is-loaded {
	filter: none; /* remove the blur on fullres image */
	transition: filter 1s;
}


.card-list {
	display: block;
	margin: 1rem auto;
	padding: 0;
	font-size: 0;
	text-align: center;
	list-style: none;
}

.card {
	display: inline-block;
	width: 90%;
	max-width: 20rem;
	margin: 1rem;
	font-size: 1rem;
	text-decoration: none;
	overflow: hidden;
	box-shadow: 0 0 3rem -1rem rgba(0,0,0,0.5);
	transition: transform 0.1s ease-in-out, box-shadow 0.1s;
}

.card:hover {
	transform: translateY(-0.5rem) scale(1.0125);
	box-shadow: 0 0.5em 3rem -1rem rgba(0,0,0,0.5);
}

.card-description {
	display: block;
	padding: 1em 0.5em;
	color: #515151;
	text-decoration: none;
    background-color: #2D2E83;
}

.card-description > h2 {
	margin: 0 0 0.5em;
}

.card-description > p {
	margin: 0;
}
</style>

@include('layouts.header')
@include('layouts.offcanvas')

<section class="py-8">
    <div class="container">
        <div class="align-items-center">
            <img src="{{asset('assets/img/banner5.jpg')}}" style="border-radius: 20px;width: 100%; height: 100%;" alt="">
            <h2 class="text-center my-4">Tienda</h2>
            <div>
                <ul class="card-list">
                    @foreach($store as $item)
                    <li class="card">
                        <!-- <a class="card-image" href="#!" style="background-image: url(http://127.0.0.1:8000/storage/$item->image);" data-image-full="http://127.0.0.1:8000/storage/{{$item->image}}">
                            <img class="card-image" src="http://127.0.0.1:8000/storage/{{$item->image}}" alt="Psychopomp" />
                        </a> -->
                        <img class="card-image w-100" src="https://marsgame.pe/storage/{{$item->image}}" alt="{{$item->name}}" />
                        <a class="card-description" href="#!">
                            <h5>{{$item->name}}</h5>
                            <div class="row">
                                <div class="col-6">
                                    <span class="text-light d-block my-auto mt-3">S/. {{$item->price}}</span>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn1 btn-gradient mt-2 padding-left-0 btn_comprar"
                                        data-id='{{$item->id}}{{$item->name}}'
                                        data-name='{{$item->name}}'
                                        data-price='{{$item->price}}'
                                        data-quantity='1'
                                        data-productid='{{$item->id}}'
                                        data-imagen='http://127.0.0.1:8000/storage/{{$item->image}}'>
                                        Comprar
                                    </button>
                                </div>
                            </div>                            
                        </a>
                    </li> 
                    @endforeach               
                </ul>
            </div>
            
        </div>
    </div>
</section>

@include('layouts.footer')  
@include('layouts.noticanvas')

<script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/header.js')}}"></script>

<script>
    $(".btn_comprar").click(function (e) {
      e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");
        var name = ele.attr("data-name");
        var price = ele.attr("data-price");
        var quantity = ele.attr("data-quantity");
        var codigos = ele.attr("data-codigos");
        var mensual = ele.attr("data-mensual");
        var cantidad_meses = ele.attr("data-cantidadmeses");
        var product_id = ele.attr("data-productid");
        var imagen = ele.attr("data-imagen");

        console.log(codigos);

        $.ajax({
            url: "/cart",
            method: "post",
            dataType: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                name: name,
                price: price,
                quantity: quantity,
                productid: product_id,
                imagen: imagen
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
                 if (response.status == true) {
                  // $('#carcount').val(response.count); Esto es para actualizar el contador del carrito
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
                     icon: 'info',
                     title: 'Advertencia!',
                     text: response.msg,
                 })
                }

             },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...!!',
                    text: 'Something went wrong!!',
                  })
            }
        });
    })
</script>

<script>
    // This is "probably" IE9 compatible but will need some fallbacks for IE8
// - (event listeners, forEach loop)

// wait for the entire page to finish loading
window.addEventListener('load', function() {
	
	// setTimeout to simulate the delay from a real page load
	setTimeout(lazyLoad, 1000);
	
});

function lazyLoad() {
	var card_images = document.querySelectorAll('.card-image');
	
	// loop over each card image
	card_images.forEach(function(card_image) {
		var image_url = card_image.getAttribute('data-image-full');
		var content_image = card_image.querySelector('img');
		
		// change the src of the content image to load the new high res photo
		content_image.src = image_url;
		
		// listen for load event when the new photo is finished loading
		content_image.addEventListener('load', function() {
			// swap out the visible background image with the new fully downloaded photo
			card_image.style.backgroundImage = 'url(' + image_url + ')';
			// add a class to remove the blur filter to smoothly transition the image change
			card_image.className = card_image.className + ' is-loaded';
		});
		
	});
	
}


</script>

@endsection