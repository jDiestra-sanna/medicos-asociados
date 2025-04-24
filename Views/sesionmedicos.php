<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Assets/css/custom.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/Assets/js/jquery.min.js"></script>
    <script src="/Assets/js/sweetalert2@9.js"></script>

    <style>
        /* Estilos para el modal */
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px 30px; /* Añade más espacio interior */
            border: 5px solid green; /* Verde claro */
            width: 350px;
            border-radius: 8px;
            line-height: 1.5; /* Mejora el espaciado entre líneas */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 18px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .input-modal {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            font-size: 15px;
        }
        .btn-update {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            font-size: 22px;
        }
        .btn-update:hover {
            background-color: #45a049;
        }

        .requirement {
            color: red;
        }

        .requirement.met {
            color: green;
            font-weight: bold;
        }


    </style>



</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-5 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center">
                        <strong class="text-white">Acceso Médicos Asociados</strong><br>
                        <img class="img-thumbnail" src="/Assets/img/logo.jpg" width="100">
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['msg'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $_GET['msg']; ?></strong>
                            </div>
                        <?php } ?>
                        <div>
                            <div class="form-group">
                                <strong class="text-primary">Usuarios</strong>
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <strong class="text-primary">Contraseña</strong>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <strong class="text-primary">Código de Autenticación</strong>
                                <input id="google_code" class="form-control" type="text" name="google_code" placeholder="999999">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a style="cursor:pointer;" title="Refrescar Captcha" onclick="grecaptcha.reset();">
                                            <img width="70px;" src="/Assets/img/refresh-icon.jpg">
                                        </a>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="g-recaptcha" id="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_PUBLIC; ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <input id="login" class="btn btn-primary btn-block" type="button" value="Iniciar" />
                            <a href="/home/medicosregistro/" class="btn btn-warning btn-block">Regístrate</a>
                            <a href="/home/recuperar" class="btn btn-danger btn-block">Recuperar credenciales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 style="color: green; font-weight: bold; text-decoration: underline; font-size: 20px; text-align: center;">
            Actualizar Contraseña
        </h3>

        <input type="password" placeholder="Contraseña actual" class="input-modal" id="current-password">
        <input type="password" placeholder="Nueva contraseña" class="input-modal" id="new-password" oninput="validarRequisitosContrasena()">
        <br>
        <div id="password-requirements">
            <p>La contraseña debe cumplir con los siguientes requisitos:</p>
            <ul>
                <li id="length" class="requirement">Mínimo 12 caractere.s</li>
                <li id="uppercase" class="requirement">Al menos una letra mayúscula.</li>
                <li id="number" class="requirement">Al menos un número.</li>
                <li id="special" class="requirement">Al menos un carácter especial (@, $, !, %, *, ?, &).</li>
            </ul>
        </div>
        <br>
        <button class="btn-update" onclick="updatePassword()">Actualizar</button>
    </div>
</div>

<!-- Modal de Error -->
<div id="errorModal" class="modal">
    <div class="modal-content">
        <h3>Error:</h3>
        <p id="errorMensaje"></p>
    </div>
</div>

    <script src="/Assets/js/Funciones.js"></script>
    <script src="/Assets/js/bootstrap.min.js"></script>

    <script>
		var baseUrlOrigin = window.location.origin;
		
        jQuery(document).ready(function(){
            jQuery('#login').on('click', function () {
                validarLogin();
            });
        });

        function validarLogin(){
            let urldata = baseUrlOrigin + '/MedicosValidate/login';
            jQuery.ajax({
                url: urldata,
                async: true,
                data: { 'usuario' : jQuery('#usuario').val(), 'clave': jQuery('#clave').val(), 'google_code' : jQuery('#google_code').val(), 'recaptcha' : jQuery('#g-recaptcha-response').val() },
                type: 'POST',
                beforeSend: function(){
                    process(true)
                },
                success: function (response) {
                    // debugger
                    // console.log(response)
                    var data = JSON.parse(response);
                    if(data.success)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'Autenticación exitosa. Se le está redirigiendo...',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((value) => {
                            validar_caducidad();
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: data.message.join('\n'),
                            showConfirmButton: false
                        })
                    }
                },
                error: function(err){
                    process()
                    Swal.fire({
                        icon: 'error',
                        title: err.join('\n'),
                        showConfirmButton: false
                    })
                },
                complete: function(){
                    process()
                }
            })
        }

        function validar_caducidad() {
            let urlCaducidad = baseUrlOrigin + '/MedicosValidate/validar_caducidad_contrasena';

            jQuery.ajax({
                url: urlCaducidad,
                async: true,
                data: JSON.stringify({ 'usuario': jQuery('#usuario').val() }),
                contentType: 'application/json',  // Correct content type
                dataType: 'json',  // Asegura que el tipo de datos de respuesta sea JSON
                processData: false,  // Evita la serialización automática
                type: 'POST',
                success: function(response) {
                    console.log("Respuesta de caducidad:", response);

                    if (response.estado === 'BLOQUEADO') { // Corrige el valor esperado
                        console.log("Contraseña caducada. Mostrando popup...");
                        modal.style.display = "block";
                    } else {
                        console.log("NO BLOQUEADO");
                        window.location.href = baseUrlOrigin + '/Medicos/Medicos';
                    }
                },
                error: function(err) {
                    console.error("Error en la verificación de caducidad:", err);
                }
            });

        }

        function updatePassword() {
            const usuario = document.getElementById("usuario").value;
            const currentPassword = document.getElementById("current-password").value;
            const newPassword = document.getElementById("new-password").value;

            // Comprobar en consola los valores
            //console.log('Usuario:', usuario);
           // console.log('Contraseña actual:', currentPassword);
            //console.log('Nueva contraseña:', newPassword);

            if (currentPassword === newPassword) {
                mostrarPopup("La nueva contraseña no puede ser igual a la actual. Por favor, ingresa una contraseña diferente.");
                return;
            }

            const passwordValid = validarContrasena(newPassword);
            if (!passwordValid) {
                mostrarPopup("La nueva contraseña no cumple con los requisitos.");
                return;
            }

            const urldata = baseUrlOrigin + '/MedicosValidate/actualizar_contrasena_fecha_caducidad';

            jQuery.ajax({
                url: urldata,
                async: true,
                contentType: 'application/json',
                data: JSON.stringify({
                    usuario: usuario,
                    password: currentPassword,
                    newpassword: newPassword
                }), // Enviar los datos como JSON
                type: 'POST',

                success: function(response) {
                    const data = JSON.parse(response);

                    console.log("Mensaje del servidor:", data.message);

                    if (data.result === true) {
                        console.log("Contraseña actualizada correctamente.");
                        window.location.href = baseUrlOrigin + '/Medicos/Medicos';
                        // Redirigir si es necesario
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(err) {
                    console.log(`Error en la solicitud: ${err.status}`);
                }
            });
        }

    
        function cerrarPopupAutomaticamente(modal) {
            setTimeout(() => {
                modal.style.display = "none"; // Cerrar el modal
            }, 2500); // 2000 ms = 2 segundos
        }

        //Funciones para cerrar modal
    const spanClose = document.getElementsByClassName("close")[0];
    const modal = document.getElementById("myModal"); // Cambiado a "myModal"
    const ErrorModal = document.getElementById("errorModal");

        // Cerrar el modal al hacer clic en la "x"
        spanClose.onclick = function() {
            modal.style.display = "none";
        };

        // Cerrar el modal al hacer clic fuera de él
        window.onclick = function(event) {

            if (event.target == ErrorModal) {
                ErrorModal.style.display = "none";
            }
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        function validarContrasena(contrasena) {
            const longitudValida = contrasena.length >= 12 && contrasena.length <= 15;
            const tieneMayuscula = /[A-Z]/.test(contrasena);
            const tieneNumero = /\d/.test(contrasena);
            const tieneCaracterEspecial = /[@$!%*?&]/.test(contrasena);

            return longitudValida && tieneMayuscula && tieneNumero && tieneCaracterEspecial;
        }


        function validarRequisitosContrasena() {
            const contrasena = document.getElementById("new-password").value;

            // Requisitos individuales
            const longitudValida = contrasena.length >= 12;
            const tieneMayuscula = /[A-Z]/.test(contrasena);
            const tieneNumero = /\d/.test(contrasena);
            const tieneCaracterEspecial = /[@$!%*?&]/.test(contrasena);

            // Actualizar los estilos de los requisitos
            document.getElementById("length").classList.toggle("met", longitudValida);
            document.getElementById("uppercase").classList.toggle("met", tieneMayuscula);
            document.getElementById("number").classList.toggle("met", tieneNumero);
            document.getElementById("special").classList.toggle("met", tieneCaracterEspecial);
        }


        function mostrarPopup(mensaje) {
            const modal = document.getElementById("errorModal");
            const mensajeModal = document.getElementById("errorMensaje"); // Asegúrate de tener un elemento para el mensaje
            if (modal) {
                modal.style.display = "block";
                mensajeModal.innerText = mensaje; // Mostrar mensaje personalizado
                //cerrarPopupAutomaticamente(modal);
            }
        }



    </script>
</body>

</html>
