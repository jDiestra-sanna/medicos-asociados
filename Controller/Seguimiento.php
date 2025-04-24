<?php
require_once("Models/SeguimientoModel.php");
require_once("Models/ConnectionApi.php");

class Seguimiento extends Controllers
{
    public function __construct()
    {
        // if (empty($_SESSION['activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }
    /************ INICIO SECCION SEGUIMIENTO ****************/
    public function Listar()
    {
        $data = $this->model->getClasificacionesFiltro([50,51,52,53,22,12,24,99]);
        $this->views->getView($this, "Listar", $data, "");
    }
    public function Buscar()
    {
        /* Catálogos permitidos */
        $array_tipodoc = array( "2", "3", "5" );
        /* Catálogos permitidos */
        $empresa = htmlspecialchars($_GET['empresa']);
        $ape_paterno = htmlspecialchars($_GET['ape_paterno']);
        $ape_materno = htmlspecialchars($_GET['ape_materno']);
        $nombres =htmlspecialchars( $_GET['nombres']);
        $tipodoc = htmlspecialchars($_GET['tipodoc']);
        $numdoc = htmlspecialchars($_GET['numdoc']);

        if (!in_array( $tipodoc, $array_tipodoc)) { $tipodoc = -1; }

        echo json_encode( $this->model->getEmpleadosSinSeguimiento(array(
            'tipo_documento' =>  $tipodoc,
            'num_doc_id' =>  $numdoc,
            'apellido_paterno' =>  $ape_paterno,
            'apellido_materno' =>  $ape_materno,
            'nombres' =>  $nombres,
            'empresa' =>  $empresa
        )) );
    }
    public function EmpleadoCargar()
    {
        set_time_limit(0);
        $response = $this->model->insertEmpleadosSinSeguimiento(htmlspecialchars($_POST));
        echo json_encode($response);
    }
    public function insertAtencionSinSeguimiento(){
        $clasificacion = htmlspecialchars($_POST['clasificacion']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $listEmpty = parent::emptyFields($_POST);
        if(count($listEmpty))
            header("location: " . base_url() . "Seguimiento/Listar?msg=$listEmpty");
        else{
            $data = $this->model->insertAtencionSinSeguimiento(array());
            if ( isset($data) && isset($data->success) ) {
                $alert = $data->message;
            }
            header("location: " . base_url() . "Seguimiento/Listar?msg=$alert");
        }
        die();
    }

    public function SeguimientoCovid()
    {
        $this->views->getView($this, "SeguimientoCovid", "", "");
    }
    public function Seguimiento()
    {
        $this->views->getView($this, "Seguimiento", "", "");
    }
    public function Observacion()
    {
        $this->views->getView($this, "Observacion", "", "");
    }
    public function Historial()
    {
        $this->views->getView($this, "Historial", "", "");
    }
    public function DatosSeguimiento()
    {
        $this->views->getView($this, "DatosSeguimiento", "", "");
    }
    public function BuscarSeguimientoBCP()
    {
        $fecha_ini = htmlspecialchars($_GET['fecha_ini']);
        $fecha_fin = htmlspecialchars($_GET['fecha_fin']);
        $condicion = htmlspecialchars($_GET['condicion']);

        $tiene_permiso = false;
        $permisos =  $_SESSION['permisos'];
        foreach($permisos as $key=> $value){
            if($value->cod_permiso == 14804){
                $tiene_permiso = true;
                break;
            }
        }

        echo json_encode( $this->model->getSeguimientoBcp(array(
            'fecha_ini' =>  $fecha_ini,
            'fecha_fin' =>  $fecha_fin,
            'filtro' =>  $condicion,
            'tiene_permiso' => $tiene_permiso
        )) );
    }
    public function BuscarSeguimientoCovid()
    {
        $fecha_ini = htmlspecialchars($_GET['fecha_ini']);
        $fecha_fin = htmlspecialchars($_GET['fecha_fin']);

        $tiene_permiso = false;
        $permisos =  $_SESSION['permisos'];
        foreach($permisos as $key=> $value){
            if($value->cod_permiso == 14804){
                $tiene_permiso = true;
                break;
            }
        }
        echo json_encode($this->model->SannaApi('post', 'seguimientocovid', array(
            'fecha_ini' =>  $fecha_ini,
            'fecha_fin' =>  $fecha_fin,
            'tiene_permiso' => $tiene_permiso
        ) ));
    }

    public function LLamada()
    {
        $this->views->getView($this, "Llamada", "", "");
    }

    public function getSeguimientoCovidEstados(){
        $tipo_ingreso = htmlspecialchars($_GET['tipo_ingreso']);
        $data = $this->model->getSeguimientoCovidEstados($tipo_ingreso);
        echo json_encode($data->data);
    }
    public function getFactoresRiesgo(){
        $data = $this->model->getFactoresRiesgo();
        echo json_encode($data->data);
    }

    public function insertSeguimientoBcp(){
        $datasend = $_POST;

        $datasend['id_seg_covid']= htmlspecialchars($datasend['id_seg_covid']);
        $datasend['numero_seguimiento']= htmlspecialchars($datasend['numero_seguimiento']);
        $datasend['estado']= htmlspecialchars($datasend['estado']);
        $datasend['estadoanterior']= htmlspecialchars($datasend['estadoanterior']);
        $datasend['des_estado']= htmlspecialchars($datasend['des_estado']);
        $datasend['check_ume']= htmlspecialchars($datasend['check_ume']);
        $datasend['check_domicilio']= htmlspecialchars($datasend['check_domicilio']);
        $datasend['check_dronline']= htmlspecialchars($datasend['check_dronline']);
        $datasend['periodo']= htmlspecialchars($datasend['periodo']);
        $datasend['cod_clasificacion']= htmlspecialchars($datasend['cod_clasificacion']);
        $datasend['es_paciente_redflag']= htmlspecialchars($datasend['es_paciente_redflag']);
        $datasend['es_mayor_edad']= htmlspecialchars($datasend['es_mayor_edad']);
        $datasend['con_morbilidad']= htmlspecialchars($datasend['con_morbilidad']);
        $datasend['con_sintomas']= htmlspecialchars($datasend['con_sintomas']);
        $datasend['fecha_atencion']= htmlspecialchars($datasend['fecha_atencion']);
        $datasend['fecha_coordinada']= htmlspecialchars($datasend['fecha_coordinada']);
        $datasend['vacuna']= htmlspecialchars($datasend['vacuna']);
        $datasend['vacuna_dosis']= htmlspecialchars($datasend['vacuna_dosis']);
        $datasend['cod_paciente']= htmlspecialchars($datasend['cod_paciente']);
        $datasend['paciente_no_contesta']= htmlspecialchars($datasend['paciente_no_contesta']);
        $datasend['riesgo']= htmlspecialchars($datasend['riesgo']);
        $datasend['sintoma']= htmlspecialchars($datasend['sintoma']);
        $datasend['redflag'] = htmlspecialchars($datasend['redflag']);

        $datasend['usuario_registro'] = trim($_SESSION['usuario']);
        $data = $this->model->insertSeguimientoBcp($datasend);
        echo json_encode($data);
    }
    public function Reporte()
    {
        $this->views->getView($this, "Reporte", "", "");
    }
    public function CargarReporte()
    {
        $reporte = htmlspecialchars($_GET['reporte']);
        $fecha_ini = htmlspecialchars($_GET['fecha_ini']);
        $fecha_fin = htmlspecialchars($_GET['fecha_fin']);

        echo json_encode($this->model->SannaApi('post', 'getreporteseguimiento', array(
            'reporte' => $reporte,
            'fecha_ini' => $fecha_ini,
            'fecha_fin' => $fecha_fin
        ) ));
    }
    public function Detalle()
    {
        $this->views->getView($this, "Detalle", "", "");
    }
    public function getDetalleSeguimiento()
    {
        $id_seg_covid = htmlspecialchars($_GET['id_seg_covid']);
        echo json_encode($this->model->SannaApi('post', 'getdetalleseguimiento', array(
            'id_seg_covid' => $id_seg_covid
        ) ));
    }
    public function getSubDetalleSeguimiento()
    {
        $id_seg_covid = htmlspecialchars($_GET['id_seg_covid']);
        $cod_paciente = htmlspecialchars($_GET['cod_paciente']);
        $nro_seguimiento = htmlspecialchars($_GET['nro_seguimiento']);
        echo json_encode($this->model->SannaApi('post', 'getsubdetalleseguimiento', array(
            'id_seg_covid' => $id_seg_covid,
            'nro_seguimiento' => $nro_seguimiento,
            'cod_paciente' => $cod_paciente
        ) ));
    }

    public function getClasificaciones(){
        echo json_encode($this->model->SannaApi('post', 'clasificacionpacientecodigos', array(
            'codigos' => [50,51,52,53,22,12,24,99]
        ) ));
    } 
    public function getTiposSeguimiento(){
        echo json_encode($this->model->SannaApi('get', 'gettiposseguimiento', array()));
    }
    public function getTiposSeguimientoRegistro(){
        echo json_encode($this->model->SannaApi('post', 'gettiposseguimientoregistro', array( 'tipo_servicio' => htmlspecialchars($_GET['tipo_servicio']))));
    }
    public function listarSeguimientoObservaciones()
    {
        $data = array('tipo_servicio' => htmlspecialchars($_GET["tipo_servicio"]), 'codigo' => htmlspecialchars($_GET["codigo"]));
        echo json_encode($this->model->SannaApi('post', 'getlistarseguimiento', $data ));
    }
    public function grabarObservaciones(){
        $dataobservacion = htmlspecialchars($_POST['dataobservacion']);
        if($dataobservacion){
            $dataobservacion['usuario'] = $_SESSION['usuario'];
            echo json_encode($this->model->SannaApi('post', 'insertseguimientoobservaciones', $dataobservacion ));
        }        
        die();
    }
    public function buscarhistorial()
    {
        $data = array();
        if( htmlspecialchars($_GET["tipo"]) == 2 ){
            $data = array('nombres' => htmlspecialchars($_GET["nombres"]));
        }
        else{
            $data = array('nro_documento' => htmlspecialchars($_GET["nro_documento"] ));
        }        
        echo json_encode($this->model->SannaApi('post', 'getlistarhistorial', $data ));
    }

    
    





    public function Siteds()
    {
        $this->views->getView($this, "Siteds", "", "");
    }
    public function ListarS()
    {
        $this->views->getView($this, "ListarS", "", "");
    }
    public function ListarSiteds()
    {
        $data = $this->model->getClasificacionesFiltro([50,51,52,53,22,12,24,99]);
        $this->views->getView($this, "ListarSiteds", $data, "");
    }
    public function BuscarAtenciones()
    {
        $dataFilterGrid = $_GET;
        echo json_encode($this->model->SannaApi('post', 'seguimientoatenciones', array(
                        'page' => (intval(htmlspecialchars($dataFilterGrid['start']))>0?intval(htmlspecialchars($dataFilterGrid['start'])):1), 
                        'records' => intval(htmlspecialchars($dataFilterGrid['length'])), 
                        'order' => $dataFilterGrid['columns'][$dataFilterGrid['order'][0]['column']]['data'],
                        'fecha_inicio' => date("Y-m-d", strtotime(htmlspecialchars($dataFilterGrid['fecha_inicio'])) ), 
                        'fecha_fin' => date("Y-m-d", strtotime(htmlspecialchars($dataFilterGrid['fecha_fin'])) )
                        )
                    )
            );

        // $data = $this->model->getSeguimientoAtenciones( (intval($dataFilterGrid['start'])>0?intval($dataFilterGrid['start']):1) , 
        //         intval($dataFilterGrid['length']), 
        //         $dataFilterGrid['columns'][$dataFilterGrid['order'][0]['column']]['data'],
        //         date("Y-m-d", strtotime($dataFilterGrid['fecha_inicio']) ), 
        //         date("Y-m-d", strtotime($dataFilterGrid['fecha_fin']) )
        //     );
        // echo json_encode($data->data);
    }

    public function BuscarPacientePorCodAtencion()
    {
        $cod_atencion = htmlspecialchars($_GET['cod_atencion']);
        $data = $this->model->getPacientePorCodAtencion($cod_atencion);
        if($data){
            $tz  = new DateTimeZone('America/Lima');
            $edad = date_diff(new DateTime($data->data->fecha_nacimiento), new DateTime('now', $tz));
            $data->data->edad = $edad;
        }
        echo json_encode($data);
    }
    public function BuscarPacientePorDniNombres()
    {
        $nro_documento = htmlspecialchars($_GET['nro_documento']);
        $data = $this->model->getPacienteDniNombres($nro_documento,'', '');
        echo json_encode($data);
    }

    public function BuscarPacienteDirecciones(){
        $nro_documento = htmlspecialchars($_GET['cod_tit']);
        $data = $this->model->getPacienteDirecciones($nro_documento,'', '');
        echo json_encode($data);
    }


    public function TemplateEpidemiologia()
    {
        $idsegcovid = htmlspecialchars($_GET['id_seg_covid']);
        $data = $this->model->SannaApi('post', 'getdocumentepidemiologia', array('id_seg_covid'=> $idsegcovid, 'nom_usuario'=>trim($_SESSION['usuario'])) );

        $tz  = new DateTimeZone('America/Lima');
        $fecha_inicio = date_add(new DateTime('now', $tz), date_interval_create_from_date_string("1 day"));
        $fecha_emision = new DateTime('now', $tz);
        $data->fecha_inicio = date_format($fecha_inicio,"d/m/Y");
        $data->fecha_emision = date_format($fecha_emision,"d/m/Y");
        //$data->firma = $resp[0]['firma_usuario'];
        // $data->firma = $resp->firma_usuario;

        $this->views->getView($this, "TemplateEpidemiologia", $data);
    }
    public function TemplateEpidemiologiaCovid()
    {
        $idsegcovid = htmlspecialchars($_GET['id_seg_covid']);
        $tipo_ingreso = htmlspecialchars($_GET['tipo_ingreso']);
        
        //$idsegcovid = 2590270;

        $data = $this->model->SannaApi('post', 'getdocumentepidemiologia', array('id_seg_covid'=> $idsegcovid, 'nom_usuario'=>trim($_SESSION['usuario']), 'tipo'=> 1) );

        // $con = new ConnectionSql();
        // $resp = $con->ejecutarconsultaapi(array(
        //     "metodo" => "firmausuario",
        //     "usuario_sm" => $data->data[1]->cod_doc
        // ));

        $tz  = new DateTimeZone('America/Lima');
        $fecha_inicio = date_add(new DateTime('now', $tz), date_interval_create_from_date_string("1 day"));
        $fecha_emision = new DateTime('now', $tz);
        $data->fecha_inicio = date_format($fecha_inicio,"d/m/Y");
        $data->fecha_emision = date_format($fecha_emision,"d/m/Y");
        //$data->firma = $resp[0]['firma_usuario'];
        //$data->firma = $resp->firma_usuario;
        $data->idsegcovid = $idsegcovid;
        $data->modelo = ($tipo_ingreso=='SEG COVID ASOCIADO'?'modelo1':'modelo2');

        $this->views->getView($this, "TemplateEpidemiologiaCovid", $data);
    }

    public function DescansoMedico(){
        $this->views->getView($this, "DescansoMedico", "", "");        
    }
    public function getDescansoMedico()
    {
        $idsegcovid = htmlspecialchars($_GET['id_seg_covid']);
        echo json_encode($this->model->SannaApi('post', 'getdescansomedico', array('id_seg_covid'=> $idsegcovid ) ));
        
    }
    public function saveDescansoMedico()
    {
        $arraysend = $_POST['datadescanso'];

        $arraysend['id_seg_covid'] = htmlspecialchars($arraysend['id_seg_covid']);
        $arraysend['secuencia'] = htmlspecialchars($arraysend['secuencia']);
        $arraysend['fechaini'] = htmlspecialchars($arraysend['fechaini']);
        $arraysend['fechafin'] = htmlspecialchars($arraysend['fechafin']);

        $arraysend['usuario'] = trim($_SESSION['usuario']);
        echo json_encode($this->model->SannaApi('post', 'createdescanso', $arraysend ));        
    }
    public function TemplateDescansoMedico()
    {
        $idsegcovid = htmlspecialchars($_GET['id_seg_covid']);
        $secuencia = htmlspecialchars($_GET['secuencia']);
        $data = $this->model->SannaApi('post', 'getdocumentdescansomedico', array('id_seg_covid'=> $idsegcovid, 'secuencia'=>$secuencia ) );

        // $con = new ConnectionSql();
        // // $resp = $con->ejecutarconsulta("select usu_f.firma_usuario, usu.nombre, cmp_medico from usuario_firma  usu_f inner join usuario usu on usu.id_firma = usu_f.id_firma where usu.usuario_sm='".$data->data[0]->cod_doc."'");
        // $resp = $con->ejecutarconsultaapi(array(
        //     "metodo" => "firmausuario",
        //     "usuario_sm" => $data->data[0]->cod_doc
        // ));

        $tz  = new DateTimeZone('America/Lima');
        $fecha_inicio = date_add(new DateTime('now', $tz), date_interval_create_from_date_string("1 day"));
        $fecha_emision = new DateTime('now', $tz);
        $data->fecha_inicio = date_format($fecha_inicio,"d/m/Y");
        $data->fecha_emision = date_format($fecha_emision,"d/m/Y");
        // $data->firma = base64_encode( $resp[0]['firma_usuario'] );
        // $data->nombre_medico = $resp[0]['nombre'];
        // $data->cmp = $resp[0]['cmp_medico'];
        // $data->firma = $resp->firma_usuario;
        // $data->nombre_medico = $resp->nombre;
        // $data->cmp = $resp->cmp_medico;
        $data->empresa = 'BCP';
        $data->idsegcovid = $idsegcovid;

        $this->views->getView($this, "TemplateDescansoMedico", $data);
    }
    public function TemplateDescansoMedicoCovid()
    {
        $idsegcovid = htmlspecialchars($_GET['id_seg_covid']);
        $secuencia = htmlspecialchars($_GET['secuencia']);
        // $idsegcovid = 3622922;
        // $secuencia = 1;
        $data = $this->model->SannaApi('post', 'getdocumentdescansomedico', array('id_seg_covid'=> $idsegcovid, 'secuencia'=>$secuencia, 'tipo'=> 1 ) );

        // $con = new ConnectionSql();
        // // $resp = $con->ejecutarconsulta("select usu_f.firma_usuario, usu.nombre, cmp_medico from usuario_firma  usu_f inner join usuario usu on usu.id_firma = usu_f.id_firma where usu.usuario_sm='".$data->data[0]->cod_doc."'");
        // $resp = $con->ejecutarconsultaapi(array(
        //     "metodo" => "firmausuario",
        //     "usuario_sm" => $data->data[0]->cod_doc
        // ));
        $tz  = new DateTimeZone('America/Lima');
        $fecha_inicio = date_add(new DateTime('now', $tz), date_interval_create_from_date_string("1 day"));
        $fecha_emision = new DateTime('now', $tz);
        $data->fecha_inicio = date_format($fecha_inicio,"d/m/Y");
        $data->fecha_emision = date_format($fecha_emision,"d/m/Y");
        // $data->firma = base64_encode( $resp[0]['firma_usuario'] );
        // $data->nombre_medico = $resp[0]['nombre'];
        // $data->cmp = $resp[0]['cmp_medico'];
        // $data->firma = $resp->firma_usuario;
        // $data->nombre_medico = $resp->nombre;
        // $data->cmp = $resp->cmp_medico;
        $data->empresa = 'BCP';
        $data->idsegcovid = $idsegcovid;

        $this->views->getView($this, "TemplateDescansoMedicoCovid", $data);
    }

    public function TemplateRecetaCovid()
    {
        $idsegcovid = htmlspecialchars($_GET['id_seg_covid']);
        $secuencia = htmlspecialchars($_GET['secuencia']);
        // $idsegcovid = 3622922;
        // $secuencia = 1;
        $data = $this->model->SannaApi('post', 'getdocumentreceta', array('id_seg_covid'=> $idsegcovid, 'secuencia'=>$secuencia, 'nom_usuario'=> trim($_SESSION['usuario']) ) );

        $tz  = new DateTimeZone('America/Lima');
        $fecha_inicio = date_add(new DateTime('now', $tz), date_interval_create_from_date_string("1 day"));
        $fecha_emision = new DateTime('now', $tz);
        $data->fecha_inicio = date_format($fecha_inicio,"d/m/Y");
        $data->fecha_emision = date_format($fecha_emision,"d/m/Y");
        // $data->firma = base64_encode( $resp[0]['firma_usuario'] );
        // $data->nombre_medico = $resp[0]['nombre'];
        // $data->cmp = $resp[0]['cmp_medico'];
        // $data->firma = $resp->firma_usuario;
        // $data->nombre_medico = $resp->nombre;
        // $data->cmp = $resp->cmp_medico;
        $data->idsegcovid = $idsegcovid;

        $this->views->getView($this, "TemplateRecetaCovid", $data);
    }
}
