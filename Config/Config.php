<?php
	/************* CONSTANTES PARA PRODUCCION - SANNA ***********/
    const BASE_ROOT = "";
    const BASE_URL = "";
    
    const API_URL = "http://10.6.26.16:8198/api/";
    const API_URL_SQL = "http://localhost:8060/sanna-api-sql/queryapi.php";
    const API_URL_AUTENTICATION = "http://10.6.26.16:8198/authenticate/";
    
    const API_USER = 'ivan.tapia@diurvanconsultores.com';
    const API_PASSWORD = 'S@nn@2024P3ru';
    const Ruc_ipress = "20251011461";
    const cod_ipress = "00023920";

    const SLUGS_ARRAY = array('', 'home/sesionmedicos', 'home/sesionmedicos/', 'home/medicosregistro', 'home/medicosregistro/', 'Seguridad/GenerarQR', 'Medicos/CrearMedico', 'MedicosValidate/login', 'home/recuperar', 'home/reseteo' );
    const TIME_SESSION = 1800; // 60 segundos x 30 minutos = 1800 segundos
    const CAPTCHA_SITE_KEY="6LcL8IMkAAAAABmnGgVUd49TfCkBVmKp9HeaHTGw";
    const CAPTCHA_SITE_PUBLIC="6LcL8IMkAAAAAFd4EXGK-Sv_1eMrCnvjC9GXtnss";
    const LOG_PATH='Log/';

    function getUrl(){
        return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    }


    /************* CONSTANTES PARA LOCAL - IVAN ***********/
    // const BASE_ROOT = "sanna-web/";
    // const BASE_URL = "sanna-web/";

    // const API_URL = "http://localhost:8060/sanna-api/public/api/";
    // const API_URL_SQL = "http://localhost:8060/sanna-api-sql/queryapi.php";
    // const API_URL_AUTENTICATION = "http://localhost:8060/sanna-api/public/authenticate/";

    // const API_USER = 'ivan.tapia@diurvanconsultores.com';
    // const API_PASSWORD = 'P@ssw0rd';
    // const Ruc_ipress = "20251011461";
    // const cod_ipress = "00023920";

    // const SLUGS_ARRAY = array('', 'home/sesionmedicos', 'home/sesionmedicos/', 'home/medicosregistro', 'home/medicosregistro/', 'Seguridad/GenerarQR', 'Medicos/CrearMedico', 'MedicosValidate/login', 'home/recuperar', 'home/reseteo' );
    // const TIME_SESSION = 1800; // 60 segundos x 30 minutos = 1800 segundos
    // const CAPTCHA_SITE_KEY="6LcfZnQkAAAAAGi_3v9LgDCddN5xyczSTIwhLYlN";
    // const CAPTCHA_SITE_PUBLIC="6LcfZnQkAAAAAMf9RJ_VD7k-Ts6jl5Zw0a7X9q4j";
    // const LOG_PATH='Log/';

    // function getUrl(){
    //     return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    // }
?>