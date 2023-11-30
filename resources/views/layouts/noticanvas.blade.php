<div class="offcanvas offcanvas-start bg-primary" tabindex="-1" id="offcanvasNotificacion" aria-labelledby="offcanvasNotificacionLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Solicitudes Smash</h5>
    <button type="button" class="btn btn-sm d-flex mx-2 text-reset" style="color: white !important;" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="fas fa-times text-ligth mx-2" aria-hidden="true"> </i> Cerrar
    </button>
  </div>
  <div class="offcanvas-body">
    @auth
 
    <div>
        <img src="{{asset('assets/img/illustrations/notificacion.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
        <h4 class="p-2 text-center text-ligth">No tienes mensajes por ahora</h4>
        <p class="text-ligth text-center" style="font-size: 16px;">Aquí podras aceptar o rechazar los codigos promocionales que compartiste a tus amigos.</p>
    </div>
   @endauth
    <!-- <table class="table" style="border-color: #01983A;">
    <thead>
        <tr>
        <th class="text-ligth" scope="col">Cod.</th>
        <th class="text-ligth" scope="col">Usuario</th>
        <th class="text-ligth" scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
       
        <tr>
            <th scope="row"><span class="text-ligth">$item->user_id</span></th>
            <td><span class="text-ligth">$item->user->name</span></td>
            <td>
                <div class="row">
                    <div class="col-6">
                        <button class="btn p-0" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotificacion" aria-controls="offcanvasNotificacion">
                            <i class="fa fa-trash" style="color: gray;"> </i>
                        </button> 
                    </div>
                    <div class="col-6">
                        <button class="btn p-0" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotificacion" aria-controls="offcanvasNotificacion">
                            <i class="fa fa-check-square text-ligth"> </i>
                        </button> 
                    </div>
                </div>
            </td>
        </tr> 
       
  </tbody>
</table> -->
  </div>
</div>