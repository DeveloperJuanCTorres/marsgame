
    const btn_pagar = document.getElementById('btn_pagar');

    btn_pagar.addEventListener('click', function (e) {
        
        Culqi.settings({
            title: 'MARS INVESTMENTS S.A.C.',
            currency: 'PEN',  // Este parámetro es requerido para realizar pagos yape
            amount: 1000,  // Este parámetro es requerido para realizar pagos yape
            order: 'ord_test_0CjjdWhFpEAZlxlz' // Este parámetro es requerido para realizar pagos con pagoEfectivo, billeteras y Cuotéalo
        });

        Culqi.options({
            lang: "auto",
            installments: false, // Habilitar o deshabilitar el campo de cuotas
            paymentMethods: {
                tarjeta: true,
                yape: true, 
                bancaMovil: true,
                agente: true,
                billetera: true,
                cuotealo: false,
            },
            style: {
                logo: 'https://eventqr.agenciaonfleek.com/assets/img/logo3.png',
                bannerColor: '#C3A531', 
                buttonBackground: '#C3A531'
            },
        });

        Culqi.open();
        e.preventDefault();

        
    })

    

    function culqi() {
        console.log('INICIO DE PRUEBA');
        if (Culqi.token) {  // ¡Objeto Token creado exitosamente!
            const token = Culqi.token.id;
            const email = Culqi.token.email;
            console.log('Se ha creado un Token: ', token);
            //En esta linea de codigo debemos enviar el "Culqi.token.id"
            //hacia tu servidor con Ajax
        
            $.ajax({
                url: "procesarpago.php",
                type: "POST",
                data: {
                    token: token,
                    email: email
                },
                beforeSend: function () {
                    Swal.fire({
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
                            title: 'Titulo',
                            text: "Compra realizada con exito",
                            allowOutsideClick: false,
                            confirmButtonText: "Regresar al Inicio",
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
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: "Upps, sucedio un error",
                        text: "Something went wrong!",
                    })
                }
            });

        } else if (Culqi.order) {  // ¡Objeto Order creado exitosamente!
        const order = Culqi.order;
        console.log('Se ha creado el objeto Order: ', order);
        
        } else {
        // Mostramos JSON de objeto error en consola
        console.log('Error : ',Culqi.error);
        }
    }

