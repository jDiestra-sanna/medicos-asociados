<?php
require_once("Models/EmpresasModel.php");

class Beneficios extends Controllers
{
    public function __construct()
    {
        // if (empty($_SESSION['activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }
    /************ INICIO SECCION BENEFICIOS ****************/
        public function Listar()
        {
            $data = $this->model->getBeneficios();
            $this->views->getView($this, "Listar", $data, "");
        }
        public function Insertar()
        {
            $nombre = htmlspecialchars($_POST['nombre']);
            $descripcion = htmlspecialchars($_POST['descripcion']);
            $precio_regular = htmlspecialchars($_POST['precio_regular']);
            $listEmpty = parent::emptyFields($_POST);
            if(count($listEmpty))
                header("location: " . base_url() . "Beneficios/Listar?msg=$listEmpty");
            else{
                $data = $this->model->insertarBeneficio($nombre, $descripcion, $precio_regular);
                if ( isset($data) && isset($data->success) ) {
                    $alert = $data->message;
                }
                header("location: " . base_url() . "Beneficios/Listar?msg=$alert");
            }
            die();
        }
        public function Eliminar()
        {
            $id = intval(htmlspecialchars($_GET['id']));
            $data = $this->model->eliminarBeneficio($id);
            if ( isset($data) && isset($data->success) ) {
                $alert = $data->message;
            }
            header("location: " . base_url() . "Beneficios/Listar?msg=$alert");     
            die();
        }

        public function Editar()
        {
            $id = htmlspecialchars($_GET['id']);
            $data = $this->model->editarBeneficio($id);
            if ( isset($data) && $data->success == false ) {
                $this->Listar();
            }else{
                $this->views->getView($this, "Editar", $data);
            }
        }
        public function actualizar()
        {
            $id = htmlspecialchars($_POST['id']);
            $nombre = htmlspecialchars($_POST['nombre']);
            $descripcion = htmlspecialchars($_POST['descripcion']);
            $precio_regular = htmlspecialchars($_POST['precio_regular']);
            $listEmpty = parent::emptyFields($_POST);
            if(count($listEmpty))
                header("location: " . base_url() . "Beneficios/Listar?msg=$listEmpty");
            else{
                $data = $this->model->actualizarBeneficios(intval($id), $nombre, $descripcion, $precio_regular);
                if ( isset($data) && isset($data->success) ) {
                    $alert = $data->message;
                }
                header("location: " . base_url() . "Beneficios/Listar?msg=$alert");
            }
            die();
        }
    /************ FIN SECCION PRODUCTOS ****************/

}
