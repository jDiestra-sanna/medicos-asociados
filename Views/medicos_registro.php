<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Assets/css/style.default.css">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <script src="/Assets/js/jquery.min.js" ></script>
    <script src="/Assets/js/sweetalert2@9.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <input type="hidden" id="qr_google_code">

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-9 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center">
                        <strong class="text-white">Personal de Salud Afiliado</strong><br>
                        <br>
                        <img class="img-thumbnail" src="/Assets/img/logo.jpg" width="100">
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['msg'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $_GET['msg']; ?></strong>
                                <!-- <strong>Credenciales incorrectas</strong> -->
                            </div>
                        <?php } ?>
                        <form id="form_registro" action="/Medicos/registro" method="post" autocomplete="off">
                        <div class="row text-center">
                            <label class="col-12">Ingresa tus datos personales para acceder a tu zona privada. Recuerda que con este registro podrás ingresar tu solicitud en SANNA.</label>
                        </div>    
                            <div class="row">
                                <div class="col-6">
                                    <strong class="text-primary">Ingrese su Correo</strong>
                                    <input id="email" class="form-control" type="text" name="email" placeholder="Correo" tabindex="1">
                                </div>
                                <div class="col-6">
                                    <strong class="text-primary">Confirmar su Correo</strong>
                                    <input id="email1" class="form-control" type="text" name="email1" placeholder="Correo" tabindex="2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <strong class="text-primary">Ingrese su Contraseña</strong>
                                    <div class="input-group">
                                        <input id="password" class="form-control" type="password" name="password" placeholder="Contraseña" tabindex="3">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <strong class="text-primary">Confirmar su Contraseña</strong>
                                    <div class="input-group">
                                        <input id="password1" class="form-control" type="password" name="password1" placeholder="Contraseña" tabindex="4">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-12" style="color:#f0ad4e;">LA CONTRASEÑA DEBE TENER COMO MÍNIMO UN NÚMERO, UNA LETRA MINÚSCULA, UNA LETRA MAYÚSCULA Y UN CARACTER ESPECIAL SIN ESPACIOS EN BLANCO.</label>
                            </div>
                            <br>
                            <div class="text-center">
                                <h5 class="">Datos personales</h5>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <strong class="text-primary">Ingrese sus Nombres</strong>
                                    <input id="nombres" class="form-control" type="text" name="nombres" placeholder="Nombres" tabindex="5">
                                </div>
                                <div class="col-6">
                                    <strong class="text-primary">Ingrese sus Apellidos</strong>
                                    <input id="apellidos" class="form-control" type="text" name="apellidos" placeholder="Apellidos" tabindex="6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <strong class="text-primary">Ingrese su Teléfono 1</strong>
                                    <input id="telefono1" class="form-control" type="number" name="telefono1" placeholder="Telefono 1" tabindex="7">
                                </div>
                                <div class="col-6">
                                <strong class="text-primary">Ingrese su Teléfono 2</strong>
                                    <input id="telefono2" class="form-control" type="number" name="telefono2" placeholder="Telefono 2" tabindex="8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <strong class="text-primary">Ingrese Tipo Documento</strong>
                                    <select class="form-control" name="tipodoc" id="tipodoc" tabindex="9">
                                        <option value="dni">DNI</option>
                                        <option value="carnet">Carnet Extranjería</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                <strong class="text-primary">Ingrese su Nro Documento</strong>
                                    <input id="nrodocumento" class="form-control" type="text" name="nrodocumento" placeholder="Nro Documento" tabindex="10" oninput="fnInputNumber(this, 0)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul id="registro_error" style="color:#F33D63;display:none;">
                                    </ul>
                                    <!-- <p id="registro_error" style="color:#F33D63;display:none;">Ocurrió algún error en el registro. Por favor contactar con admin <b>soporte@sanna.com.pe</b></p> -->
                                    <p id="registro_ok" style="color: rgb(28, 200, 138);display:none;">Registro exitoso...! Se le redirigirá automáticamente</p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input class="col-1" type="checkbox" id="med_terminos" name="med_terminos">He leido y acepto los <a href="<?php echo base_url() ?>Assets/documents/terminos/Términos y Condiciones y Clausula Informativa.pdf" target="_blank">términos y condiciones y la cláusula informativa</a> para el tratamiento de sus datos personales.
                                <br>
                                <input class="col-1" type="checkbox" id="med_consentimiento" name="med_consentimiento">Acepto el <a href="<?php echo base_url() ?>Assets/documents/terminos/Consentimiento Informado Fines Adicionales.pdf" target="_blank">tratamiento de mis datos personales</a> conforme a los fines adicionales
                                <br>
                                <input class="col-1" type="checkbox" id="med_cookie" name="med_cookie">He leido y acepto la <a href="<?php echo base_url() ?>Assets/documents/terminos/Política de cookies SANNA.pdf" target="_blank">Política de cookies</a>.
                                <br>
                            </div>

                            <div class="form-group">
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

                            <br>
                            <div style="display: inline;">
                                <a style="cursor:pointer; padding-left: 120px;" title="Refrezcar Captcha" onclick="grecaptcha.reset();" ><img width="70px;" src="/Assets/img/refresh-icon.jpg"></a>
                                <div style="margin-top: -70px;"  class="g-recaptcha" id="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_PUBLIC; ?>"></div>

                            </div>
                            <br>
                            <a id="btnMedRegistrar" class="btn btn-primary btn-block" tabindex="11">Registrar</a>
                            <a href="/home/sesionmedicos/" class="btn btn-secondary btn-block" tabindex="12">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="/Assets/js/Funciones.js"></script>

<script>

function validar_campos(){
    let array_rspta = [];
    if($('#email').val() != $('#email1').val()) array_rspta.push('Verifique el correo ingresado.');
    if($('#password').val() != $('#password1').val()) array_rspta.push('Verifique el password ingresado.');
    if($('#nombres').val() == '') array_rspta.push('Ingrese sus Nombres.');
    if($('#apellidos').val() == '') array_rspta.push('Ingrese sus Apellidos.');
    if($('#telefono1').val() == '') array_rspta.push('Ingrese su Teléfono 1.');
    if($('#telefono2').val() == '') array_rspta.push('Ingrese su Teléfono 2.');
    if($('#qr_google_code').val() == '') array_rspta.push('No se generó el QR correcto');


    let password = $('#password').val();
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

    
    if($('#tipodoc').val() == 'dni' ){
        if($('#nrodocumento').val().length != 8 ){
            array_rspta.push('El DNI debe tener 8 caracteres.');
        }
    }
    if($('#tipodoc').val() == 'carnet' ){
        if($('#nrodocumento').val().length != 9 ){
            array_rspta.push('El DNI debe tener 9 caracteres.');
        }
    }
    return array_rspta;
}

jQuery(document).ready(function(){
    $('#btnMedRegistrar').on('click', function () {
        let mensaje = validar_campos();
        $('#registro_error').html('')
        $('#registro_error').dequeue()
        if( mensaje.length > 0 ){ 
            mensaje.forEach(item => $('#registro_error').append('<li>'+item+'</li>') );
            $('#registro_error').show().delay(8000).queue(function() {
                $('#registro_error').css('display', 'none');
            });
            return;
        }
        Swal.fire({
            title: '¿Estás seguro de la acción?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            denyButtonText: 'No',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                grabar_registro();
            }
        });

        $('#registro_ok').css('display', 'none');
        $('#registro_error').css('display', 'none');

    })

    $('.reveal').on('click', function () {
        let tipo = $($(this).parent().parent().children()[0]).attr('type')
        $($(this).parent().parent().children()[0]).attr('type', (tipo=='text'?'password':'text') )
    })
    
    //Funcion para generar el QR en el registro
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

});

function grabar_registro(){
    let datasend = {
        "email" : $('#email').val(),
        "email1" : $('#email1').val(),
        "nombres" : $('#nombres').val(),
        "apellidos" : $('#apellidos').val(),
        "telefono1" : $('#telefono1').val(),
        "telefono2" : $('#telefono2').val(),
        "tipodoc" : $('#tipodoc').val(),
        "nrodocumento" : $('#nrodocumento').val(),
        "password" : $('#password').val(),
        "password1" : $('#password1').val(),
        "check_termino" : $('#med_terminos').prop('checked')?1:0,
        "check_datos" : $('#med_consentimiento').prop('checked')?1:0,
        "check_cookie" : $('#med_cookie').prop('checked')?1:0,
        "google_code" : $('#qr_google_code').val(),
        "recaptcha" : $('#g-recaptcha-response').val()
    }
    let urldata = '<?php echo base_url() ?>Medicos/CrearMedico';

    $.ajax({
        url: urldata,
        async: false,
        data: { 'datasend': datasend },
        type: 'POST',
        beforeSend: function(){
            process(true)
        },
        success: function(response){
            var retorno = JSON.parse(response);
            if(retorno.success){
                //ok
                $('#registro_ok').text('Registro correcto... se le redirigirá en unos instantes');
                $('#registro_ok').show().delay(3000).queue(function() {
                window.location.href = '<?php echo base_url() ?>home/sesionmedicos';
                });
            }
            else{
                if( Array.isArray(retorno.message) ){ 
                    if( retorno.message.length > 0 ){
                        // retorno.message.forEach(item => $('#registro_error').append('<li>'+item+'</li>') );
                        // $('#registro_error').show().delay(3000).queue(function() {
                        //     $('#registro_error').css('display', 'none');
                        // });
                        // return;
                        Swal.fire({
                            icon: 'error',
                            title: retorno.message.join('\n'),
                            showConfirmButton: false
                        })
                        grecaptcha.reset()
                        return;
                    }
                }
                else{
                    $('#registro_error').text(retorno.message);
                }
                $('#registro_error').show().delay(3000).queue(function() {
                    $('#registro_error').css('display', 'none');
                });
            }
            },
            complete: function(){
                process()
            },
            error: function(err){
                process()
            }
    });
}



</script>