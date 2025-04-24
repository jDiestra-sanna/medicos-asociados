<?php
require_once("Models/PacienteModel.php");

class Paciente extends Controllers
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
    public function NuevoPaciente()
    {
        $this->views->getView($this, "Nuevo", "", "");
    }
    public function insertPersona(){
        $datapersona = htmlspecialchars($_POST['datapersona']);
        if($datapersona){
            $datapersona['edad'] = date_diff(date_create($datapersona['fnac_pac']), date_create(date("Y-m-d")));
            echo json_encode($this->model->insertPersona($datapersona));
        }        
        die();
    }
    public function actualizarpaciente()
    {
        $datasent = $_POST['data'];
        $datasent["cod_hia"] = htmlspecialchars($datasent["cod_hia"]);
        $datasent["fnac_pac"] = htmlspecialchars($datasent["fnac_pac"]);
        $datasent["sex_pac"] = htmlspecialchars($datasent["sex_pac"]);
        $datasent["correo_pac"] = htmlspecialchars($datasent["correo_pac"]);
        $datasent["cel_pac"] = htmlspecialchars($datasent["cel_pac"]);
        $datasent["fecha_sintoma"] = htmlspecialchars($datasent["fecha_sintoma"]);
        $datasent["fecha_atencion"] = htmlspecialchars($datasent["fecha_atencion"]);
        $datasent["idsegcovid"] = htmlspecialchars($datasent["idsegcovid"]);

        echo json_encode($this->model->SannaApi('post', 'updatedatospaciente', $datasent ));
        //echo json_encode($this->model->buscaPaciente($_POST['data']));
    }
    public function BuscarPaciente()
    {
        /* Catálogos permitidos */
        $array_tipodoc = array( "1", "2", "3", "4", "5", "6", "7", "8", "9" );
        /* Catálogos permitidos */

        $data = $_POST["data"];
        $data["ape_paterno"] = htmlspecialchars($data["ape_paterno"]);
        $data["ape_materno"] = htmlspecialchars($data["ape_materno"]);
        $data["nombres"] = htmlspecialchars($data["nombres"]);
        $data["tipodoc"] = htmlspecialchars($data["tipodoc"]);

        if (!in_array( $data["tipodoc"], $array_tipodoc)) { $data["tipodoc"] = -1; }

        echo json_encode($this->model->buscaPaciente($_POST['data']));
        return;
    }

    public function getPacientesBuscar()
    {
        $term = $_GET["search"];
        $limit = $_GET["limit"];
        echo json_encode($this->model->SannaApi('post', 'buscapacientelimitado', array(
            'limit' => $limit,
            'nombres' => $term
        )));
    }
    public function BuscarPacientePorCodHia()
    {
        $cod_hia = htmlspecialchars($_GET['cod_hia']);
        $data = $this->model->SannaApi('get', 'paciente/'.$cod_hia, array() );
        if($data){
            $tz  = new DateTimeZone('America/Lima');
            $edad = date_diff(new DateTime($data->fnac_pac), new DateTime('now', $tz));
            $data->edad = $edad;
        }
        echo json_encode($data);
    }

}
