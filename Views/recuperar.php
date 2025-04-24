<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar credenciales</title>
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Assets/css/custom.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-5 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center">
                        <strong class="text-white">Recuperar credenciales</strong><br>
                        <img class="img-thumbnail" src="/Assets/img/logo.jpg" width="100">
                    </div>
                    <div class="card-body">
                            <div class="row text-center">
                                <label class="col-12"><b>Ingresa tu CORREO o USUARIO SANNA para acceder a tu zona privada.</b></label>
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <strong class="text-primary">Usuario o Correo</strong>
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario o Correo">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input class="ml-5 col-lg-1" type="radio" id="recupera_password" checked name="recupera_password" data-value="1" style="height:20px;vertical-align:middle;">
                                        <label class="col-lg-9">Recuperar mi contraseña</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <input class="ml-5 col-lg-1" type="radio" id="recupera_token" name="recupera_password" data-value="2" style="height:20px;vertical-align:middle;">
                                        <label class="col-lg-9">Recuperar mi token Google</label>
                                    </div>
                                </div>

                            </div>
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
                            <!-- <div class="form-group">
                                <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6LcfZnQkAAAAAMf9RJ_VD7k-Ts6jl5Zw0a7X9q4j"></div>
                            </div> -->
                            <input id="continuar" class="btn btn-primary btn-block" type="button" value="Continuar" />
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
        jQuery('#continuar').on('click', function (data) {
            recuperacredencial();
        });
        $('#usuario').on('input', function(evt) {
            $(this).val(function(_, val) {
                return val.toUpperCase();
            });
        });
    })

    function recuperacredencial(){
        let urldata = '<?php echo base_url() ?>UsuariosValidate/recuperapaso1';
        jQuery.ajax({
            url: urldata,
            async: true,
            data: { 'usuario' : jQuery('#usuario').val(), 'recupera_password' : jQuery('input[name=recupera_password]:checked').attr('id'), 'recaptcha' : jQuery('#g-recaptcha-response').val() },
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
</script>