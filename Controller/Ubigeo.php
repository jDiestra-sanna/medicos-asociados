<?php
require_once("Models/UbigeoModel.php");

class Ubigeo extends Controllers
{
    public function __construct()
    {
        // if (empty($_SESSION['activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }
    /************ INICIO SECCION BENEFICIOS ****************/
    public function getUbigeos()
    {
        $term = htmlspecialchars($_GET["search"]);
        $data = $this->model->getUbigeos($term);
        echo json_encode($data);
    }
}
