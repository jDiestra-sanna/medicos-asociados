<?php
require_once("Helpers/SannaUtils.php");
require_once "Models/ConnectionApi.php";
require_once("Seguridad.php");

class MedicosValidate extends Controllers
{
    public function __construct()
    {
        // session_start();
        // if (empty($_SESSION['medico_activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }

    public function login()
    {
        session_regenerate_id(true);
        $google_code = htmlspecialchars($_POST["google_code"]);
        $captcha = $_POST["recaptcha"];

        $validaCaptcha = (new SannaUtils())->verificarCaptcha($captcha);
        if ($validaCaptcha === false) {
            echo json_encode(array('success'=>false, 'message'=> array('Verificación del Código Captcha incorrecto')) );
            return;
        }

        //session_destroy();
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = htmlspecialchars($_POST['usuario']);
            $clave = htmlspecialchars($_POST['clave']);
            $data = SannaApi('post', 'medico/validate', array(
                'email' => $usuario,
                'password' => $clave
            ));
            
            $google_val = true;
            // if( !(strpos($_POST['usuario'], 'diurvan') !== false) ) {
            //     (new SannaUtils())->Log('TEST1',$_POST['usuario']);
            //     $seguridadCtrl = new Seguridad();
            //     $google_val = $seguridadCtrl->ValidarCodigo(trim($data->data->google_code), trim($google_code));
            // }else{
            //     (new SannaUtils())->Log('TEST2',$_POST['usuario']);
            // }

            if ($data && $data->success && $data->data != null && $google_val) {
                $_SESSION['medico_id'] = $data->data->id;
                $_SESSION['medico_nombre'] = $data->data->nombres;
                $_SESSION['medico_apellido'] = $data->data->apellidos;
                $_SESSION['medico_correo'] = $data->data->email;
                $_SESSION['medico_telefono'] = $data->data->telefono1;
                $_SESSION['medico_activo'] = $data->data->activo;
                $_SESSION['ip'] = $this->getUserIP();
                $_SESSION['time_started'] = time();
                $_SESSION['medico_data'] = json_encode($data->data);

                $solicitud = SannaApi('get', 'medico/solicitudactiva/'.$data->data->id, array());
                if($solicitud->success && $solicitud->data != null){
                    $_SESSION['medico_solicitud'] = json_encode($solicitud->data);

                    $solicituddocumentos = SannaApi('get', 'medico/solicituddocumentos/'.$solicitud->data->nro_solicitud, array());
                    // $_SESSION['solicitud_documentos'] = json_encode($solicitud->data);
                    if($solicituddocumentos->success && $solicituddocumentos->data != null){
                        $_SESSION['solicitud_documentos'] = json_encode($solicituddocumentos->data);
                    }
                }
                // header('location: '.base_url(). 'Medicos/Medicos');
                echo json_encode(array('success'=>true));
            } else {
                // header("location: ".base_url()."home/sesionmedicos/?msg=Hubieron errores en el acceso");
                // return;
                echo json_encode(array('success'=>false, 'message'=> array('Credenciales incorrectas. Verifique su información')) );
            }
        }
        else {
            // header("location: ".base_url()."home/sesionmedicos/?msg=Debe ingresar su usuario y clave");
            // return;
            echo json_encode(array('success'=>false, 'message'=> array('Debe ingresar su usuario y clave') ) );
        }
    }

    public function validar_caducidad_contrasena() {

        // Decodifica los datos JSON de la solicitud de entrada
        $data = json_decode(file_get_contents('php://input'), true);
        $usuario = $data['usuario'] ?? null;  // Utiliza null como valor predeterminado

        if (empty($usuario)) {
            echo json_encode([
                'result' => false,
                'status' => 'error',
                'message' => 'Datos incompletos. Verifique los datos enviados.'
            ]);
            return;
        }

        //$usuario = 'brunosala2013@gmail.com';
        // Llamada a SannaApi con un array correctamente definido
        $data = SannaApi('post', 'medico/validar_caducidad_contrasena', array(
            'email' => $usuario
        ));

        // Retornar solo el estado
        echo json_encode(array('estado'=>$data->estado));
      
    }
    
    public function actualizar_contrasena_fecha_caducidad() {
        // Decodificar el JSON recibido
        $data = json_decode(file_get_contents('php://input'), true);
        
        $usuario = $data['usuario'] ?? null;
        $password = $data['password'] ?? null;
        $new_password = $data['newpassword'] ?? null;
    
        // Verificar que las variables no estén vacías
        if (empty($usuario)) {
            echo json_encode([
                'result' => false,
                'status' => 'error',
                'message' => 'Datos incompletos. Verifique los datos enviados.'
            ]);
            return;
        }
    
        // Llamar a la API con los datos de actualización de la contraseña
        $estado = SannaApi('post', 'medico/actualizar_contrasena_y_fecha', array(
            'email' => $usuario,
            'password' => $password,
            'newpassword' => $new_password
        ));
    
        echo json_encode([
            'result' => $estado->result,
            'status' => $estado->status,
            'message' => $estado->message
        ]);
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

}
