<div  class="offcanvas offcanvas-end bg-primary" style="display: block;height: 100%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">   
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
        <div class="" style="margin: 0;position: absolute;top: 25%;">
            <img src="{{asset('assets/img/illustrations/carritocompras.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="150" alt="">
            <h4 class="p-2 text-center text-ligth">No hay compras por aquí</h4>
            <p class="text-ligth text-center" style="font-size: 16px;">Todavía no tienes ningún artículo dentro de tu carrito de compras</p>
        </div>
        @else
        <table class="table" style="border-color: #01983A;">
        <thead>
            <tr>
            <th class="text-ligth col-3" scope="col">Prod.</th>
            <th class="text-ligth col-3" scope="col">P/U.</th>
            <th class="text-ligth col-4" scope="col"></th>
            <th class="text-ligth col-2" scope="col"></th>
            </tr>
        </thead>
        <tbody> 
            @foreach (Cart::getContent() as $item)
            <tr>
                <th scope="row"><span class="text-ligth">{{$item->name}} - {{$item->attributes->cantidadticket}}</span></th>
                <td><span class="text-ligth">S/ {{$item->price}}</span></td>
                <td>
                    <div class="input-group">
                        <input class="btn btn-secondary p-2 restar" data-id="{{$item->name}}" type="button" value="-" style="width: 30px;"
                            onclick="document.getElementById('{{$item->name}}').value = parseInt(document.getElementById('{{$item->name}}').value) - 1">                       
                        <input type="text" class="form-control p-2 text-center" id="{{$item->name}}" placeholder="" value="{{$item->quantity}}" disabled>
                        <input class="btn btn-secondary p-2 sumar" data-id="{{$item->name}}" type="button" value="+" style="width: 30px;"
                            onclick="document.getElementById('{{$item->name}}').value = parseInt(document.getElementById('{{$item->name}}').value) + 1">                        
                    </div> 
                </td>
                <td>
                    <button data-id="{{$item->name}}" class="btn p-0 ml-2 d-block mx-auto eliminar" type="button" style="font-size: 20px;">
                        <i class="fa fa-trash" style="color: gray;"> </i>
                    </button>
                </td>
            </tr> 
            @endforeach
        </tbody>
        </table>
        <!-- <div> -->
            <!-- foreach (Cart::getContent() as $item) -->
            <!-- <div class="row p-2">
                <div class="col-3 pt-2">
                    <span class="text-ligth">{{$item->name}} </span>
                </div>
                <div class="col-3 pt-2">
                    <span class="text-ligth">S/ {{$item->price}}</span>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input class="btn btn-secondary p-2 restar" data-id="{{$item->name}}" type="button" value="-" style="width: 30px; "
                            onclick="document.getElementById('{{$item->name}}').value = parseInt(document.getElementById('{{$item->name}}').value) - 1">                       
                        <input type="text" class="form-control p-2 text-center" id="{{$item->name}}" placeholder="" value="{{$item->quantity}}" disabled>
                        <input class="btn btn-secondary p-2 sumar" data-id="{{$item->name}}" type="button" value="+" style="width: 30px;"
                            onclick="document.getElementById('{{$item->name}}').value = parseInt(document.getElementById('{{$item->name}}').value) + 1">                        
                    </div>                    
                </div>
                <div class="col-2">
                    <button data-id="{{$item->name}}" class="btn p-0 ml-2 d-block mx-auto eliminar" type="button" style="font-size: 20px;">
                        <i class="fa fa-trash" style="color: gray;"> </i>
                    </button>   
                </div>
            </div>
            <hr class="dropdown-divider"> -->
            <!-- endforeach -->
        <!-- </div> -->
        <div style="position: absolute;bottom: 0px;right: 15px;left: 15px;">
            <div class="card-total-items card-bg-secondary p-4" style="border-radius: 15px;">
                <div class="d-flex justify-content-between cti-1 text-ligth">
                    <span>Subtotal</span>
                    <span class="ct-subtotal ml-0">S/. <input class="input-none" type="text" id="subtotal" value="{{Cart::getSubTotal()}}"></span>
                </div>

                <div class="d-flex justify-content-between cti-2 text-ligth">
                    <span>Descuento</span>
                    <span class="ct-subtotal ml-0">S/. <input class="input-none" type="text" id="descuento" value="0.00"></span>
                </div>

                <hr>

                <div class="d-flex justify-content-between cti-3 text-ligth">
                    <span>Total</span>
                    <span class="ct-total">S/.  <input class="input-none" type="text" id="total" value="{{Cart::getTotal()}}"> </span>
                </div>
            </div>
            
            <div class="row my-4">            
                <div class="col-6">
                    <form method="GET" action="{{ route('cart.create') }}">
                        <button type="submit" class="btn btn-secondary" style="width: 100%; background-color: transparent !important;">Limpiar</button>
                    </form>
                </div>
                <div class="col-6">
                    <a href="/checkout" class="btn btn-primary" style="width: 100%;" type="submit">Pagar</a>
                </div>                
            </div>            
        </div>
        @endif
        
    </div>
</div>

