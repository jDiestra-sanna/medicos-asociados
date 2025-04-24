<?php
require_once("Models/ConsultaModel.php");

class Consulta extends Controllers
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
            $_GET['tiposdocumento'] = $this->model->getTiposDocumento();
            $this->views->getView($this, "Listar", "", "");
            //header("location: " . base_url() . "Consulta/Listar?msg=$data");
        }
        public function Buscar()
        {
            $tipo_documento = htmlspecialchars($_POST['id_tipo_documento']);
            $nro_documento = htmlspecialchars($_POST['nro_documento']);
            $nombres = htmlspecialchars($_POST['nombre_apellido']);
            $data = $this->model->buscarEmpleado(intval($tipo_documento), $nro_documento, $nombres);
            $_GET['tiposdocumento'] = $this->model->getTiposDocumento();
            $this->views->getView($this, "Listar", $data, "");
        }

        public function AtencionesPasadas()
        {
            /* Catálogos permitidos */
            $array_tipodocumento = $this->model->getTiposDocumento();
            /* Catálogos permitidos */

            $id_tipo_documento = htmlspecialchars($_GET['id_tipo_documento']);
            $nro_documento = htmlspecialchars($_GET['nro_documento']);

            if (!in_array( $id_tipo_documento, $array_tipodocumento)) { $id_tipo_documento = -1; }

            $data = $this->model->buscarAtencionesEmpleado($id_tipo_documento, $nro_documento);
            // $this->views->getView($this, "Atenciones", $data, "");
            echo json_encode($data);
        }


}
