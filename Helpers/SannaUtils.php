<?php

// require_once("Models/SannaUtilsModels.php");
class SannaUtils{

    function verificarCaptcha($token)
    {
        # La API en donde verificamos el token
        $url = "https://www.google.com/recaptcha/api/siteverify";
        # Los datos que enviamos a Google
        $datos = [
            "secret" => CAPTCHA_SITE_KEY,
            "response" => $token,
        ];
        // Crear opciones de la petición HTTP
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($datos), # Agregar el contenido definido antes
            ),
        );
        # Preparar petición
        $contexto = stream_context_create($opciones);
        # Hacerla
        $resultado = file_get_contents($url, false, $contexto);
        # Si hay problemas con la petición (por ejemplo, que no hay internet o algo así)
        # entonces se regresa false. Este NO es un problema con el captcha, sino con la conexión
        # al servidor de Google
        if ($resultado === false) {
            # Error haciendo petición
            return false;
        }

        # En caso de que no haya regresado false, decodificamos con JSON

        $resultado = json_decode($resultado);
        # La variable que nos interesa para saber si el usuario pasó o no la prueba
        # está en success
        $pruebaPasada = $resultado->success;
        # Regresamos ese valor, y listo (sí, ya sé que se podría regresar $resultado->success)
        return $pruebaPasada;
    }
    /*
    Función utilizando una expresión regular para verificar que una contraseña sea segura.
    Verifica que tenga como mínimo un numero (?=.*[0-9]), una letra minúscula (?=.*[a-z]), una letra mayúscula (?=.*[A-Z]) y un carácter especial (?=.*[;:\.,!¡\?¿@#\$%\^&\-_+=\(\)\[\]\{\}]). Todo esto sin espacios en blanco (?=\S+$).
    https://www.lawebdelprogramador.com/codigo/JavaScript/6786-Verificar-si-una-contrasena-es-segura-con-JavaScript.html
    */
    function verificaPoliticaPassword($password){
        // $retorno = false;
        // $patron = "|^(?=.*[A-Z])(?=.*[!@#$&])(?=.*[0-9])(?=.*[a-z]).{8,}$|";
        // preg_match($patron, $password, $matches);
        // if( count($matches) == 1 ) $retorno = true;
        // return $retorno;
        
        //Sacado de las Reglas de Laravel: \vendor\laravel\framework\src\Illuminate\Validation\Rules\Password.php
        $retorno = [];
        if (preg_match('/(\p{Ll}+.*\p{Lu})|(\p{Lu}+.*\p{Ll})/u', $password) == 0) {
            $retorno[] = 'La Contraseña debe contener al menos una letra minúscula y una letra mayúscula';
        }

        if (preg_match('/\pL/u', $password) == 0) {
            $retorno[] = 'La Contraseña debe contener al menos una letra';
        }

        if (preg_match('/\p{Z}|\p{S}|\p{P}/u', $password) == 0) {
            $retorno[] = 'La Contraseña debe contener al menos un símbolo';
        }

        if (preg_match('/\pN/u', $password) == 0) {
            $retorno[] = 'La Contraseña debe contener al menos un número';
        }
        return $retorno;
    }

    function sanitize($input) {
        if(is_array($input)):
            foreach($input as $key=>$value):
                $result[$key] = $this->sanitize($value);
            endforeach;
        else:
            $result = htmlentities($input, ENT_QUOTES, 'UTF-8');
        endif;

        return $result;
    }
    function Log($type, $message){
        //define empty string                                 
        $stEntry="";  
        //get the event occur date time,when it will happened  
        $arLogData['event_datetime']='['.date('D Y-m-d h:i:s A').'] [client '.$_SERVER['REMOTE_ADDR'].']';  
        //if message is array type  
        if(is_array($message))  
        {  
        //concatenate msg with datetime  
        foreach($message as $msg)  
            $stEntry.=$arLogData['event_datetime']." ".$type.":".$msg."\n";  
        }  
        else  
        {   //concatenate msg with datetime  
            $stEntry.=$arLogData['event_datetime']." ".$type.":".$message."\n";  
        }  
        //create file with current date name  
        $stCurLogFileName='log_'.date('Ymd').'.txt';  
        //open the file append mode,dats the log file will create day wise  
        $fHandler=fopen(LOG_PATH.$stCurLogFileName,'a+');  
        //write the info into the file  
        fwrite($fHandler,$stEntry);  
        //close handler  
        fclose($fHandler);
    }

    function replace_string($string_value){
        $chars = mb_str_split(mb_substr($string_value, 0,  strlen($string_value)));
        $final_string = "";
 
        foreach ($chars as $char) {
            $cod_ascii = ord($char);
            if( ($cod_ascii>=40 && $cod_ascii <= 59) ||
                ($cod_ascii>=64 && $cod_ascii <= 125) ||
                ($cod_ascii>=60 && $cod_ascii <= 62) || //< > =
                ($cod_ascii==33) || //!
                $cod_ascii == 32
            ){
                $final_string = $final_string.$char;
            }else{
                switch ($char) {
                    case "á";case  "â"; case "ä"; case "à"; case "ã"; case "å":
                        $char = "a";
                        break;
                    case "é";case  "ê"; case "ë"; case "è":
                        $char = "e";
                        break;
                    case "í";case "î";case "ï";case "ì":
                        $char = "i";
                        break;
                    case "ó";case "ô";case "ö";case "ò";case "õ":
                        $char = "o";
                        break;
                    case "ú";case "û";case "ü";case "ù":
                        $char = "u";
                        break;
                    case "ñ":
                        $char = "n";
                        break;
                    case "ÿ";case "ý":
                        $char = "y";
                        break;
                    case "Á";case "Â";case "Ä";case "À";case "Ã";case "Å":
                        $char = "A";
                        break;
                    case "É";case "Ê";case "Ë";case "È":
                        $char = "E";
                        break;
                    case "Í";case "Î";case "Ï";case "Ì":
                        $char = "I";
                        break;
                    case "Ó";case "Ô";case "Ö";case "Ò";case "Õ":
                        $char = "O";
                        break;
                    case "Ú";case "Û";case "Ü";case "Ù":
                        $char = "U";
                        break;
                    case "Ñ":
                        $char = "N";
                        break;
                    case "Ý":
                        $char = "Y";
                        break;
                    case "|":
                        $char = ",";
                        break;
                    case "'":
                        $char = "`";
                        break;
                    default: 
                        switch($cod_ascii) {
                            case 10: $char=" "; break;
                            case 63: $char="#"; break;
                            default: $char = ""; break;
                        }
                        break;
                }
                $final_string = $final_string.$char;
            }
        }
        return $final_string;
    }
}

?>