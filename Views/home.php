<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-5 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center">
                        <strong class="text-white">Iniciar Sesión</strong><br>
                        <img class="img-thumbnail" src="/Assets/img/logo.jpg" width="100">
                    </div>
                    <div class="card-body" id="paso1">
                        <div>
                            <div class="form-group">
                                <strong class="text-primary">Usuario</strong>
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <strong class="text-primary">Contraseña</strong>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a style="cursor:pointer;" title="Refrezcar Captcha" onclick="grecaptcha.reset();" ><img width="70px;" src="/Assets/img/refresh-icon.jpg"></a>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="g-recaptcha" id="g-recaptcha1" data-sitekey="<?php echo CAPTCHA_SITE_PUBLIC; ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <input id="login" class="btn btn-primary btn-block" type="button" value="Iniciar" />
                            <a href="home/recuperar" class="btn btn-danger btn-block" >Recuperar credenciales</a>

                        </div>
                    </div>
                    <div class="card-body" id="paso2" style="display:none;">
                        <input type="hidden" id="qr_google_code">
                        <div>
                            <div class="form-group" id="paso2_qr">
                                <span><b>Para utilizar nuestros servicios, es necesario instalar el aplicativo Google Authenticator</b></span>
                                <ol>
                                    <li>Enlace de <a target="blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=es_PE&gl=US&pli=1">ANDROID</a> o enlace de <a target="blank" href="https://apps.apple.com/us/app/google-authenticator/id388497605">iOS</a> </li>
                                    <li>Escanee el QR que aparece en esta pantalla <i class="fa fa-hand-o-down" aria-hidden="true"></i></li>
                                </ol>
                                <div class="text-center">
                                    <img id="qr_google" src="">
                                </div>
                                <div class="text-center">
                                    <a target="blank" href="https://support.google.com/accounts/answer/1066447?hl=es-419&amp;co=GENIE.Platform%3DAndroid&amp;oco=0">¿Cómo instalar Google Autenticator?</a>
                                </div>
                            </div>
                            <div class="form-group" id="paso2_qr_code">
                                <strong class="text-primary">Código de Autenticación</strong>
                                <input id="google_code" class="form-control" type="text" name="google_code" placeholder="999999">
                            </div>
                            <!-- <div class="form-group">
                                <div class="g-recaptcha" id="g-recaptcha2" data-sitekey="<?php echo CAPTCHA_SITE_PUBLIC; ?>"></div>
                            </div> -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a style="cursor:pointer;" title="Refrezcar Captcha" onclick="grecaptcha.reset();" ><img width="70px;" src="/Assets/img/refresh-icon.jpg"></a>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="g-recaptcha" id="g-recaptcha2" data-sitekey="<?php echo CAPTCHA_SITE_PUBLIC; ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <input id="login2" class="btn btn-primary btn-block" type="button" value="Confirmar" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="Assets/js/jquery.min.js"></script>
<script src="Assets/js/sweetalert2@9.js"></script>

<script>
    jQuery(document).ready(function(){
        jQuery('#login').on('click', function (data) {
            validarLogin();
        });
        jQuery('#login2').on('click', function (data) {
            confirmarLogin();
        });

        $('#usuario').on('input', function(evt) {
            $(this).val(function(_, val) {
                return val.toUpperCase();
            });
        });
    })

     // Pasar los valores desde PHP a variables de JavaScript
    const documentRoot = "<?php echo $_SERVER['DOCUMENT_ROOT']; ?>";
    const baseUrl = "/";

    // Mostrar los valores en la consola
    console.log("Document Root:", documentRoot);
    console.log("Base URL:", baseUrl);


    function validarClave(clave) {
        let retorno = true;
        let array_rspta = [];

        // Validar longitud mínima de 12 caracteres
        if (clave.length < 12) {
            array_rspta.push('Debe tener al menos 12 caracteres.');
        }

        // Validar que contenga al menos una letra mayúscula
        if (!/[A-Z]/.test(clave)) {
            array_rspta.push('Debe incluir al menos una letra mayúscula.');
        }

        // Validar que contenga al menos un número
        if (!/[0-9]/.test(clave)) {
            array_rspta.push('Debe incluir al menos un número.');
        }

        // Validar que contenga al menos un carácter especial
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(clave)) {
            array_rspta.push('Debe incluir al menos un carácter especial.');
        }

        // Si hay errores, mostrar mensaje y bloquear el proceso
        if (array_rspta.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'La contraseña no es permitida',
                html: `Por favor, ir a la opción de <b>Recuperar Credenciales</b>.<br><br>
                    <b>Errores encontrados:</b><br>${array_rspta.join('<br>')}`,
                showConfirmButton: false
            });
            grecaptcha.reset();
            retorno = false;
        }

        return retorno;
    }

    function validarLogin() {      
    let usuario = jQuery('#usuario').val();
    let clave = jQuery('#clave').val();
    let recaptcha = jQuery('#g-recaptcha-response').val();

    jQuery.ajax({
        url: 'UsuariosValidate/login',
        async: true,
        data: { 
            'usuario': usuario, 
            'clave': clave, 
            'recaptcha': recaptcha
        },
        type: 'POST',
        success: function(response) {
            let data;
            try {
                data = JSON.parse(response);
            } catch (e) {
                console.error("Error al parsear JSON:", e);
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la respuesta del servidor.',
                    showConfirmButton: false
                });
                return;
            }

            if (!data.success) {
                console.error("Error en autenticación:", data.message);
                Swal.fire({
                    icon: 'error',
                    title: data.message.join('\n'),
                    showConfirmButton: false
                });
                grecaptcha.reset();
                return;
            }

            // *** Aquí validamos la clave después de que el login es correcto ***
            if (!validarClave(clave)) {
                return;
            }

            // Continuamos con la lógica de autenticación
            jQuery('#paso2_qr').hide();
            jQuery('#paso2_qr_code').hide();

            if (data.flg_google_auth) {
                if (!data.codigo_google) {
                    generarQR();
                    generarQR();
                    jQuery('#paso2_qr').show();
                }
                jQuery('#paso2_qr_code').show();
                paso2();
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Autenticación exitosa. Se le está redirigiendo...',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'Admin/Listar';
                });
            }
        },
        error: function(err) {
            console.error("Error en la petición AJAX:", err);
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error al intentar iniciar sesión.',
                showConfirmButton: false
            });
            grecaptcha.reset();
        }
    });
    }

    function paso2(){
        jQuery('#paso2').show()
        jQuery('#paso1').hide()
    }

    function confirmarLogin(){

        let urldata = 'UsuariosValidate/confirmar';
        jQuery.ajax({
            url: urldata,
            async: true,
            data: { 'usuario' : jQuery('#usuario').val(), 'clave': jQuery('#clave').val(), "google_qr" : $('#qr_google_code').val(), "google_code" : $('#google_code').val(), 'recaptcha' : jQuery('#g-recaptcha-response-1').val() },
            type: 'POST',
            success: function (response) {
                var data = JSON.parse(response);
                if(data.success)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Autenticación exitosa. Se le está redirigiendo...',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((value) => {
                        window.location.href = 'Admin/Listar';
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: data.message.join('\n'),
                        showConfirmButton: false
                    })
                    grecaptcha.reset()
                    return;
                }
            },
            error: function(err){
                debugger
                Swal.fire({
                    icon: 'error',
                    title: errores.join('\n'),
                    showConfirmButton: false
                })
                grecaptcha.reset()
                return;
            }
        })
    }

    function generarQR(){
        //Funcion para generar el QR en el registro
        let urldata = 'Seguridad/GenerarQR';
        $.ajax({
            url: urldata,
            async: false,
            type: 'POST',
            beforeSend: function(){
                //process(true)
            },
            success: function(response){
                let responsejson = JSON.parse(response)
                $('#qr_google_code').val(responsejson.code)
                $('#qr_google').attr('src', responsejson.link)
            },
            complete: function(){
                //process()
            },
            error: function(err){
                //process()
            }
        });
    }
    
</script>