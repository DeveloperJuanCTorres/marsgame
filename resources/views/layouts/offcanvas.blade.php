<div class="offcanvas offcanvas-end bg-primary" style="display: block;height: 100%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">   
    <div class="offcanvas-header">
        <h4 class="text-ligth" id="offcanvasRightLabel">
            <i class="fas fa-shopping-cart text-ligth mx-2"> </i> Tu carrito
        </h4>
        <button type="button" class="btn btn-sm d-flex mx-2 text-reset" style="color: white !important;" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fas fa-times text-ligth mx-2" aria-hidden="true"> </i> Cerrar
        </button>
    </div>
    <div class="offcanvas-body">
        @if(Cart::getContent()->count()==0)
        <div>
            <img src="{{asset('assets/img/illustrations/carritocompras.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
            <h4 class="p-2 text-center text-ligth">No hay compras por aquí</h4>
            <p class="text-ligth text-center" style="font-size: 16px;">Todavía no tienes ningún artículo dentro de tu carrito de compras</p>
        </div>
        @else
        <div>
            @foreach (Cart::getContent() as $item)
            <!-- <div class="card-total-items card-bg-secondary p-6" style="border-radius: 15px;">
                <div class="d-flex justify-content-between cti-1 text-ligth">
                    <span>Subtotal</span>
                    <h5 class="ct-subtotal">{{$item->name}}</h5>
                </div>

                <div class="d-flex justify-content-between cti-2 text-ligth">
                    <span>Descuento</span>
                    <span class="ct-discount">-s/. 0.00</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between cti-3 text-ligth">
                    <h3>S/ {{$item->price}}</h3>
                    <h3>{{$item->quantity}}</h3>
                </div>
            </div> -->
            <div class="row">
                <div class="col-6">
                    <h4>{{$item->name}}</h4>
                </div>
                <div class="col-3">
                    <h5>S/ {{$item->price}}</h5>
                </div>
                <div class="col-3">
                    <h5>{{$item->quantity}}</h5>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <div style="position: absolute;bottom: 0px;right: 15px;left: 15px;">
            <div class="card-total-items card-bg-secondary p-4" style="border-radius: 15px;">
                <div class="d-flex justify-content-between cti-1 text-ligth">
                    <span>Subtotal</span>
                    <span class="ct-subtotal">S/. {{Cart::getSubTotal()}}</span>
                </div>

                <div class="d-flex justify-content-between cti-2 text-ligth">
                    <span>Descuento</span>
                    <span class="ct-discount">-s/. 0.00</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between cti-3 text-ligth">
                    <span>Total</span>
                    <span class="ct-total">S/. {{Cart::getTotal()}}</span>
                </div>
            </div>
            <div class="row my-4">
                    <div class="col-6">
                        <form method="GET" action="{{ route('cart.create') }}">
                            <button type="submit" class="btn btn-secondary" style="width: 100%; background-color: transparent !important;">Limpiar</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary" id="btn_participar" style="width: 100%;" type="submit">Comprar</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
    const btn_participar = document.getElementById('btn_participar');
    const btn_limpiar = document.getElementById('btn_limpiar');


    btn_participar.addEventListener('click', function (e){
        var formData = new FormData();
        var id = $("#id").val();
   
        formData.append('id',id);
        console.log(formData);
        $.ajax({
            url: "/participar",
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            contentType: false,
            processData: false,
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
              //cambiar gracias por tu compra Swal
                  // window.location.href = "/";
                  if (response.status) {
                  Swal.fire({
                      icon: 'success',
                      title: response.msg,
                      text: "Participación realizada con exito",
                      allowOutsideClick: false,
                      confirmButtonText: "Ok",
                  })
                  .then(resultado => {
                      window.location.href = "/";
                  }) 
                  }
                  else{
                  Swal.fire({
                      icon: 'error',
                      title: response.msg,
                      text: response.msg,
                  })
                  }
                  
            },
            error: function (response) {
              Swal.fire({
                  icon: 'error',
                  title: "Upps, sucedio un error",
                  text: response.msg,
              })
            }
        });
    })
    
  </script>

