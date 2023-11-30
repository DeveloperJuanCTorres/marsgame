$(document).on('click', '.aceptar', function(event) {
    event.preventDefault();
    var ele = $(this);
    var id = ele.attr("data-id");
    Swal.fire({
      icon: 'success',
      title: 'Estás apunto de aceptar este código smash',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#00983A',
      background: '#2D2E83',
      color: 'white'
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).closest('tr').remove();
        $.ajax({
        url: "/aceptarcodigo",
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
          if (response) {
            $(this).closest('tr').remove();
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: response.msg,
                allowOutsideClick: false,
                confirmButtonText: "Ok",
            })
            .then(resultado => {
              // $(this).closest('tr').remove();
            }) 
          }
          else{
            Swal.fire({
                icon: 'error',
                title: 'Algo salió mal',
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
      })
      } 
    });     

   
  });


  $(document).on('click', '.rechazar', function(event) {
    event.preventDefault();
    var ele = $(this);
    var id = ele.attr("data-id");
    Swal.fire({
      icon: 'question',
      title: 'Estás seguro de rechazar este código smash?',
      showCancelButton: true,
      confirmButtonText: 'SÍ, Rechazar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#00983A',
      background: '#2D2E83',
      color: 'white'
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).closest('tr').remove();
        $.ajax({
        url: "/rechazarcodigo",
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
          if (response) {
            $(this).closest('tr').remove();
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: response.msg,
                allowOutsideClick: false,
                confirmButtonText: "Ok",
            })
            .then(resultado => {
              // $(this).closest('tr').remove();
            }) 
          }
          else{
            Swal.fire({
                icon: 'error',
                title: 'Algo salió mal',
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
      })
      } 
    });  

  });

  $(".add_codigo").click(function (e) {
    e.preventDefault();
    Swal.fire({
    title: 'Ingresa tu código smash',
    input: 'text',
    background: '#2D2E83',
    color: 'white',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Enviar solicitud',
    confirmButtonColor: '#00983A',
    cancelButtonText:'Cancelar',
    showLoaderOnConfirm: true,
    preConfirm: (codigo) => {
      // return fetch(`//api.github.com/users/${login}`)
      $.ajax({
        url: "/enviarcodigo",
        method: "post",
        dataType: 'json',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),           
          code: codigo
        } ,
        success: function (response) {
            if (response.status==true) {
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: response.msg,
                allowOutsideClick: false,
                confirmButtonText: "Ok",
            })
            .then(resultado => {
            // window.location.reload();
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
      })        
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: `${result.value.login}'s avatar`,
        imageUrl: result.value.avatar_url
      })
    }
  })
  })