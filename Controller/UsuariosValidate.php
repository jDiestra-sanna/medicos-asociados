<?php
require_once("Helpers/SannaUtils.php");
require_once "Models/ConnectionApi.php";
require_once("Seguridad.php");

class UsuariosValidate 
{

    public function login()
    {
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = htmlspecialchars($_POST['usuario']);
            $clave = htmlspecialchars($_POST['clave']);
            $captcha = $_POST["recaptcha"];

            $validaCaptcha = (new SannaUtils())->verificarCaptcha($captcha);
            if ($validaCaptcha === false) {
                echo json_encode(array('success'=>false, 'message'=> array('Verificación del Código Captcha incorrecto')) );
                return;
            }

            $data = SannaApi('post', 'usuarios/validate', array(
                    'nom_usu' => $usuario,
                    'pas_usu' => $clave
            ));

            if ($data && isset($data->cod_usu) ) {
                session_start();
                session_regenerate_id(true);
                $_SESSION['id'] = $data->cod_usu;
                $_SESSION['nombre'] = $data->des_usu;
                $_SESSION['usuario'] = $data->nom_usu;
                $_SESSION['correo'] = $data->email;
                $_SESSION['rol'] = $data->cod_tip_usuario;
                $_SESSION['activo_tmp'] = true;
                $_SESSION['permisos'] = $data->permisos;
                $_SESSION['ip'] = $this->getUserIP();
                $_SESSION['time_started'] = time();
                $_SESSION['flg_google_auth'] = $data->flg_mfa_google_auth;
                $_SESSION['mfa_google_auth'] = $data->mfa_google_auth;

                if(!$data->flg_mfa_google_auth){
                    $_SESSION['activo'] = true;
                }

                echo json_encode(array('success'=>true, 'flg_google_auth'=> filter_var($data->flg_mfa_google_auth, FILTER_VALIDATE_BOOLEAN), 'codigo_google'=> (strval($data->mfa_google_auth)==''?false:true)  ));
            } else {
                echo json_encode(array('success'=>false, 'message'=> array('Credenciales incorrectas. Verifique su información')) );
            }
        }
        else {
            echo json_encode(array('success'=>false, 'message'=> array('Debe ingresar su usuario y clave') ) );
        }
    }
    


    public function confirmar(){
        try{
            $google_code = htmlspecialchars($_POST["google_qr"]);
            $google_code_client = htmlspecialchars($_POST["google_code"]);
            $captcha = $_POST["recaptcha"];
    
            $validaCaptcha = (new SannaUtils())->verificarCaptcha($captcha);
            if ($validaCaptcha === false) {
                echo json_encode(array('success'=>false, 'message'=> array('Verificación del Código Captcha incorrecto')) );
                return;
            }
            else{
                if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
                    $usuario = htmlspecialchars($_POST['usuario']);
                    $clave = htmlspecialchars($_POST['clave']);
                    
                    $google_val = false;
                    $seguridadCtrl = new Seguridad();
                    if( $_SESSION["flg_google_auth"] ){
                        if( $_SESSION["mfa_google_auth"] == null || $_SESSION["mfa_google_auth"] == "" ){
                            $google_val = $seguridadCtrl->ValidarCodigo(trim($google_code), trim($google_code_client));                
                        }
                        else{
                            $google_val = $seguridadCtrl->ValidarCodigo(trim($_SESSION['mfa_google_auth']), trim($google_code_client));                
                        }
                        if($google_val){
                            $data = SannaApi('post', 'usuarios/confirmar', array(
                                'nom_usu' => $usuario,
                                'pas_usu' => $clave,
                                'google_code' => $google_code
                            ));
        
                            $_SESSION['activo'] = true;
        
                            echo json_encode(array('success'=>true ) );
                            return;
                        }
                        else{
                            echo json_encode(array('success'=>false, 'message'=> array('Errores en la validación del código QR') ) );
                            return;
                        }
                    }
                    else{
                        $_SESSION['activo'] = true;
                        echo json_encode(array('success'=>true ) );
                        return;
                    }
                    
                }else{
                    echo json_encode(array('success'=>false ) );
                    return;
                }
            }
        }
        catch(Exception $ex){
            echo json_encode(array('success'=>false ) );
            return;
        }
    }

    public function getUserIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function recuperapaso1()
    {
        if (!empty($_POST['usuario']) ) {
            $usuario = htmlspecialchars($_POST['usuario']);
            $captcha = $_POST["recaptcha"];
            $opcion_recupera = ( $_POST["recupera_password"] == 'recupera_password'?'recupera_password':'recupera_token' );

            $validaCaptcha = (new SannaUtils())->verificarCaptcha($captcha);
            if ($validaCaptcha === false) {
                echo json_encode(array('success'=>false, 'message'=> ['Verificación del Código Captcha incorrecto'] ) );
                return;
            }
            echo json_encode( SannaApi('post', 'usuarios/recuperapaso1', array(
                    'usuario' => $usuario,
                    'opcion_recupera' => $opcion_recupera,
                    'home_url' => base_url()
                    ))
            );
            return;
        }
        else {
            echo json_encode(array('success'=>false, 'message'=> ['Debe ingresar su usuario y clave'] ) );
        }
    }

    public function recuperapaso2()
    {
        $array_types = ['token','password'];
        if (!in_array( $_POST['type'], $array_types)) { 
            echo json_encode(array('success'=>false, 'message'=> ['El link de acceso no es válido'] ) );
            return;
        }

        $recuperatoken = ($_POST['type']== 'token'?true:false );
        $data = htmlspecialchars($_POST['data']);

        if(!$recuperatoken){
            $Password1 = htmlspecialchars($_POST['data1']);
            if ( $Password1 != $data ) {
                echo json_encode(array('success'=>false, 'message'=> ['Verifique el password ingresado'] ) );
                return;
            }

            $validaPoliticaPassword = (new SannaUtils())->verificaPoliticaPassword($data);
            if ( count($validaPoliticaPassword) > 0 ) {
                echo json_encode(array('success'=>false, 'message'=> $validaPoliticaPassword ) );
                return;
            }
        }

        $captcha = $_POST["recaptcha"];

        $validaCaptcha = (new SannaUtils())->verificarCaptcha($captcha);
        if ($validaCaptcha === false) {
            echo json_encode(array('success'=>false, 'message'=> ['Verificación del Código Captcha incorrecto'] ) );
            return;
        }
        echo json_encode( SannaApi('post', 'usuarios/recuperapaso2', array(
                'user' => $_POST["encrypted_string"],
                'new_credential' => $data,
                'opcion_recupera' => $recuperatoken
                ))
        );
        return;
        
    }

}
