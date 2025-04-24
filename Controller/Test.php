<?php
require_once("Models/TestModel.php");

class Test extends Controllers
{
    public function __construct()
    {
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }
    /************ INICIO SECCION BENEFICIOS ****************/
    public function Listar()
    {
        $this->views->getView($this, "Listar", '', "");
    }
    public function Buscar()
    {
        $dataFilterGrid = $_GET;
        //echo json_encode($dataFilterGrid);
        //echo $dataFilterGrid['draw'].' -- '.$dataFilterGrid['length'].' -- '.$dataFilterGrid['columns'][$dataFilterGrid['order'][0]['column']]['data'];
        //return;

        //$dataFilterGrid['draw'] = intval($dataFilterGrid['length'])/intval($dataFilterGrid['start']);


        $data = $this->model->getTest(intval($dataFilterGrid['start']), intval($dataFilterGrid['length']), $dataFilterGrid['columns'][$dataFilterGrid['order'][0]['column']]['data']);
        //$data = $this->model->getTest(2, 10, "");
        //$data->data->recordsTotal = intval($dataFilterGrid['length']);
        //$data->data->draw  = 1;

        $data->data->recordsFiltered  = $data->data->total;
        $data->data->recordsDisplay  = intval($dataFilterGrid['length']);
        $data->data->recordsTotal  = $data->data->total;
        echo json_encode($data->data);
        // $data->recordsFiltered  = $data->total;
        // $data->recordsDisplay  = intval($dataFilterGrid['length']);
        // $data->recordsTotal  = $data->total;
        // echo json_encode($data);
    }

    public function Llamadas()
    {
        $dataFilterGrid = $_GET;
        $data = $this->model->getLlamadas(intval($dataFilterGrid['start']), intval($dataFilterGrid['length']), $dataFilterGrid['columns'][$dataFilterGrid['order'][0]['column']]['data']);
        echo json_encode($data->data);
    }

}
