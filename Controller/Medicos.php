<?php
require_once("Helpers/SannaUtils.php");
require_once("Models/MedicosModel.php");
require_once("Models/UbigeoModel.php");
require_once("Seguridad.php");

class Medicos extends Controllers
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
        $google_code = htmlspecialchars($_POST["google_code"]);
        //session_destroy();
        if (!empty(htmlspecialchars($_POST['usuario'])) || !empty(htmlspecialchars($_POST['clave']))) {
            $usuario = htmlspecialchars($_POST['usuario']);
            $clave = htmlspecialchars($_POST['clave']);
            $data = $this->model->validateMedico($usuario, $clave);

            $google_val = true;
            $seguridadCtrl = new Seguridad();
            $google_val = $seguridadCtrl->ValidarCodigo(trim($data->data->google_code), trim($google_code));

            if ($data && $data->success && $data->data != null && $google_val) {
                $_SESSION['medico_id'] = $data->data->id;
                $_SESSION['medico_nombre'] = $data->data->nombres;
                $_SESSION['medico_apellido'] = $data->data->apellidos;
                $_SESSION['medico_correo'] = $data->data->email;
                $_SESSION['medico_telefono'] = $data->data->telefono;
                $_SESSION['medico_activo'] = $data->data->activo;

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

                header('location: '.base_url(). 'Medicos/Medicos');

                // header('location: '.base_url(). 'Admin/Listar');

                //$this->views->getView("Medicos", "Medicos");
                // return;
                //header('location: '.base_url(). 'Medicos/Medicos');
            } else {
                header("location: ".base_url()."home/sesionmedicos/?msg=Hubieron errores en el acceso");
                return;
            }
        }
        else {
            header("location: ".base_url()."home/sesionmedicos/?msg=Debe ingresar su usuario y clave");
            return;
        }
    }

    public function Medicos()
    {
        $this->views->getView($this, "Medicos");
    }

    public function salir()
    {
        session_destroy();
        
        $_SESSION['medico_id'] = null;
        $_SESSION['medico_nombre'] = null;
        $_SESSION['medico_apellido'] = null;
        $_SESSION['medico_correo'] = null;
        $_SESSION['medico_telefono'] = null;
        $_SESSION['medico_activo'] = null;
        $_SESSION['medico_data'] = null;
        $_SESSION['medico_solicitud'] = null;
        $_SESSION['solicitud_documentos'] = null;

        header("Location: ".base_url());
    }


    public function CrearMedico()
    {
        // $message=[];
        // $validaPoliticaPassword = (new SannaUtils())->verificaPoliticaPassword($_POST["datasend"]["password"]);
        // if ($validaPoliticaPassword == false) {
        //     $message[] = "La Contraseña no cumple nuestra Política de Seguridad";
        // }
        // $data = array(
        //     'success' => false,
        //     'message' => $message,
        //     'data' => $_POST["datasend"]["password"],
        // );
        // echo json_encode($data);
        // return;


        $data = array();
        $dataentry = $_POST["datasend"];
        unset($message);
        $message = array();

        if($dataentry["google_code"] == ''){
            $message[] = "No se ha generado el QR válido";
        }
        if($dataentry["email"] != $dataentry["email1"]){
            $message[] = "Verifique el correo ingresado";
        }
        if($dataentry["password"] != $dataentry["password1"]){
            $message[] = "Verifique el password ingresado";
        }
        if($dataentry["tipodoc"] == "dni"){
            if(strlen($dataentry["nrodocumento"]) != 8){
                $message[] = "El DNI debe tener 8 caracteres";
            }
        }
        if (!filter_var($dataentry["email"], FILTER_VALIDATE_EMAIL)) {
            $message[] = "El email no es válido";
        }
        if($dataentry["check_termino"] == false){
            $message[] = "Debe aceptar los términos y condiciones";
        }
        if($dataentry["check_datos"] == false){
            $message[] = "Debe aceptar el tratamiento de datos personales";
        }
        if($dataentry["check_cookie"] == false){
            $message[] = "Debe aceptar la política de cookie";
        }
        if($dataentry["recaptcha"] == false){
            $message[] = "Debe marcar la validación Captcha";
        }

        // $objSannaUtil = new SannaUtils();
        // $validaPoliticaPassword = $objSannaUtil->verificaPoliticaPassword($dataentry["password"]);        
        // if (!$validaPoliticaPassword) {
        //     $message[] = "La Contraseña no cumple nuestra Política de Seguridad";
        // }

        $returnPoliticaPassword = (new SannaUtils())->verificaPoliticaPassword($dataentry["password"]);
        
        if ( count($returnPoliticaPassword) > 0 ) {
            $message[] = $returnPoliticaPassword;
        }
        // $objSannaUtil = new SannaUtils();
        $validaCaptcha = $this->verificarCaptcha($dataentry["recaptcha"]);
        if ($validaCaptcha == false) {
            $message[] = "Verificación del Código Captcha incorrecto";
        }

        // $patron = "|^(?=.*[A-Z])(?=.*[!@#$&])(?=.*[0-9])(?=.*[a-z]).{8,}$|";
        // preg_match($patron, $dataentry["password"], $matches);
        // if( count($matches) == 0 ) { $message[] = "Verificación del Código Captcha incorrecto";}

        // $validaCaptcha = $objSannaUtil->verificarCaptcha($dataentry["recaptcha"]);
        // if ($validaCaptcha == false) {
        //     $message[] = "Verificación del Código Captcha incorrecto";
        // }

        $dataentry["google_code"] = htmlspecialchars($dataentry["google_code"]);
        $dataentry["email1"]= htmlspecialchars($dataentry["email1"]);
        $dataentry["password"]= htmlspecialchars($dataentry["password"]);
        $dataentry["password1"]= htmlspecialchars($dataentry["password1"]);
        $dataentry["tipodoc"]= htmlspecialchars($dataentry["tipodoc"]);
        $dataentry["nrodocumento"]= htmlspecialchars($dataentry["nrodocumento"]);
        $dataentry["email"]= htmlspecialchars($dataentry["email"]);
        $dataentry["check_termino"]= htmlspecialchars($dataentry["check_termino"]);
        $dataentry["check_datos"]= htmlspecialchars($dataentry["check_datos"]);
        $dataentry["check_cookie"]= htmlspecialchars($dataentry["check_cookie"]);
        
        $dataentry["nombres"]= htmlspecialchars($dataentry["nombres"]);
        $dataentry["apellidos"]= htmlspecialchars($dataentry["apellidos"]);

        if(count($message) == 0){
            $data = SannaApi('post', 'medico/create', $dataentry );
            //$data = $this->model->SannaApi('post', 'medico/create', $dataentry );
            if($data->success){
                // $_SESSION['medico_id'] = $data->data->id;
                // $_SESSION['medico_nombre'] = $data->data->nombres;
                // $_SESSION['medico_apellido'] = $data->data->apellidos;
                // $_SESSION['medico_correo'] = $data->data->email;
                // $_SESSION['medico_telefono'] = $data->data->telefono1;
                // $_SESSION['medico_activo'] = $data->data->activo;
                
                // $_SESSION['medico_data'] = json_encode($data->data);
                // $_SESSION['medico_solicitud'] = null;
                // $_SESSION['solicitud_documentos'] = null;
            }
        }
        else{
            $data = array(
                'success' => false,
                'message' => $message,
                'data' => "",
            );
        }
        echo json_encode($data);
    }
    public function CrearSolicitud()
    {
        $data = array();
        $dataentry = $_POST["datasend"];
        $message = array();

        $dataentry["email"] = $_SESSION["medico_correo"];

        if($dataentry["servicio"] == ""){
            $message[] = "Debe seleccionar un servicio";
        }
        

        $dataentry["servicio"] = htmlspecialchars($dataentry["servicio"]);
        $dataentry["telefono1"] = htmlspecialchars($dataentry["telefono1"]);
        $dataentry["telefono2"] = htmlspecialchars($dataentry["telefono2"]);
        $dataentry["nro_colegiatura"] = htmlspecialchars($dataentry["nro_colegiatura"]);
        $dataentry["idioma"] = htmlspecialchars($dataentry["idioma"]);
        $dataentry["idioma_otro"] = htmlspecialchars($dataentry["idioma_otro"]);
        $dataentry["especialidad"] = htmlspecialchars($dataentry["especialidad"]);
        $dataentry["especialidad_otro"] = htmlspecialchars($dataentry["especialidad_otro"]);
        $dataentry["nro_rne"] = htmlspecialchars($dataentry["nro_rne"]);
        $dataentry["fecha_nacimiento"] = htmlspecialchars($dataentry["fecha_nacimiento"]);
        $dataentry["direccion"] = htmlspecialchars($dataentry["direccion"]);
        $dataentry["nacionalidad"] = htmlspecialchars($dataentry["nacionalidad"]);
        $dataentry["referencia"] = htmlspecialchars($dataentry["referencia"]);
        $dataentry["profesion"] = htmlspecialchars($dataentry["profesion"]);
        $dataentry["factor_riesgo"] = htmlspecialchars($dataentry["factor_riesgo"]);
        $dataentry["factor_otro"] = htmlspecialchars($dataentry["factor_otro"]);
        $dataentry["ubigeo"] = htmlspecialchars($dataentry["ubigeo"]);
        $dataentry["especialidad_estado"] = htmlspecialchars($dataentry["especialidad_estado"]);

        if(count($message) == 0){
            $data = SannaApi('post', 'medico/solicitud', $dataentry );
            //$data = $this->model->SannaApi('post', 'medico/solicitud', $dataentry );
            if($data->success){
                $_SESSION['medico_solicitud'] = json_encode($data->data);
                $data = array(
                    'success' => true,
                    'message' => '',
                    'data' => $data->data->nro_solicitud,
                );
                
                $datamedico = SannaApi('get', 'medico/getmedico/'.$_SESSION['medico_id'], array() );
                //$datamedico = $this->model->SannaApi('get', 'medico/getmedico/'.$_SESSION['medico_id'], array() );
                if ($datamedico && $datamedico->success && $datamedico->data != null) {
                    $_SESSION['medico_data'] = json_encode($datamedico->data);
                }
            }
        }
        else{
            $data = array(
                'success' => false,
                'message' => $message,
                'data' => "",
            );
        }
        echo json_encode($data);
    }
    public function SolicitudDocumento(){
        $response = null;
        $files = array('0'=> null,'1'=> null,'2'=> null,'3'=> null,'4'=> null,'5'=> null );
        try{
            // $upload_location = base_url().'Assets/documents/medicos/';
            $upload_location =  $_SERVER['DOCUMENT_ROOT'] . '/Assets/documents/medicos/';

            $files[0] = isset($_FILES["file_cv"])?$_FILES["file_cv"]:null;
            $files[1] = isset($_FILES["file_titpro"])?$_FILES["file_titpro"]:null;
            $files[2] = isset($_FILES["file_colegio"])?$_FILES["file_colegio"]:null;
            $files[3] = isset($_FILES["file_rne"])?$_FILES["file_rne"]:null;
            $files[4] = isset($_FILES["file_declaracion"])?$_FILES["file_declaracion"]:null;
            $files[5] = isset($_FILES["file_titesp"])?$_FILES["file_titesp"]:null;

            for($index = 0;$index < 6;$index++){
                if($files[$index] != null){

                    $tipo = "";
                    if($index ==0) $tipo="cv";if($index ==1) $tipo="titpro";if($index ==2) $tipo="colegio";if($index ==3) $tipo="rne";if($index ==4) $tipo="declaracion";if($index ==5) $tipo="titesp";

                    $nombre_archivo = '';
                    if($index ==0) $nombre_archivo="_1ra_cv";
                    if($index ==1) $nombre_archivo="_1ra_tipro";
                    if($index ==2) $nombre_archivo="_1ra_colegio";
                    if($index ==3) $nombre_archivo="_1ra_rne";
                    if($index ==4) $nombre_archivo="_1ra_declaracion";
                    if($index ==5) $nombre_archivo="_1ra_tiesp";

                    $ext = strtolower(pathinfo($files[$index]["name"], PATHINFO_EXTENSION));
                    $nombre_archivo = json_decode($_SESSION['medico_solicitud'])->nro_solicitud.$nombre_archivo.'.'.$ext;
                    $valid_ext = array("pdf");
                    if(in_array($ext, $valid_ext)){
                       $path = $upload_location.$nombre_archivo;
                       // Upload file
                       if(move_uploaded_file($files[$index]['tmp_name'],$path)){
                        $solicitud_documentos = SannaApi('post', 'medico/solicituddocumento', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo, 'path_file' => $path, 'file_name' => $nombre_archivo )  );
                       }
                    }
                    

                    // $nombre_archivo = (new SannaUtils())->replace_string($files[$index]["name"]);
                    // $filename = $tipo.'_'.$nombre_archivo;
                    // $ext = strtolower(pathinfo($files[$index]["name"], PATHINFO_EXTENSION));
                    // $valid_ext = array("pdf");
                    // if(in_array($ext, $valid_ext)){
                    //    $path = $upload_location.json_decode($_SESSION['medico_solicitud'])->nro_solicitud."_".$filename;  
                    //    // Upload file
                    //    if(move_uploaded_file($files[$index]['tmp_name'],$path)){
                    //     $solicitud_documentos = SannaApi('post', 'medico/solicituddocumento', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo, 'path_file' => $path, 'file_name' => $nombre_archivo )  );
                    //    }
                    // }
                }
            }
            if(isset($solicitud_documentos)){
                $_SESSION['solicitud_documentos'] = json_encode($solicitud_documentos->data);
                $solicitud_documentos = $solicitud_documentos->data;
            }
            else{
                $solicitud_documentos = json_decode($_SESSION['solicitud_documentos']);
            }

            $solicitud_existente = SannaApi('post', 'medico/solicituddocumentocomentario', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'comentario'=> htmlspecialchars($_POST["comentario"]) )  );
            // $solicitud_existente = $this->model->SannaApi('post', 'medico/solicituddocumentocomentario', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'comentario'=> htmlspecialchars($_POST["comentario"]) )  );
            // $sesion_solicitud = json_decode($_SESSION['medico_solicitud']);
            // $sesion_solicitud->documento_comentario = $_POST["comentario"];
            // $_SESSION['medico_solicitud'] = json_encode($sesion_solicitud);

            $_SESSION['medico_solicitud'] = json_encode($solicitud_existente->data);

            $response = array('success' => true, 'data' => $solicitud_documentos);
        }
        catch(Exception $ex){
            $response = array('success' => false, 'message' => $ex->getMessage());
        }

        echo json_encode($response);
    }

    public function SolicitudPsicotecnico(){
        $response = null;
        $files = array('0'=> null,'1'=> null,'2'=> null);
        try{
            // $upload_location = base_url().'Assets/documents/medicos/';
            $upload_location =  $_SERVER['DOCUMENT_ROOT'] . '/Assets/documents/medicos/';

            $files[0] = isset($_FILES["file_psico_0"])?$_FILES["file_psico_0"]:null;
            $files[1] = isset($_FILES["file_psico_1"])?$_FILES["file_psico_1"]:null;
            $files[2] = isset($_FILES["file_psico_2"])?$_FILES["file_psico_2"]:null;
            // $files[3] = isset($_FILES["file_psico_3"])?$_FILES["file_psico_3"]:null;

            for($index = 0;$index < 3;$index++){
                if($files[$index] != null){

                    $nombre_archivo = '';

                    if($index ==0) $tipo="psico_0";if($index ==1) $tipo="psico_1";if($index ==2) $tipo="psico_2";

                    if($index ==0) $nombre_archivo="_psico_0";
                    if($index ==1) $nombre_archivo="_psico_1";
                    if($index ==2) $nombre_archivo="_psico_2";

                    $ext = strtolower(pathinfo($files[$index]["name"], PATHINFO_EXTENSION));
                    $nombre_archivo = json_decode($_SESSION['medico_solicitud'])->nro_solicitud.$nombre_archivo.'.'.$ext;
                    $valid_ext = array("pdf");
                    if(in_array($ext, $valid_ext)){
                       $path = $upload_location.$nombre_archivo;
                       // Upload file
                       if(move_uploaded_file($files[$index]['tmp_name'],$path)){
                        $solicitud_documentos = SannaApi('post', 'medico/solicituddocumento', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo, 'path_file' => $path, 'file_name' => $nombre_archivo )  );
                       }
                    }

                    
                    // $nombre_archivo = (new SannaUtils())->replace_string($files[$index]["name"]);

                    // $filename = $tipo.'_'.$nombre_archivo;
                    // $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    // $valid_ext = array("pdf");
                    // if(in_array($ext, $valid_ext)){
                    //    $path = $upload_location.json_decode($_SESSION['medico_solicitud'])->nro_solicitud."_".$filename;  
                    //    // Upload file
                    //    if(move_uploaded_file($files[$index]['tmp_name'],$path)){
                    //     $solicitud_documentos = $this->model->SannaApi('post', 'medico/solicituddocumento', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo, 'path_file' => $path, 'file_name' => $nombre_archivo )  );
                    //    }
                    // }
                }
            }
            if(isset($solicitud_documentos)){
                $_SESSION['solicitud_documentos'] = json_encode($solicitud_documentos->data);
                $solicitud_documentos = $solicitud_documentos->data;
            }
            else{
                $solicitud_documentos = json_decode($_SESSION['solicitud_documentos']);
            }
            $solicitud = SannaApi('get', 'medico/solicitudactiva/'.json_decode($_SESSION['medico_solicitud'])->id_medico, array());
            if($solicitud->success && $solicitud->data != null){
                $_SESSION['medico_solicitud'] = json_encode($solicitud->data);
            }

            $response = array('success' => true, 'data' => $solicitud_documentos);
        }
        catch(Exception $ex){
            $response = array('success' => false, 'message' => $ex->getMessage());
        }

        echo json_encode($response);
    }
    public function SolicitudDocumento2da(){
        $response = null;
        $files = array('0'=> null,'1'=> null,'2'=> null,'3'=> null,'4'=> null,'5'=> null,'6'=> null,'7'=> null );
        try{
            //$upload_location = base_url().'Assets/documents/medicos/';
            $upload_location = $_SERVER['DOCUMENT_ROOT'] . '/Assets/documents/medicos/';
            //$upload_location = '/Assets/documents/medicos/';

            $files[0] = isset($_FILES["file_2da_0"])?$_FILES["file_2da_0"]:null;
            $files[1] = isset($_FILES["file_2da_1"])?$_FILES["file_2da_1"]:null;
            $files[2] = isset($_FILES["file_2da_2"])?$_FILES["file_2da_2"]:null;
            $files[3] = isset($_FILES["file_2da_3"])?$_FILES["file_2da_3"]:null;
            $files[4] = isset($_FILES["file_2da_4"])?$_FILES["file_2da_4"]:null;
            $files[5] = isset($_FILES["file_2da_5"])?$_FILES["file_2da_5"]:null;
            $files[6] = isset($_FILES["file_2da_6"])?$_FILES["file_2da_6"]:null;
            $files[7] = isset($_FILES["file_2da_7"])?$_FILES["file_2da_7"]:null;

            for($index = 0;$index < 8;$index++){
                if($files[$index] != null){

                    $tipo = "";
                    if($index ==0) $tipo="2da_0";if($index ==1) $tipo="2da_1";if($index ==2) $tipo="2da_2";if($index ==3) $tipo="2da_3";if($index ==4) $tipo="2da_4";if($index ==5) $tipo="2da_5"; if($index ==6) $tipo="2da_6";if($index ==7) $tipo="2da_7";

                    $nombre_archivo = '';
                    if($index ==0) $nombre_archivo="_2da_sunpro";
                    if($index ==1) $nombre_archivo="_2da_sunesp";
                    if($index ==2) $nombre_archivo="_2da_doc";
                    if($index ==3) $nombre_archivo="_2da_firma";
                    if($index ==4) $nombre_archivo="_2da_carnet";
                    if($index ==5) $nombre_archivo="_2da_foto";
                    if($index ==6) $nombre_archivo="_2da_habilidad";
                    if($index ==7) $nombre_archivo="_2da_banco";

                    $ext = strtolower(pathinfo($files[$index]["name"], PATHINFO_EXTENSION));
                    $nombre_archivo = json_decode($_SESSION['medico_solicitud'])->nro_solicitud.$nombre_archivo.'.'.$ext;
                    $valid_ext = array("pdf");
                    if(in_array($ext, $valid_ext)){
                       $path = $upload_location.$nombre_archivo;
                       // Upload file
                       if(move_uploaded_file($files[$index]['tmp_name'],$path)){
                        $solicitud_documentos = SannaApi('post', 'medico/solicituddocumento', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo, 'path_file' => $path, 'file_name' => $nombre_archivo )  );
                       }
                    }

                    // $nombre_archivo = (new SannaUtils())->replace_string($files[$index]["name"]);

                    // $filename = $tipo.'_'.$nombre_archivo;
                    // $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    // $valid_ext = array("pdf");
                    // if(in_array($ext, $valid_ext)){
                    //    $path = $upload_location.json_decode($_SESSION['medico_solicitud'])->nro_solicitud."_".$filename;  
                    //    // Upload file
                    //    if(move_uploaded_file($files[$index]['tmp_name'],$path)){
                    //     $solicitud_documentos = $this->model->SannaApi('post', 'medico/solicituddocumento', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo, 'path_file' => $path, 'file_name' => $nombre_archivo )  );
                    //    }
                    // }
                }
            }
            if(isset($solicitud_documentos)){
                $_SESSION['solicitud_documentos'] = json_encode($solicitud_documentos->data);
                $solicitud_documentos = $solicitud_documentos->data;
            }
            else{
                $solicitud_documentos = json_decode($_SESSION['solicitud_documentos']);
            }

            $solicitud_datos = $this->model->SannaApi('post', 'medico/solicitud_2da', 
                array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'comentario'=> htmlspecialchars($_POST["comentario"]),
                    'fecha_vigencia'=> htmlspecialchars($_POST["fecha_vigencia"]), 'codigo_interbancario'=> htmlspecialchars($_POST["codigo_interbancario"]), 'banco'=> htmlspecialchars($_POST["banco"]),
                    'tipo_cuenta'=> htmlspecialchars($_POST["tipo_cuenta"]), 'ruc'=> htmlspecialchars($_POST["ruc"]), 'detraccion'=> htmlspecialchars($_POST["detraccion"]),
                    'emite_factura'=> (htmlspecialchars($_POST["emite_factura"]))
                )
            );

            $solicitud = SannaApi('get', 'medico/solicitudactiva/'.json_decode($_SESSION['medico_solicitud'])->id_medico, array());
            if($solicitud->success && $solicitud->data != null){
                $_SESSION['medico_solicitud'] = json_encode($solicitud->data);
            }

            $response = array('success' => true, 'data' => $solicitud_documentos);
        }
        catch(Exception $ex){
            $response = array('success' => false, 'message' => $ex->getMessage());
        }

        echo json_encode($response);
    }
    


    public function EliminarDocumento(){
        $response = null;
        try{
            $tipo = htmlspecialchars($_POST["datasend"]);

            $solicitud_documentos = $this->model->SannaApi('post', 'medico/solicitudDocumentoDelete', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo )  );

            $_SESSION['solicitud_documentos'] = json_encode($solicitud_documentos->data);

            $solicitud = SannaApi('get', 'medico/solicitudactiva/'.json_decode($_SESSION['medico_solicitud'])->id_medico, array());
            if($solicitud->success && $solicitud->data != null){
                $_SESSION['medico_solicitud'] = json_encode($solicitud->data);
            }

            $response = $solicitud_documentos;
        }
        catch(Exception $ex){
            $response = $ex->getMessage();
        }

        echo json_encode($response);
    }
    public function existsFiles(){
        $tipo = htmlspecialchars($_POST["datasend"]);
        $retorno = array();
        $upload_location =  $_SERVER['DOCUMENT_ROOT'] . '/Assets/documents/medicos/';
        $files = scandir($upload_location);

        $documents_solicitud = json_decode($_SESSION['solicitud_documentos']);
        $file_Exists = false;
        for($index = 0;$index < count($documents_solicitud);$index++){
            for($j = 0;$j < count($files);$j++){
                $file_array = explode("_", $files[$j]);

                if( $file_array[0] == json_decode($_SESSION['medico_solicitud'])->nro_solicitud  ){
                    if(!$file_Exists && $tipo == $documents_solicitud[$index]->tipo){
                        $file_Exists = true;
                        break;
                    }
                }

            }
        }

        echo json_encode(array('existe'=> $file_Exists, 'tipo'=>$tipo));
    }
    public function searchFiles(){
        $tipo = htmlspecialchars($_GET["datasend"]);
        $retorno = array();
        $upload_location =  $_SERVER['DOCUMENT_ROOT'] . '/Assets/documents/medicos/';
        $files = scandir($upload_location);

        $nombre_archivo = '';
        if($tipo=='PruebaDisk'){
            $nombre_archivo = $upload_location.'PRUEBA_DISC.zip';
        }
        if($tipo=='PruebaEysenck'){
            $nombre_archivo = $upload_location.'PRUEBA_EYSENCK.zip';
        }
        if($nombre_archivo != ''){
            header('Content-Description: File Transfer');
            header('Cache-Control: public');
            header("Content-Transfer-Encoding: binary");
            
            header('Content-Disposition: attachment; filename='.$tipo.'.zip' );
            header('Content-Length: '.filesize($nombre_archivo));
            ob_clean();
            flush();
            readfile($nombre_archivo);
            exit;

            return;
        }


        $documents_solicitud = json_decode($_SESSION['solicitud_documentos']);

        for($index = 0;$index < count($documents_solicitud);$index++){
            for($j = 0;$j < count($files);$j++){
                $file_array = explode("_", $files[$j]);

                if( $file_array[0] == json_decode($_SESSION['medico_solicitud'])->nro_solicitud  ){
                    if($tipo == $documents_solicitud[$index]->tipo){
                        $retorno = $documents_solicitud[$index]->path_file;
                        
                        $ext = pathinfo($retorno, PATHINFO_EXTENSION);

                        header('Content-Description: File Transfer');
                        header('Cache-Control: public');
                        header("Content-Transfer-Encoding: binary");
                        
                        header('Content-Disposition: attachment; filename='.$documents_solicitud[$index]->file_name);
                        header('Content-Length: '.filesize($retorno));
                        ob_clean(); #THIS!
                        flush();
                        readfile($retorno);
                        exit;
                    }
                    else{
                        // echo $files[$j];
                    }
                }
            }
        }

        // echo json_encode($retorno);
    }
    /*
    public function EliminarDocumento_2da(){
        $response = null;
        try{
            $tipo = $_POST["datasend"];

            $solicitud_documentos = $this->model->SannaApi('post', 'medico/solicitudDocumento2daDelete', array('nro_solicitud' => json_decode($_SESSION['medico_solicitud'])->nro_solicitud, 'tipo' => $tipo )  );

            $_SESSION['solicitud_documentos_2da'] = json_encode($solicitud_documentos->data);

            $response = $solicitud_documentos;
        }
        catch(Exception $ex){
            $response = $ex->getMessage();
        }

        echo json_encode($response);
    }
    public function searchFiles_2da(){
        $tipo = $_POST["datasend"];
        $retorno = array();
        $upload_location = 'Assets/documents/medicos/';
        $files = scandir($upload_location);

        $documents_solicitud = json_decode($_SESSION['solicitud_documentos_2da']);
        
        // $archivos = "";
        // for($j = 0;$j < count($files);$j++){
        //     $archivos = $archivos." - ".$files[$j];
        // }
        // echo $archivos;
        // return;

        for($index = 0;$index < count($documents_solicitud);$index++){
            for($j = 0;$j < count($files);$j++){
                $file_array = explode("_", $files[$j]);

                if( $file_array[0] == json_decode($_SESSION['medico_solicitud'])->nro_solicitud  ){
                    if($tipo == $documents_solicitud[$index]->tipo){
                        $retorno = $documents_solicitud[$index]->path_file;
                        echo json_encode($retorno);
                        return;
                    }
                    else{
                        // echo $files[$j];
                    }
                }
                
                // $file_array = explode("_", $files[$index]);
                // if( $file_array[0] == json_decode($_SESSION['medico_solicitud'])->nro_solicitud  ){
                //     $tipo_file = $file_array[1];
                //     if($tipo_file == $tipo){
                //         $retorno = array('file_name' => $files[$index], 'tipo' =>  $tipo) ;
                //     }
                //     // $retorno[] = array('file_name' => $files[$index], 'tipo' =>  $tipo) ;
                // }
            }
        }

        echo json_encode($retorno);
    }
    */

    public function getUbigeos()
    {
        $term = htmlspecialchars($_GET["search"]);
        $ubigeomodel = new UbigeoModel();
        $data = $ubigeomodel->getUbigeos($term);
        echo json_encode($data);
    }


    public function Inscripcion()
    {
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        $this->views->getView($this, "Inscripcion", null, "");
    }
    public function BuscarSolicitudes(){
        if(isset($_SESSION['medico_id'])) return;
        /* Catálogos permitidos */
        $array_servicios = array( "dom", "dr", "cro", "amb", "call", "tele", "covid", "midoc", "tsanna" );
        $array_estado = array( "2", "3", "4", "100", "200", "26" );
        /* Catálogos permitidos */
        $response=null;
        $datasend = $_POST["datasend"];
        $fecha_fin = htmlspecialchars($datasend['fecha_fin']);
        $fecha_ini = htmlspecialchars($datasend['fecha_ini']);
        if(isset($datasend['servicio']))
            $servicio = htmlspecialchars($datasend['servicio']);
        else $servicio = 0;
        if(isset($datasend['estado']))
            $estado = htmlspecialchars($datasend['estado']);
        else $estado = 0;
        
        if (!in_array( $servicio, $array_servicios)) { $servicio = -1; }
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        try{
            $response = $this->model->SannaApi('post', 'medico/solicitud_buscar', array(
                'servicio' => $servicio, 'fecha_ini' => $fecha_ini, 'fecha_fin' => $fecha_fin, 'estado' => $estado
            ));
        }
        catch(Exception $ex){
            $response = $ex->getMessage();
        }
        echo json_encode($response);
    }
    public function VerSolicitud()
    {
        if(isset($_SESSION['medico_id'])) return;
        $nro_solicitud = htmlspecialchars($_GET["nro_solicitud"]);
        $id_medico = htmlspecialchars($_GET["id_medico"]);
        $datamedico = $this->model->SannaApi('get', 'medico/getmedico/'.$id_medico, array() );
        if ($datamedico && $datamedico->success && $datamedico->data != null) {
            $_SESSION['medico_data'] = json_encode($datamedico->data);

            $solicitud = SannaApi('get', 'medico/solicitudactiva/'.$id_medico, array());
            if($solicitud->success && $solicitud->data != null){
                $_SESSION['medico_solicitud'] = json_encode($solicitud->data);

                $solicituddocumentos = SannaApi('get', 'medico/solicituddocumentos/'.$nro_solicitud, array());
                if($solicituddocumentos->success && $solicituddocumentos->data != null){
                    $_SESSION['solicitud_documentos'] = json_encode($solicituddocumentos->data);
                }
            }
        }

        $this->views->getView($this, "ValidaSolicitud", "", "");
        

    }

    public function ValidarSolicitud(){
        $response = null;
        try{
            $data = $_POST["datasend"];

            $data["check_data"] = htmlspecialchars($data["check_data"]);
            $data["check_value"] = htmlspecialchars($data["check_value"]);

            $response = $this->model->SannaApi('post', 'medico/solicitud_validar', array('id_solicitud' => json_decode($_SESSION['medico_solicitud'])->id, 'check_data' => $data["check_data"], 'check_value' => $data["check_value"] )  );

            $solicitud = SannaApi('get', 'medico/solicitudactiva/'.json_decode($_SESSION['medico_solicitud'])->id_medico, array());
            if($solicitud->success && $solicitud->data != null){
                $_SESSION['medico_solicitud'] = json_encode($solicitud->data);
            }
        }
        catch(Exception $ex){
            $response = array('success'=>false, 'message'=>$ex->getMessage(), 'data'=>'');
        }

        echo json_encode($response);
    }
    public function CambiarEstado(){
        $response = null;
        try{
            $data = $_POST["datasend"];

            $data["activo"] = htmlspecialchars($data["activo"]);
            $data["comentario"] = htmlspecialchars($data["comentario"]);
            $data["admin_comentario"] = htmlspecialchars($data["admin_comentario"]);

            $response = $this->model->SannaApi('post', 'medico/solicitud_estado', array('id_solicitud' => json_decode($_SESSION['medico_solicitud'])->id, 'activo' => $data["activo"], 'comentario' => $data["comentario"], 'admin_comentario' => $data["admin_comentario"] )  );

            if($response->success){
                $solicitud = SannaApi('get', 'medico/solicitudactiva/'.json_decode($_SESSION['medico_solicitud'])->id, array());
                $response = $solicitud;
                if($solicitud->success && $solicitud->data != null){
                    $_SESSION['medico_solicitud'] = json_encode($solicitud->data);
                }
            }
        }
        catch(Exception $ex){
            $response = array('success'=>false, 'message'=>$ex->getMessage(), 'data'=>'');
        }

        echo json_encode($response);
    }
    
    public function MotivosSolicitud()
    {
        // $nro_solicitud = $_GET["nro_solicitud"];
        // $id_medico = $_GET["id_medico"];
        // $datamedico = $this->model->SannaApi('get', 'medico/getmedico/'.$id_medico, array() );
        // if ($datamedico && $datamedico->success && $datamedico->data != null) {
        //     $_SESSION['medico_data'] = json_encode($datamedico->data);

        //     $solicitud = SannaApi('get', 'medico/solicitudactiva/'.$id_medico, array());
        //     if($solicitud->success && $solicitud->data != null){
        //         $_SESSION['medico_solicitud'] = json_encode($solicitud->data);

        //         $solicituddocumentos = SannaApi('get', 'medico/solicituddocumentos/'.$nro_solicitud, array());
        //         if($solicituddocumentos->success && $solicituddocumentos->data != null){
        //             $_SESSION['solicitud_documentos'] = json_encode($solicituddocumentos->data);
        //         }
        //     }
        // }

        $this->views->getView($this, "ValidaSolicitud", "", "");
    }

    function verificarCaptcha($token)
    {
        $ch = curl_init();
        $getUrl = 'https://www.google.com/recaptcha/api/siteverify?secret='.CAPTCHA_SITE_KEY.'&response='.$token;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        
        $response = curl_exec($ch);
        $decodeGoogleResponse = json_decode($response,true);
        curl_close($ch);
        return $decodeGoogleResponse['success'];

        // # La API en donde verificamos el token
        // $url = "https://www.google.com/recaptcha/api/siteverify";
        // # Los datos que enviamos a Google
        // $datos = [
        //     "secret" => CAPTCHA_SITE_KEY,
        //     "response" => $token,
        // ];
        // // Crear opciones de la petición HTTP
        // $opciones = array(
        //     "http" => array(
        //         "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        //         "method" => "POST",
        //         "content" => http_build_query($datos), # Agregar el contenido definido antes
        //     ),
        // );
        // # Preparar petición
        // $contexto = stream_context_create($opciones);
        // # Hacerla
        // $resultado = file_get_contents($url, false, $contexto);
        // # Si hay problemas con la petición (por ejemplo, que no hay internet o algo así)
        // # entonces se regresa false. Este NO es un problema con el captcha, sino con la conexión
        // # al servidor de Google
        // if ($resultado === false) {
        //     # Error haciendo petición
        //     return false;
        // }

        // # En caso de que no haya regresado false, decodificamos con JSON

        // $resultado = json_decode($resultado);
        // # La variable que nos interesa para saber si el usuario pasó o no la prueba
        // # está en success
        // $pruebaPasada = $resultado->success;
        // # Regresamos ese valor, y listo (sí, ya sé que se podría regresar $resultado->success)
        // return $pruebaPasada;
    }

    public function SolicitudesExportar(){
        if(isset($_SESSION['medico_id'])) return;
        /* Catálogos permitidos */
        $array_servicios = array( "dom", "dr", "cro", "amb", "call", "tele", "covid" );
        $array_estado = array( "2", "3", "4", "100", "200", "26" );
        /* Catálogos permitidos */
        $response=null;
        $datasend = $_POST["datasend"];
        $fecha_fin = htmlspecialchars($datasend['fecha_fin']);
        $fecha_ini = htmlspecialchars($datasend['fecha_ini']);
        if(isset($datasend['servicio']))
            $servicio = htmlspecialchars($datasend['servicio']);
        else $servicio = 0;
        if(isset($datasend['estado']))
            $estado = htmlspecialchars($datasend['estado']);
        else $estado = 0;
        
        if (!in_array( $servicio, $array_servicios)) { $servicio = -1; }
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        try{
            $response = $this->model->SannaApi('post', 'medico/solicitud_exporta', array(
                'servicio' => $servicio, 'fecha_ini' => $fecha_ini, 'fecha_fin' => $fecha_fin, 'estado' => $estado
            ));
        }
        catch(Exception $ex){
            $response = $ex->getMessage();
        }
        echo json_encode($response);
    }

}
