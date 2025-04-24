<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar credenciales</title>
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Assets/css/custom.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <input type="hidden" id="qr_google_code">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-5 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center">
                        <strong class="text-white">Recuperar credenciales</strong><br>
                        <img class="img-thumbnail" src="/Assets/img/logo.jpg" width="100">
                    </div>
                    <div class="card-body">
                        <div>
                            <?php
                            if ( !empty($_SESSION["encrypted_string"]) ) {
                            ?>
                                <?php
                                if ( $_SESSION["type"] == "recupera_token" ) {
                                ?>
                                    <div class="form-group text-center">
                                        <span><b>Para utilizar nuestros servicios, es necesario instalar el aplicativo Google Authenticator</b></span>
                                    </div>
                                    <div class="text-center">
                                        <img id="qr_google" src="">
                                    </div>
                                    <div class="form-group text-center">
                                        <ol>
                                            <li>Enlace de <a target="blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=es_PE&gl=US&pli=1">ANDROID</a> o enlace de <a target="blank" href="https://apps.apple.com/us/app/google-authenticator/id388497605">iOS</a> </li>
                                            <li>Escanee el QR que aparece en esta pantalla con su móvil <i class="fa fa-hand-o-down" aria-hidden="true"></i></li>
                                        </ol>
                                        <div class="text-center">
                                            <img id="qr_google" src="">
                                        </div>
                                        <div class="text-center">
                                            <a target="blank" href="https://support.google.com/accounts/answer/1066447?hl=es-419&amp;co=GENIE.Platform%3DAndroid&amp;oco=0">¿Cómo instalar Google Autenticator?</a>
                                        </div>
                                    </div>
                                <?php
                                }else{
                                ?>
                                    <div class="form-group">
                                        <strong class="text-primary">Nueva Contraseña</strong>
                                        <div class="input-group">
                                            <input id="password" class="form-control" type="password" name="password" placeholder="Nueva contraseña">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong class="text-primary">Confirmar su Contraseña</strong>
                                        <div class="input-group">
                                            <input id="password1" class="form-control" type="password" name="password1" placeholder="Confirmar su contraseña">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <label class="col-lg-12" style="font-size:13px;color:#f0ad4e;">LA CONTRASEÑA DEBE TENER COMO MÍNIMO UN NÚMERO, UNA LETRA MINÚSCULA, UNA LETRA MAYÚSCULA Y UN CARACTER ESPECIAL SIN ESPACIOS EN BLANCO.</label>
                                    </div>
                                <?php
                                }
                                ?>
                                <br>
                                <!-- <div class="form-group">
                                    <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6LcfZnQkAAAAAMf9RJ_VD7k-Ts6jl5Zw0a7X9q4j"></div>
                                </div> -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <a style="cursor:pointer;" title="Refrezcar Captcha" onclick="grecaptcha.reset();" ><img width="50px;" src="/Assets/img/refresh-icon.jpg"></a>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="g-recaptcha" id="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_PUBLIC; ?>"></div>
                                        </div>
                                    </div>
                                </div>
                                <input id="continuar" class="btn btn-primary btn-block" type="button" value="Continuar" />
                            <?php
                            }else{
                            ?>

                                <div class="form-group">
                                    <div class="form-group text-center">
                                        <h3><b>Para recuperar su contraseña o Token, haga click en el siguiente enlace debajo</b></h3>
                                    </div>
                                    <br>
                                    <a href="<?php echo base_url() ?>home/recuperar/" class="btn btn-warning btn-block" tabindex="12">Ir a recuperar mis credenciales</a>
                                    <br>
                                </div>
                            <?php
                            }
                            ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="/Assets/js/Funciones.js"></script>
<script src="/Assets/js/jquery.min.js"></script>
<script src="/Assets/js/sweetalert2@9.js"></script>

<script>
    jQuery(document).ready(function(){
        let urldata = '<?php echo base_url() ?>Seguridad/GenerarQR';
        $.ajax({
            url: urldata,
            async: false,
            type: 'POST',
            beforeSend: function(){
                process(true)
            },
            success: function(response){
                let responsejson = JSON.parse(response)
                $('#qr_google_code').val(responsejson.code)
                $('#qr_google').attr('src', responsejson.link)
            },
            complete: function(){
                process()
            },
            error: function(err){
                process()
            }
        });

        jQuery('#continuar').on('click', function (data) {
            if( validarcampos() ){
                envianuevascredenciales();
            }
        });

        $('.reveal').on('click', function () {
            let tipo = $($(this).parent().parent().children()[0]).attr('type')
            $($(this).parent().parent().children()[0]).attr('type', (tipo=='text'?'password':'text') )
        })
    })

    function envianuevascredenciales(){
        let data = ''
        <?php
            if ( $_SESSION["type"] == "recupera_token" ) {
        ?>
            data = { 'type': 'token', 'data' : $('#qr_google_code').val(), 'recaptcha' : jQuery('#g-recaptcha-response').val(), 'encrypted_string': '<?php echo $_SESSION["encrypted_string"]; ?>' }
        <?php
            }else{
        ?>
            data = { 'type': 'password', 'data' : $('#password').val(), 'data1' : $('#password1').val(), 'recaptcha' : jQuery('#g-recaptcha-response').val(), 'encrypted_string': '<?php echo $_SESSION["encrypted_string"]; ?>' }
        <?php
            }
        ?>

        let urldata = '<?php echo base_url() ?>UsuariosValidate/recuperapaso2';
        jQuery.ajax({
            url: urldata,
            async: true,
            data: data,
            type: 'POST',
            beforeSend: function(){
                process(true)
            },
            success: function (response) {
                var data = JSON.parse(response);
                if(data.success)
                {
                    Swal.fire({
                        icon: 'success',
                        title: data.message.join('\n'),
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
                        window.location.href = '<?php echo base_url() ?>home/sesionmedicos';
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: data.message.join('\n'),
                        showConfirmButton: false
                    })
                    grecaptcha.reset()
                }
            },
            error: function(err){
                process()
                Swal.fire({
                    icon: 'error',
                    title: errores.join('\n'),
                    showConfirmButton: false
                })
                grecaptcha.reset()
            },
            complete: function(){
                process()
            }
        })
    }
    function validarcampos() {
        
        let retorno = true;
        let password = $('#password').val();
        let password1 = $('#password1').val();
        let array_rspta = [];

        // Validar longitud mínima de 12 caracteres
        if (password.length < 12) {
            array_rspta.push('El password debe tener mínimo 12 caracteres.');
        }

        // Validar que contenga al menos una letra mayúscula
        if (!/[A-Z]/.test(password)) {
            array_rspta.push('El password debe tener al menos una letra mayúscula.');
        }

        // Validar que contenga al menos un número
        if (!/[0-9]/.test(password)) {
            array_rspta.push('El password debe tener al menos un número.');
        }

        // Validar que contenga al menos un carácter especial
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            array_rspta.push('El password debe tener al menos un carácter especial.');
        }

        // Verificar si hay errores en la validación de la contraseña
        if (array_rspta.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error en la contraseña',
                html: array_rspta.join('<br>'), // Muestra los errores en un mensaje de alerta
                showConfirmButton: false
            });
            grecaptcha.reset();
            retorno = false;
        }

        // Validar si las contraseñas coinciden
        if (password !== password1) {
            Swal.fire({
                icon: 'error',
                title: 'Verifique el password ingresado',
                showConfirmButton: false
            });
            grecaptcha.reset();
            retorno = false;
        }

    return retorno;
}

</script>