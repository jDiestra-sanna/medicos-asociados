<?php
class Controllers{

    public function __construct()
    {
        if(session_id() == '') {
            session_start();
        }
        //unset($_SESSION['ip']);
        if( isset($_SESSION['ip']) ) {
            // header('location: '.base_url(). 'logout');
            if ($this->getUserIP() !== $_SESSION['ip']) {
                // invalid session
                session_destroy();
            }
            // if (isset($_SESSION['time_started']) && ($_SERVER['REQUEST_TIME'] - $_SESSION['time_started'] > TIME_SESSION)) {
            $time = $_SERVER['REQUEST_TIME'];
            if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > TIME_SESSION) {
                session_unset(); 
                session_destroy();
                // header('location: '.base_url());

                $isAjaxRequest = false;
                if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0 ){
                    $isAjaxRequest = true;
                }
                $this->redirect($isAjaxRequest);
            }
            $_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];
            // else if(!isset($_SESSION['id']) ){
            //     // header('location: '.base_url(). 'logout');
            // }
        }
        else{
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $currentpage = str_replace(base_url(), '', $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

            // valida si la url está permitida
            // $allowed = array_filter((array)SLUGS_ARRAY, function($k) use ($currentpage) { return $k == $currentpage; });
            $allowed = array_filter((array)SLUGS_ARRAY, function($k) use ($currentpage) { return substr($currentpage, 0, strlen($k)) == $k; });
            
            if(count($allowed) == 0){
                header('location: '.base_url());
            }


            if($currentpage != '' && $currentpage != 'home/sesionmedicos' ){
                // echo 'BBB0 '.base_url();
                // echo 'BBB1 '.$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                // echo 'BBB2 '.$currentpage;
                // header('location: '.base_url());

                // if ( count($_SESSION) == 0 ) {
                //     header("location: " . base_url().'home/sesionmedicos');
                // }
            }
        }
        
        /* PARA VALIDAR QUE ESTÉN TODAS LAS VARIABLES DE SESION INICIALES PARA INTRANET */
        if ( !empty($_SESSION['id']) ) {
            if ( !isset($_SESSION['activo']) ){
                unset($_SESSION['id']);
                header("location: " . base_url());
            }else{
                if ( boolval($_SESSION['activo']) == false ){
                    unset($_SESSION['id']);
                    header("location: " . base_url());
                }
            }
        }
        /* PARA VALIDAR QUE ESTÉN TODAS LAS VARIABLES DE SESION INICIALES PARA INTRANET */

        $this->views = new Views();
        $this->loadModel();        
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
    
    public function loadModel()
    {
        $model = get_class($this)."Model";
        $routClass = "Models/".$model.".php";
        if (file_exists($routClass)) {
            require_once($routClass);
            $this->model = new $model();
        }
    }
    public function emptyFields($listFields){
        $listMesssage = array();
        foreach ($listFields as $key => $field) {
            if(empty($field))
            $listMesssage[] = 'Debe establecer un valor para '.strtoupper($key);
        }
        return $listMesssage;
    }
    public function redirect($isAjax = false) {
        if ($isAjax === true) {
            // echo '<script>window.location = ' . base_url() . ';</script>';
            // echo '{ "success": false, "redirect": '. base_url() .' }';
            echo 'ERROR_REDIRECT:'.base_url();
        } else {
            header('location: '.base_url());
        }
        exit;
    }


}

?>