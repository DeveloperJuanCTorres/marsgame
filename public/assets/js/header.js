$(".sumar").click(function (e){
  e.preventDefault();
  var ele = $(this);
  var id = ele.attr("data-id"); 

  $.ajax({
      url: "/cart/"+id,
      method: "PUT",
      dataType: 'json',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),           
        tipo: 'suma'
      },
      success: function (response) {
          if (response.status == true) {
            $('#subtotal').val(response.subtotal);
            $('#total').val(response.total);
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

$(".restar").click(function (e){
  e.preventDefault();
  var ele = $(this);
  var id = ele.attr("data-id"); 

  $.ajax({
      url: "/cart/"+id,
      method: "PUT",
      dataType: 'json',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),           
        tipo: 'resta'
      },
      success: function (response) {
          if (response.status == true) {
            $('#subtotal').val(response.subtotal);
            $('#total').val(response.total);
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

$(".sumar1").click(function (e){
  e.preventDefault();
  var ele = $(this);
  var id = ele.attr("data-id"); 

  $.ajax({
      url: "/cart/"+id,
      method: "PUT",
      dataType: 'json',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),           
        tipo: 'suma'
      },
      success: function (response) {
          if (response.status == true) {
            $('#subtotal').val(response.subtotal);
            $('#total').val(response.total);
            window.location.reload();
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

$(".restar1").click(function (e){
  e.preventDefault();
  var ele = $(this);
  var id = ele.attr("data-id"); 

  $.ajax({
      url: "/cart/"+id,
      method: "PUT",
      dataType: 'json',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),           
        tipo: 'resta'
      },
      success: function (response) {
          if (response.status == true) {
            $('#subtotal').val(response.subtotal);
            $('#total').val(response.total);
            window.location.reload();
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

$(".eliminar").click(function (e){
  e.preventDefault();
  var ele = $(this);
  var id = ele.attr("data-id"); 

  $.ajax({
      url: "/cart/"+id,
      method: "DELETE",
      dataType: 'json',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function (response) {
          if (response.status == true) {
            $('#subtotal').val(response.subtotal);
            $('#total').val(response.total);
            $('#carcount').val(response.carcount);
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
  $(this).closest('tr').remove();

})

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
    preConfirm: (codigo) => {
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
  })
  })

  $(".add_sugerencia").click(function (e) {
    e.preventDefault();
    Swal.fire({
    title: 'Puedes describirnos una sugerencia de premios',
    input: 'textarea',
    inputPlaceholder: "Escribe tus sugerencias...",
    background: '#2D2E83',
    color: 'white',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Enviar solicitud',
    confirmButtonColor: '#00983A',
    cancelButtonText:'Cancelar',
    preConfirm: (sugerencia) => {
      $.ajax({
        url: "/enviarsugerencia",
        method: "post",
        dataType: 'json',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),           
          sugerencia: sugerencia
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
  })
  })

  $(".depositar").click(function (e) {
    e.preventDefault();
    Swal.fire({
    title: 'Ingresa el monto a depositar',
    input: 'number',
    background: '#2D2E83',
    color: 'white',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Depositar',
    confirmButtonColor: '#00983A',
    cancelButtonText:'Cancelar',
    preConfirm: (monto) => {
      Swal.fire({
        icon: 'success',
        title: 'Exito',
        text: 'Está apunto de realizar un depósito',
        allowOutsideClick: false,
        confirmButtonText: "Aceptar",
      })
      .then(resultado => {
        window.location.href = "https://marsgame.pe/depositar/" + monto;
        //window.location.href = "http://127.0.0.1:8000/depositar/" + monto;
      }) 
    },
    allowOutsideClick: () => !Swal.isLoading()
  })
  })

  