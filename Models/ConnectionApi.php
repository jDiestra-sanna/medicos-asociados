<?php
    /* BORRAR TODO ESTO PARA USAR LA CLASE */
    // function CallAPI($method, $url,$data = false)
    // {
    //     $curl = curl_init();

    //     switch ($method)
    //     {
    //         case "POST":
    //             curl_setopt($curl, CURLOPT_POST, 1);
    //             if ($data)
    //                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //             break;
    //         case "PUT":
    //             curl_setopt($curl, CURLOPT_PUT, 1);
    //             break;
    //         default:
    //             if ($data)
    //                 $url = sprintf("%s?%s", API_URL.$url, http_build_query($data));
    //     }

    //     // // Optional Authentication:
    //     // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //     $result = curl_exec($curl);

    //     curl_close($curl);

    //     return $result;
    // }
    // function SannaApiModel($method, $url,$data){
    //     $url_api = API_URL.$url;
    //     $url_api_autenticacion = API_URL_AUTENTICATION.'userapp/login';
        
    //     /* Inicio: Get Token */
    //     $token_curl = curl_init();
    //     curl_setopt_array($token_curl, array(
    //         CURLOPT_URL => $url_api_autenticacion,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_POST => true,
    //         CURLOPT_POSTFIELDS => rawurldecode(http_build_query(
    //             array(
    //                 "email" => API_USER,
    //                 "password" => API_PASSWORD
    //             )
    //         ))
    //     ));
    //     $token_response = curl_exec($token_curl);
    //     if (curl_errno($token_curl))
    //         $token = json_decode(curl_error($token_curl));
    //     else
    //         $token = json_decode($token_response);
    //     curl_close($token_curl);
    //     /* Fin: Get Token */

    //     /* Inicio: Petición API */
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url_api,
    //         //CURLOPT_SSL_VERIFYPEER => false,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_CUSTOMREQUEST => strtoupper($method),
    //         // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
    //         CURLOPT_POST => ($data?true:false),
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: Bearer '.$token->data,
    //             'Content-Type: application/json'
    //         ),
    //     ));
    //     if($data){
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    //     }
    //     $response = curl_exec($curl);
    //     if (curl_errno($curl))
    //         $result = json_decode(curl_error($curl));
    //     else
    //         $result = json_decode($response);
    //     curl_close($curl);
    //     /* Fin: Petición API */
    //     return $result;
    // }
    // /* FUNCIONES PARA PRUEBAS */
    // function SannaApiAutenticate(){
    //     $url_api_autenticacion = API_URL_AUTENTICATION.'userapp/login';
        
    //     /* Inicio: Get Token */
    //     $token_curl = curl_init();
    //     curl_setopt_array($token_curl, array(
    //         CURLOPT_URL => $url_api_autenticacion,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_POST => true,
    //         CURLOPT_POSTFIELDS => rawurldecode(http_build_query(
    //             array(
    //                 "email" => API_USER,
    //                 "password" => API_PASSWORD
    //             )
    //         ))
    //     ));
    //     $token_response = curl_exec($token_curl);
    //     if (curl_errno($token_curl))
    //         $token = json_decode(curl_error($token_curl));
    //     else
    //         $token = json_decode($token_response);
    //     curl_close($token_curl);
    //     /* Fin: Get Token */
    //     return $token->data;
    // }
    // function SannaApiData($method, $url, $data, $token){
    //     $url_api = API_URL.$url;
    //     /* Inicio: Petición API */
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url_api,
    //         //CURLOPT_SSL_VERIFYPEER => false,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_CUSTOMREQUEST => strtoupper($method),
    //         // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
    //         CURLOPT_POST => ($data?true:false),
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: Bearer '.$token,
    //             'Content-Type: application/json'
    //         ),
    //     ));
    //     if($data){
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    //     }
    //     $response = curl_exec($curl);
    //     if (curl_errno($curl))
    //         $result = json_decode(curl_error($curl));
    //     else
    //         $result = json_decode($response);
    //     curl_close($curl);
    //     /* Fin: Petición API */
    //     return $result;
    // }
    // function SannaApiAutenticacion($method, $url,$data){
    //     $url_api = API_URL_AUTENTICATION.$url;
    //     /* Inicio: Petición API */
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url_api,
    //         //CURLOPT_SSL_VERIFYPEER => false,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_CUSTOMREQUEST => strtoupper($method),
    //         // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
    //         CURLOPT_POST => ($data?true:false)
    //     ));
    //     if($data){
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //     }
    //     $response = curl_exec($curl);
    //     if (curl_errno($curl))
    //         $result = json_decode(curl_error($curl));
    //     else
    //         $result = json_decode($response);
    //     curl_close($curl);
    //     /* Fin: Petición API */
    //     return $result;
    // }
    /* FUNCIONES PARA PRUEBAS */

    /* BORRAR TODO ESTO PARA USAR LA CLASE */

    /* Esta funcion se usa para evitar tocar en varias partes del código para la llamada a la Api */
    function SannaApi($method, $url,$data){
        $connectionApi = new ConnectionApi();
        return $connectionApi->SannaApi($method, $url, $data);
    }

    class ConnectionApi{
        function CallAPI($method, $url,$data = false)
        {
            $curl = curl_init();

            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);
                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_PUT, 1);
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", API_URL.$url, http_build_query($data));
            }

            // // Optional Authentication:
            // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);

            return $result;
        }


        function SannaApi($method, $url,$data){
            $this->validarSession();
            
            $url_api = API_URL.$url;
            $url_api_autenticacion = API_URL_AUTENTICATION.'userapp/login';
            
            /* Inicio: Get Token */
            $token_curl = curl_init();
            curl_setopt_array($token_curl, array(
                CURLOPT_URL => $url_api_autenticacion,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => rawurldecode(http_build_query(
                    array(
                        "email" => API_USER,
                        "password" => API_PASSWORD
                    )
                ))
            ));
            $token_response = curl_exec($token_curl);
            if (curl_errno($token_curl))
                $token = json_decode(curl_error($token_curl));
            else
                $token = json_decode($token_response);
            curl_close($token_curl);
            /* Fin: Get Token */

            /* Inicio: Petición API */
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url_api,
                //CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => strtoupper($method),
                // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
                CURLOPT_POST => ($data?true:false),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$token->data,
                    'Content-Type: application/json'
                ),
            ));
            if($data){
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
            $response = curl_exec($curl);
            
            if (curl_errno($curl))
                $result = json_decode(curl_error($curl));
            else
                $result = json_decode($response);
            curl_close($curl);
            /* Fin: Petición API */
            return $result;
        }
        public function validarSession(){
            /* Validacion de COOKIE en el HEADER */
            $cookies = getallheaders();
            $tiene_session = false;
            echo $tiene_session;
            if( isset($cookies["Cookie"]) and strpos($cookies["Cookie"], 'PHPSESSID') >= 0){
                $tiene_session = true;
            }
            if(!$tiene_session){ 
                // header('location: '.base_url()); 
                header("Location: ".base_url());
                exit();
            }
            /* Validacion de COOKIE en el HEADER */
        }



        /* FUNCIONES PARA PRUEBAS */
        function SannaApiAutenticate(){
            $url_api_autenticacion = API_URL_AUTENTICATION.'userapp/login';
            
            /* Inicio: Get Token */
            $token_curl = curl_init();
            curl_setopt_array($token_curl, array(
                CURLOPT_URL => $url_api_autenticacion,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => rawurldecode(http_build_query(
                    array(
                        "email" => API_USER,
                        "password" => API_PASSWORD
                    )
                ))
            ));
            $token_response = curl_exec($token_curl);
            if (curl_errno($token_curl))
                $token = json_decode(curl_error($token_curl));
            else
                $token = json_decode($token_response);
            curl_close($token_curl);
            /* Fin: Get Token */
            return $token->data;
        }
        function SannaApiData($method, $url, $data, $token){
            $url_api = API_URL.$url;
            /* Inicio: Petición API */
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url_api,
                //CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => strtoupper($method),
                // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
                CURLOPT_POST => ($data?true:false),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$token,
                    'Content-Type: application/json'
                ),
            ));
            if($data){
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
            $response = curl_exec($curl);
            if (curl_errno($curl))
                $result = json_decode(curl_error($curl));
            else
                $result = json_decode($response);
            curl_close($curl);
            /* Fin: Petición API */
            return $result;
        }
        function SannaApiAutenticacion($method, $url,$data){
            $url_api = API_URL_AUTENTICATION.$url;
            /* Inicio: Petición API */
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url_api,
                //CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => strtoupper($method),
                // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
                CURLOPT_POST => ($data?true:false)
            ));
            if($data){
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            $response = curl_exec($curl);
            if (curl_errno($curl))
                $result = json_decode(curl_error($curl));
            else
                $result = json_decode($response);
            curl_close($curl);
            /* Fin: Petición API */
            return $result;
        }
        /* FUNCIONES PARA PRUEBAS */
    }

    class ConnectionSql{
        function ejecutarconsulta($query){
            $server_name = "10.6.16.10";
            $database_name = "BD_Sanna_ambulatoria";
            try
            {
                $conn = new PDO("sqlsrv:Server=$server_name;Database=$database_name;ConnectionPooling=0", "UserTablet", "Drmas2013");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = $conn->prepare($query);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }
        function ejecutarconsultaapi($array_data){
            $url_api = API_URL_SQL;
           
            /* Inicio: Petición API */
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url_api,
                //CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                // CURLOPT_CUSTOMREQUEST => strtoupper($method),
                // CURLOPT_POST => (strtoupper($method)=='GET'?false:true),
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($array_data));
            $response = curl_exec($curl);
            if (curl_errno($curl))
                $result = json_decode(curl_error($curl));
            else
                $result = json_decode($response);
            curl_close($curl);
            /* Fin: Petición API */
            return $result;
        }

    }