<?php
require_once("Models/EmpresasModel.php");
require_once("Models/BeneficiosModel.php");

class Productos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    /************ INICIO SECCION PRODUCTOS ****************/
        public function Listar()
        {
            /* Catálogos permitidos */
            $array_estado = array( "0", "1", "2" );
            /* Catálogos permitidos */

            $estado = 0; $fecha_inicio = ''; $fecha_fin = '';
            if(isset($_POST["fecha_inicio"])){ $fecha_inicio = htmlspecialchars($_POST['fecha_inicio']); }
            if(isset($_POST["fecha_fin"])){ $fecha_fin = htmlspecialchars($_POST['fecha_fin']); }
            if(isset($_POST["estado"])){
                $estado = intval(htmlspecialchars($_POST["estado"]));
            }

            if (!in_array( $estado, $array_estado)) { $estado = -1; }

            set_time_limit(0);
            $data = $this->model->getProductos($estado, $fecha_inicio, $fecha_fin, 0);
            // $data = array(
            //     'fecha_inicio' => $fecha_inicio,
            //     'fecha_fin' => $fecha_fin
            // );
            $this->views->getView($this, "Listar", $data, "");
            //$data = intval($_POST["estado"]);
            //$this->views->getView($this, "Listar", $data, "");
        }
        public function Insertar()
        {
            $nombre = htmlspecialchars($_POST['nombre']);
            $descripcion = htmlspecialchars($_POST['descripcion']);
            $listEmpty = parent::emptyFields($_POST);
            if(count($listEmpty))
                header("location: " . base_url() . "Productos/Listar?msg=$listEmpty");
            else{
                $data = $this->model->insertarProducto($nombre, $descripcion);
                if ( isset($data) && isset($data->success) ) {
                    $alert = $data->message;
                }
                header("location: " . base_url() . "Productos/Listar?msg=$alert");
            }
            die();
        }
        public function Eliminar()
        {
            $id = intval(htmlspecialchars($_GET['id']));
            $data = $this->model->eliminarProducto($id);
            if ( isset($data) && isset($data->success) ) {
                $alert = $data->message;
            }
            header("location: " . base_url() . "Productos/Listar?msg=$alert");     
            die();
        }

        public function Editar()
        {
            $id = htmlspecialchars($_GET['id']);
            $data = $this->model->editarProducto($id);
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
            $listEmpty = parent::emptyFields($_POST);
            if(count($listEmpty))
                header("location: " . base_url() . "Productos/Listar?msg=$listEmpty");
            else{
                $data = $this->model->actualizarProductos(intval($id), $nombre, $descripcion);
                if ( isset($data) && isset($data->success) ) {
                    $alert = $data->message;
                }
                header("location: " . base_url() . "Productos/Listar?msg=$alert");
            }
            die();
        }
    /************ FIN SECCION PRODUCTOS ****************/

    /************ INICIO SECCION DETALLE ****************/
        public function Detalle()
        {
            $empresas = new EmpresasModel();
            $listEmpresas = $empresas->getEmpresas();

            $id = htmlspecialchars($_GET['id']);
            $data = $this->model->editarProducto($id);
            if ( isset($data) && $data->success == false ) {
                $this->Listar();
            }else{
                foreach ($data->data->items as $key => $item) {
                    foreach ($listEmpresas as $llave => $valor) {
                        if($valor->cod_gru == $item->id_empresa){
                                $item->empresa = $valor->nom_gru;
                        }
                    }
                //     // $ids = array_filter($listEmpresas, function($item) { return $item->id_cso_empresa == $item['id_empresa']; });
                //     // $data->data->items[$key]->empresa = $ids[0]->descp_empresa;
                }
                $_GET['listEmpresas'] = $listEmpresas;
                $this->views->getView($this, "Detalle", $data);
            }
        }
    
        public function ActualizaDetalle()
        {
            if(isset($_POST['id']) && intval($_POST['id'])>0 )
                $id = htmlspecialchars($_POST['id']);

            $id_prodcap_cabecera = htmlspecialchars($_POST['id_prodcap_cabecera']);
            $id_empresa = htmlspecialchars($_POST['id_empresa']);
            $fecha_inicio = htmlspecialchars($_POST['fecha_inicio']);
            $fecha_fin = htmlspecialchars($_POST['fecha_fin']);
            $tiempo_permanencia = htmlspecialchars($_POST['tiempo_permanencia']);
            $edad_desde = htmlspecialchars($_POST['edad_desde']);
            $edad_hasta = htmlspecialchars($_POST['edad_hasta']);
            $limite_credito = htmlspecialchars($_POST['limite_credito']);
            $tarifa_total = htmlspecialchars($_POST['tarifa_total']);
            $atenciones_para = '';
            if ( isset($_POST['atenciones_para']) ){
                $atenciones_para = join(",", htmlspecialchars($_POST['atenciones_para']));
            }
            $tiene_contrato = htmlspecialchars($_POST['tiene_contrato']);
            //$listEmpty = parent::emptyFields($_POST);
            $listEmpty = parent::emptyFields(array(
                'Empresa' => $id_empresa,
                'Fecha Inicio' => $fecha_inicio,
                'Fecha Fin' => $fecha_fin,
                'Permanencia'=> $tiempo_permanencia,
                'Edad desde' => $edad_desde,
                'Edad hasta' => $edad_hasta,
                'Línea crédito' => $limite_credito,
                'Tarifa total' => $tarifa_total,
                )
            );
            if(count($listEmpty))
                header("location: " . base_url() . "Productos/Detalle?id=$id_prodcap_cabecera&msg=".json_encode($listEmpty));
            else{
                if($id>0)
                    $data = $this->model->actualizaDetalle(intval($id), intval($id_prodcap_cabecera), $id_empresa, $fecha_inicio, 
                        $fecha_fin, intval($tiempo_permanencia), intval($edad_desde), intval($edad_hasta), $limite_credito, $atenciones_para, boolval($tiene_contrato), $tarifa_total);
                else
                    $data = $this->model->insertarDetalle(intval($id_prodcap_cabecera), $id_empresa, $fecha_inicio, 
                        $fecha_fin, intval($tiempo_permanencia), intval($edad_desde), intval($edad_hasta), $limite_credito, $atenciones_para, boolval($tiene_contrato), $tarifa_total);
                if ( isset($data) && isset($data->success) ) {
                    $alert = $data->message;
                }
                header("location: " . base_url() . "Productos/Detalle?id=$id_prodcap_cabecera&msg=".$alert);
            }
            die();
        }
    /************ FIN SECCION DETALLE ****************/
    
    /************ INICIO SECCION DETALLE BENEFICIOS ****************/
        public function Beneficios()
        {
            $beneficio = new BeneficiosModel();
            $listBeneficios = $beneficio->getBeneficios();
            $id = htmlspecialchars($_GET['id']);
            $data = $this->model->editarBeneficio($id);

            //header("location: " . base_url() . "Productos/Beneficios?id=20&data=".json_encode($data));
            if ( isset($data) && $data->success == false ) {
                $this->Listar();
            }else{
                $_GET['listBeneficios'] = $listBeneficios;
                $this->views->getView($this, "Beneficios", $data);
            }
        }   
        public function BeneficiosInactivar()
        {
            $id = intval(htmlspecialchars($_GET['id']));
            $id_detalle = intval(htmlspecialchars($_GET['id_detalle']));
            $id_prodcap_cabecera = htmlspecialchars($_GET["id_prodcap_cabecera"]);
            $data = $this->model->inactivarBeneficio($id);
            if ( isset($data) && isset($data->success) ) {
                $alert = $data->message;
            }
            header("location: " . base_url() . "Productos/Beneficios?id=$id_detalle&producto=".htmlspecialchars($_POST['producto'])."&empresa=".htmlspecialchars($_POST['empresa'])."&id_prodcap_cabecera=$id_prodcap_cabecera&msg=$alert");     
            die();
        }
        public function BeneficiosEliminar()
        {
            $id = intval(htmlspecialchars($_GET['id']));
            $id_detalle = intval(htmlspecialchars($_GET['id_detalle']));
            $id_prodcap_cabecera = htmlspecialchars($_GET["id_prodcap_cabecera"]);
            $data = $this->model->eliminarBeneficio($id);
            if ( isset($data) && isset($data->success) ) {
                $alert = $data->message;
            }
            header("location: " . base_url() . "Productos/Beneficios?id=$id_detalle&producto=".htmlspecialchars($_POST['producto'])."&empresa=".htmlspecialchars($_POST['empresa'])."&id_prodcap_cabecera=$id_prodcap_cabecera&msg=$alert");     
            die();
        }
        public function BeneficioInserta()
        {
            $id =htmlspecialchars($_POST['id']);
            $id_detalle = intval(htmlspecialchars($_POST['id_prodcap_detalle']));
            $id_prodcap_cabecera = htmlspecialchars($_POST["id_prodcap_cabecera"]);

            $id_beneficio = htmlspecialchars($_POST['id_beneficio']);
            $nro_veces = htmlspecialchars($_POST['nro_veces']);
            $copago = htmlspecialchars($_POST['copago']);
            $aplica_delivery = htmlspecialchars($_POST['aplica_delivery'])=="1"?true:false;
            $aplica_laboratorio = htmlspecialchars($_POST['aplica_laboratorio'])=="1"?true:false;

            if ($id > 0){
                $data = $this->model->actualizarBeneficio($id, $id_detalle, $id_beneficio, $nro_veces, $copago, $aplica_delivery, $aplica_laboratorio);
            }
            else{
                $data = $this->model->insertarBeneficio($id_detalle, $id_beneficio, $nro_veces, $copago, $aplica_delivery, $aplica_laboratorio);
            }
            if ( isset($data) && isset($data->success) ) {
                $alert = json_encode(array(
                    empty($data->message)?'Actualizado correctamente':$data->message
                ));
            }
            header("location: " . base_url() . "Productos/Beneficios?id=$id_detalle&producto=".htmlspecialchars($_POST['producto'])."&empresa=".htmlspecialchars($_POST['empresa'])."&id_prodcap_cabecera=$id_prodcap_cabecera&msg=$alert");
            die();
            
        }
    /************ FIN SECCION DETALLE BENEFICIOS ****************/

    /************ INICIO SECCION DETALLE EMPLEADOS ****************/
    public function Empleados()
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->model->editarEmpleado($id);
        // header("location: " . base_url() . "Productos/Empleados?id=$id&data=".json_encode($data));
        if ( isset($data) && $data->success == false ) {
            $this->Listar();
        }else{
            $this->views->getView($this, "Empleados", $data);
        }
    }   
    public function EmpleadoEliminar()
    {
        $id = intval(htmlspecialchars($_GET['id']));
        $id_detalle = intval(htmlspecialchars($_GET['id_detalle']));
        $id_prodcap_cabecera = htmlspecialchars($_GET["id_prodcap_cabecera"]);
        $data = $this->model->eliminarEmpleado($id);
        if ( isset($data) && isset($data->success) ) {
            $alert = $data->message;
        }
        header("location: " . base_url() . "Productos/Empleados?id=$id_detalle&id_prodcap_cabecera=$id_prodcap_cabecera&msg=$alert");
        die();
    }
    public function EmpleadoCargar()
    {
        set_time_limit(0);
        $data = json_decode(htmlspecialchars($_POST['json_data']));
        $id_detalle = intval(htmlspecialchars($_POST['id_prodcap_detalle']));
        $id_prodcap_cabecera = htmlspecialchars($_POST["id_prodcap_cabecera"]);
        $producto = htmlspecialchars($_POST["producto"]);
        $empresa = htmlspecialchars($_POST["empresa"]);

        $arraymensajes = array();
        foreach ($data as $key => $item) {
            $response = $this->model->insertarEmpleado($id_detalle, $item->id_tipo_documento, $item->numero_documento, $item->nombres, $item->apellidos, $item->genero, 
            $item->fecha_nacimiento, $item->correo, $item->telefono, $item->ubigeo, $item->direccion);
            // header("location: " . base_url() . "Productos/Empleados?id=$id_detalle&id_prodcap_cabecera=$id_prodcap_cabecera&msg=json_encode($response)");
            // return;
            if ( isset($response) && isset($response->success) && !empty($response->message)) {
                $arraymensajes[] = $response->message;
            }    
        }
        if ( count($arraymensajes) > 0 ) {
            $alert = json_encode($arraymensajes);
        }
        header("location: " . base_url() . "Productos/Empleados?id=$id_detalle&id_prodcap_cabecera=$id_prodcap_cabecera&msg=$alert&producto=$producto&empresa=$empresa");
        die();
    }
    
/************ FIN SECCION DETALLE EMPLEADOS ****************/
}
