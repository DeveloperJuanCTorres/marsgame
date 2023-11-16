<div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">   
    <div class="offcanvas-header">
        <h4 class="text-white" id="offcanvasRightLabel">
            <i class="fas fa-shopping-cart text-white mx-2"> </i> Tu carrito
        </h4>
        <button type="button" class="btn btn-sm d-flex mx-2 text-reset text-white" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fas fa-times text-white mx-2" aria-hidden="true"> </i> Cerrar
        </button>
    </div>
    <div class="offcanvas-body">
        <div>
            <img src="{{asset('assets/img/illustrations/carritocompras.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
            <h4 class="p-2 text-center text-white">No hay compras por aquí</h4>
            <p class="text-white text-center" style="font-size: 16px;">Todavía no tienes ningún artículo dentro de tu carrito de compras</p>
        </div>
        <div style="padding-top: 20px;">
            <div class="card-total-items card-bg-secondary p-4" style="border-radius: 15px;">
                <div class="d-flex justify-content-between cti-1 text-white">
                    <span>Subtotal</span>
                    <span class="ct-subtotal">S/. 0.00</span>
                </div>

                <div class="d-flex justify-content-between cti-2 text-white">
                    <span>Descuento</span>
                    <span class="ct-discount">-s/. 0.00</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between cti-3 text-white">
                    <span>Total</span>
                    <span class="ct-total">S/. 0.00</span>
                </div>
            </div>
            <div class="row my-4">
                    <div class="col-6">
                        <button class="btn btn-secondary" style="width: 100%; background-color: transparent !important;" type="submit">Limpiar</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary" style="width: 100%;" type="submit">Comprar</button>
                    </div>
            </div>
        </div>
    </div>
</div>