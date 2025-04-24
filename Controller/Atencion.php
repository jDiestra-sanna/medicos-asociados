<?php

class Atencion extends Controllers
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
        $this->views->getView($this, "Listar", "", "");
    }
    public function NuevaAtencion()
    {
        $this->views->getView($this, "Nuevo", "", "");
    }
    public function NuevaAtencionSin()
    {
        $this->views->getView($this, "Nuevosin", "", "");
    }
    public function insertAtencion(){
        $dataatencion = $_POST['dataatencion'];
        $dataatencion['user'] = htmlspecialchars($dataatencion['user']);
        $dataatencion['cod_tit'] = htmlspecialchars($dataatencion['cod_tit']);
        $dataatencion['apepat'] = htmlspecialchars($dataatencion['apepat']);
        $dataatencion['apemat'] = htmlspecialchars($dataatencion['apemat']);
        $dataatencion['nombre'] = htmlspecialchars($dataatencion['nombre']);
        $dataatencion['fec_ate'] = htmlspecialchars($dataatencion['fec_ate']);
        $dataatencion['cod_dir'] = htmlspecialchars($dataatencion['cod_dir']);
        $dataatencion['cod_dis'] = htmlspecialchars($dataatencion['cod_dis']);
        $dataatencion['tipo_ingreso'] = htmlspecialchars($dataatencion['tipo_ingreso']);
        $dataatencion['id_matricula'] = htmlspecialchars($dataatencion['id_matricula']);
        $dataatencion['datos_covid'] = htmlspecialchars($dataatencion['datos_covid']);
        $dataatencion['cod_ate'] = htmlspecialchars($dataatencion['cod_ate']);
        $dataatencion['cod_lab'] = htmlspecialchars($dataatencion['cod_lab']);
        $dataatencion['examenlab'] = htmlspecialchars($dataatencion['examenlab']);
        $dataatencion['codaseguradora'] = htmlspecialchars($dataatencion['codaseguradora']);
        $dataatencion['txtaseguradora'] = htmlspecialchars($dataatencion['txtaseguradora']);
        $dataatencion['siteds_codautorizacion'] = htmlspecialchars($dataatencion['siteds_codautorizacion']);
        $dataatencion['clasif_ate_referenciada'] = htmlspecialchars($dataatencion['clasif_ate_referenciada']);

        if($dataatencion){
            echo json_encode($this->model->insertAtencion($dataatencion));
        }        
        die();
    }

    public function BuscarAtencion()
    {
        echo json_encode($this->model->buscaAtencion($_POST['data']));
        return;
    }

}
