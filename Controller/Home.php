<?php
    class Home extends Controllers{
        public function __construct()
        {
        if (!empty($_SESSION['activo'])) {
            header("location: " . base_url()."Admin/Listar");
        }
            parent::__construct();
        }
        public function home()
        {
            $this->views->getView($this, "home");
        }
        public function sesionmedicos()
        {
            $this->views->getView($this, "sesionmedicos");
        }
        public function sesionmedico()
        {
            $this->views->getView($this, "sesionmedico");
        }
        public function medicosregistro()
        {
            $this->views->getView($this, "medicos_registro");
        }
        public function recuperar()
        {
            $this->views->getView($this, "recuperar");
        }
        public function reseteo()
        {
            $querystring = $_SERVER['QUERY_STRING'];
            $querystringarray = explode("&", $querystring);
            $encryptedstring = ""; $type = "";
            for($index = 0;$index < count($querystringarray);$index++){
                $keyarray = explode("=", $querystringarray[$index]);
                if( $keyarray[0] == "key" ){
                    $encryptedstring = $keyarray[1];
                }
                if( $keyarray[0] == "type" ){
                    $type = $keyarray[1];
                }
            }
            $_SESSION["encrypted_string"] = $encryptedstring;
            $_SESSION["type"] = $type;
            $this->views->getView($this, "reseteo");
        }
}
?>