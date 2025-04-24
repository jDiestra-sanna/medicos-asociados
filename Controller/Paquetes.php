<?php

require_once "Models/ConnectionApi.php";

class Paquetes extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /* SECCION DE PAQUETES */
    public function ListarPaquetes()
    {            
        $this->views->getView($this, "ListarPaquetes");
    }
    public function Buscar(){
        /* Catálogos permitidos */
        $array_estado = array( "0", "1" );
        /* Catálogos permitidos */

        $estado = 0; $fecha = '';
        if(isset($_GET["paquete_fecha"])){ $fecha = htmlspecialchars($_GET['paquete_fecha']); }
        if(isset($_GET["paquete_nombre"])){ $nombre = htmlspecialchars($_GET['paquete_nombre']); }
        if(isset($_GET["paquete_estado"])){
            $estado = intval(htmlspecialchars($_GET["paquete_estado"]));
        }
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'paquetes/listado', array( 'created_at'=> $fecha, 'estado' => $estado, 'nombre' => $nombre, 'records'=> $records, 'page' => intval($page) ) )
        );
    }
    public function Crear()
    {
        $nombre = htmlspecialchars($_POST['paquete_nombre']);
        $descripcion = htmlspecialchars($_POST['paquete_descripcion']);
        $precio_regular = htmlspecialchars($_POST['paquete_precio_regular']);
        $precio_rebajado = htmlspecialchars($_POST['paquete_precio_rebajado']);
        $id_categoria = htmlspecialchars($_POST['id_categoria']);

        $data = SannaApi('post', 'paquetes/paquete_insert', array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio_regular' => $precio_regular,
                'precio_rebajado' => $precio_rebajado,
                "id_categoria" => $id_categoria,
                'activo' => 1
            ));
        echo json_encode($data);
    }
    public function DeletePaquete()
    {
        $id = htmlspecialchars($_POST['id']);

        $data = SannaApi('post', 'paquete/delete', array(
                'id' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE PAQUETES */

    /* SECCION DE SERVICIOS */
    public function ListarServicios()
    {            
        $this->views->getView($this, "ListarServicios");
    }
    public function BuscarServicios(){
        /* Catálogos permitidos */
        $array_estado = array( "0", "1" );
        /* Catálogos permitidos */

        $estado = 0; $fecha = '';
        if(isset($_GET["servicio_fecha"])){ $fecha = htmlspecialchars($_GET['servicio_fecha']); }
        if(isset($_GET["servicio_nombre"])){ $nombre = htmlspecialchars($_GET['servicio_nombre']); }
        if(isset($_GET["servicio_estado"])){
            $estado = intval(htmlspecialchars($_GET["servicio_estado"]));
        }
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'servicios/listado', array( 'created_at'=> $fecha, 'estado' => $estado, 'nombre' => $nombre, 'records'=> $records, 'page' => $page ) )
        );
    }
    public function CrearServicio()
    {
        $nombre = htmlspecialchars($_POST['servicio_nombre']);
        $descripcion = htmlspecialchars($_POST['servicio_descripcion']);
        $precio_regular = htmlspecialchars($_POST['servicio_precio_regular']);
        $precio_rebajado = htmlspecialchars($_POST['servicio_precio_rebajado']);

        $data = SannaApi('post', 'servicios/servicio_insert', array(
                'nombre' => $nombre,
                'descripcion' => (strlen($descripcion)>0?$descripcion:''),
                'precio_regular' => (strlen($precio_regular)>0?$precio_regular:0),
                'precio_rebajado' => (strlen($precio_rebajado)>0?$precio_rebajado:0),
                'activo' => 1
            ));
        echo json_encode($data);
    }
    public function DeleteServicio()
    {
        $id = htmlspecialchars($_POST['id']);

        $data = SannaApi('post', 'servicio/delete', array(
                'id' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE SERVICIOS */

    /* SECCION DE ATRIBUTOS */
    public function ListarAtributos()
    {            
        $this->views->getView($this, "ListarAtributos");
    }
    public function BuscarAtributos(){
        /* Catálogos permitidos */
        $array_estado = array( "0", "1" );
        /* Catálogos permitidos */

        $estado = 0;$tipo = 0;
        if(isset($_GET["atrib_nombre"])){ $nombre = htmlspecialchars($_GET['atrib_nombre']); }
        if(isset($_GET["atrib_estado"])){
            $estado = intval(htmlspecialchars($_GET["atrib_estado"]));
        }
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'atributos/listado', array( 'estado' => $estado, 'nombre' => $nombre, 'records'=> $records, 'page' => $page ) )
        );
    }
    public function CrearAtributo()
    {
        $nombre = htmlspecialchars($_POST['atrib_nombre']);
        $descripcion = htmlspecialchars($_POST['atrib_descripcion']);
        $tarifa = htmlspecialchars($_POST['atrib_tarifa']);
        $formula_key = ($_POST['atrib_formula_key']);
        $formula_condition = ($_POST['atrib_formula_condition']);
        $formula_value = ($_POST['atrib_formula_value']);

        $data = SannaApi('post', 'atributos/atributo_insert', array(
                'nombre' => $nombre,
                'descripcion' => (strlen($descripcion)>0?$descripcion:''),
                'formula_key' => $formula_key,
                'formula_value' => $formula_value,
                'formula_condition' => $formula_condition,
                'tarifa' => $tarifa,
                'activo' => 1
            ));
        echo json_encode($data);
    }
    public function DeleteAtributo()
    {
        $id = htmlspecialchars($_POST['id']);

        $data = SannaApi('post', 'atributo/delete', array(
                'id' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE ATRIBUTOS */

    /* SECCION DE ATRIBUTOS ASIGNADOS */
    public function BuscarAtributosAsignados(){
        /* Catálogos permitidos */
        $array_tipo = array( "0", "1", "2", "0,1", "0,2" );
        /* Catálogos permitidos */

        $id_entidad = 0;$tipo = 0;
        if(isset($_GET["tipo"])){ $tipo = htmlspecialchars($_GET['tipo']); }
        if(isset($_GET["id"])){ $id_entidad = intval(htmlspecialchars($_GET["id"])); }
        if (!in_array( $tipo, $array_tipo)) { $tipo = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'atributos/listado_asignado', array( 'tipo' => $tipo, 'id_entidad' => $id_entidad, 'records'=> $records, 'page' => $page ) )
        );
    }
    public function AsignarAtributo()
    {
        $atributos = (isset($_POST['atributos'])? $_POST['atributos']:[]);
        $id_entidad = $_POST['id_entidad'];
        $tipo = $_POST['tipo'];

        $data = SannaApi('post', 'atributos/asignado_insert', array('id_entidad'=>$id_entidad, 'tipo'=>$tipo, 'atributos'=>$atributos));
        echo json_encode($data);
    }
    /* SECCION DE ATRIBUTOS ASIGNADOS */

    /* SECCION DE FORMAS DE PAGO */
    public function ListarFormasPago()
    {            
        $this->views->getView($this, "ListarFormasPago");
    }
    public function BuscarFormasPago(){
        /* Catálogos permitidos */
        $array_estado = array( "0", "1" );
        /* Catálogos permitidos */

        $estado = 0;$tipo = 0;
        if(isset($_GET["formapago_nombre"])){ $nombre = htmlspecialchars($_GET['formapago_nombre']); }
        if(isset($_GET["formapago_estado"])){
            $estado = intval(htmlspecialchars($_GET["formapago_estado"]));
        }
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'formaspago/listado', array( 'estado' => $estado, 'nombre' => $nombre, 'records'=> $records, 'page' => $page ) )
        );
    }
    public function CrearFormaPago()
    {
        $nombre = htmlspecialchars($_POST['formapago_nombre']);
        $descripcion = htmlspecialchars($_POST['formapago_descripcion']);
        $descuento = htmlspecialchars($_POST['formapago_descuento']);
        $cuotas = ($_POST['formapago_cuotas']);

        $data = SannaApi('post', 'formaspago/formaspago_insert', array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'descuento' => $descuento,
                'cuotas' => $cuotas,
                'activo' => 1
            ));
        echo json_encode($data);
    }
    public function DeleteFormaPago()
    {
        $id = htmlspecialchars($_POST['id']);

        $data = SannaApi('post', 'formapago/delete', array(
                'id' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE FORMAS DE PAGO */

    
    /* SECCION DE CATEGORIAS */
    public function ListarCategoria()
    {            
        $this->views->getView($this, "ListarCategorias");
    }
    public function BuscarCategoria(){
        /* Catálogos permitidos */
        $array_estado = array( "0", "1" );
        /* Catálogos permitidos */

        $estado = 0;$tipo = 0; $nombre = '';
        if(isset($_GET["categoria_nombre"])){ $nombre = htmlspecialchars($_GET['categoria_nombre']); }
        if(isset($_GET["categoria_activo"])){
            $estado = intval(htmlspecialchars($_GET["categoria_activo"]));
        }
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'paquetes/listado_categorias', array( 'activo' => $estado, 'nombre' => $nombre, 'records'=> isset($records)?$records:9999, 'page' => isset($page)?$page:0 ) )
        );
    }
    public function CrearCategoria()
    {
        $nombre = htmlspecialchars($_POST['categoria_nombre']);
        $descripcion = htmlspecialchars($_POST['categoria_descripcion']);
        $url_imagen = htmlspecialchars($_POST['categoria_url_imagen']);

        $data = SannaApi('post', 'categoria/categoria_insert', array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'url_imagen' => $url_imagen,
                'activo' => 1
            ));
        echo json_encode($data);
    }
    public function DeleteCategoria()
    {
        $id = htmlspecialchars($_POST['id']);

        $data = SannaApi('post', 'categoria/delete', array(
                'id' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE CATEGORIAS */

    
    /* SECCION DE SOLICITUDES */
    public function ListarSolicitudes()
    {            
        $this->views->getView($this, "ListarSolicitudes");
    }
    public function BuscarSolicitud(){
        /* Catálogos permitidos */
        $array_estado = array( "1", "2" );
        $array_tipodoc = array( "dni", "carnet", "pasaporte" );
        /* Catálogos permitidos */

        $apellidos = htmlspecialchars($_GET['soli_apellidos']);
        $nombres = htmlspecialchars($_GET['soli_nombres']);
        $nrosolicitud = htmlspecialchars($_GET['soli_nrosolicitud']);
        $estado = htmlspecialchars($_GET['soli_estado']);
        $fechaini = htmlspecialchars($_GET['soli_fechaini']);
        $fechafin = htmlspecialchars($_GET['soli_fechafin']);
        $tipodoc = htmlspecialchars($_GET['soli_tipodoc']);
        $nrodocumento = htmlspecialchars($_GET['soli_nrodocumento']);
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }
        if (!in_array( $tipodoc, $array_tipodoc)) { $tipodoc = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'solicitud/listadoconsultasolicitudes', array( 'estado' => $estado, 'nombre' => $nombres, 'apellidos' => $apellidos, 'nrosolicitud' => $nrosolicitud, 'fechaini' => $fechaini, 'fechafin' => $fechafin, 'tipodoc' => $tipodoc, 'nrodocumento' => $nrodocumento, 'records'=> isset($records)?$records:9999, 'page' => isset($page)?$page:0 ) )
        );
    }
    public function BuscarSolicitudExporta(){
        /* Catálogos permitidos */
        $array_estado = array( "1", "2" );
        $array_tipodoc = array( "dni", "carnet", "pasaporte" );
        /* Catálogos permitidos */

        $apellidos = htmlspecialchars($_GET['soli_apellidos']);
        $nombres = htmlspecialchars($_GET['soli_nombres']);
        $nrosolicitud = htmlspecialchars($_GET['soli_nrosolicitud']);
        $estado = htmlspecialchars($_GET['soli_estado']);
        $fechaini = htmlspecialchars($_GET['soli_fechaini']);
        $fechafin = htmlspecialchars($_GET['soli_fechafin']);
        $tipodoc = htmlspecialchars($_GET['soli_tipodoc']);
        $nrodocumento = htmlspecialchars($_GET['soli_nrodocumento']);
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }
        if (!in_array( $tipodoc, $array_tipodoc)) { $tipodoc = -1; }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'solicitud/listadoconsultasolicitudesexporta', array( 'estado' => $estado, 'nombre' => $nombres, 'apellidos' => $apellidos, 'nrosolicitud' => $nrosolicitud, 'fechaini' => $fechaini, 'fechafin' => $fechafin, 'tipodoc' => $tipodoc, 'nrodocumento' => $nrodocumento ) )
        );
    }
    public function BuscarBeneficiarios(){
        /* Catálogos permitidos */
        $array_estado = array( "1", "2" );
        $array_tipodoc = array( "dni", "carnet", "pasaporte" );
        /* Catálogos permitidos */

        $apellidos = htmlspecialchars($_GET['soli_apellidos']);
        $nombres = htmlspecialchars($_GET['soli_nombres']);
        $nrosolicitud = htmlspecialchars($_GET['soli_nrosolicitud']);
        $estado = htmlspecialchars($_GET['soli_estado']);
        $fechaini = htmlspecialchars($_GET['soli_fechaini']);
        $fechafin = htmlspecialchars($_GET['soli_fechafin']);
        $tipodoc = htmlspecialchars($_GET['soli_tipodoc']);
        $nrodocumento = htmlspecialchars($_GET['soli_nrodocumento']);
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }
        if (!in_array( $tipodoc, $array_tipodoc)) { $tipodoc = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'solicitud/listadoconsulta', array( 'estado' => $estado, 'nombre' => $nombres, 'apellidos' => $apellidos, 'nrosolicitud' => $nrosolicitud, 'fechaini' => $fechaini, 'fechafin' => $fechafin, 'tipodoc' => $tipodoc, 'nrodocumento' => $nrodocumento, 'records'=> isset($records)?$records:9999, 'page' => isset($page)?$page:0 ) )
        );
    }
    public function BuscarBeneficiariosExporta(){
        /* Catálogos permitidos */
        $array_estado = array( "1", "2" );
        $array_tipodoc = array( "dni", "carnet", "pasaporte" );
        /* Catálogos permitidos */

        $apellidos = htmlspecialchars($_GET['soli_apellidos']);
        $nombres = htmlspecialchars($_GET['soli_nombres']);
        $nrosolicitud = htmlspecialchars($_GET['soli_nrosolicitud']);
        $estado = htmlspecialchars($_GET['soli_estado']);
        $fechaini = htmlspecialchars($_GET['soli_fechaini']);
        $fechafin = htmlspecialchars($_GET['soli_fechafin']);
        $tipodoc = htmlspecialchars($_GET['soli_tipodoc']);
        $nrodocumento = htmlspecialchars($_GET['soli_nrodocumento']);
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }
        if (!in_array( $tipodoc, $array_tipodoc)) { $tipodoc = -1; }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'solicitud/listadoconsultaexporta', array( 'estado' => $estado, 'nombre' => $nombres, 'apellidos' => $apellidos, 'nrosolicitud' => $nrosolicitud, 'fechaini' => $fechaini, 'fechafin' => $fechafin, 'tipodoc' => $tipodoc, 'nrodocumento' => $nrodocumento ) )
        );
    }
    public function DeleteSolicitud()
    {
        $id = htmlspecialchars($_POST['id']);

        $data = SannaApi('post', 'solicitud/delete', array(
                'id_solicitud' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE SOLICITUDES */
    
    /* SECCION DE SERVICIOS ASIGNADOS A PAQUETES */
    public function BuscarServiciosAsignados(){
        $id_paquete = 0;
        if(isset($_GET["id"])){ $id_paquete = intval(htmlspecialchars($_GET["id"])); }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'paquetes/listado_servicios', array( 'id_paquete' => $id_paquete, 'records'=> $records, 'page' => $page ) )
        );
    }
    public function AsignarServicio()
    {
        $servicios = (isset($_POST['servicios'])? $_POST['servicios']:[]);
        $id_paquete = $_POST['id_paquete'];

        $data = SannaApi('post', 'paquetes/servicio_insert', array('id_paquete'=>$id_paquete, 'servicios'=>$servicios));
        echo json_encode($data);
    }
    /* SECCION DE SERVICIOS ASIGNADOS A PAQUETES */


    /* SECCION DE MENSAJES */
    public function ListarMensajes()
    {            
        $this->views->getView($this, "ListarMensajes");
    }
    public function BuscarMensajes(){
        /* Catálogos permitidos */
        $array_estado = array( "0", "1" );
        /* Catálogos permitidos */

        $estado = 0;
        if(isset($_GET["mensaje_estado"])){
            $estado = intval(htmlspecialchars($_GET["mensaje_estado"]));
        }
        
        if (!in_array( $estado, $array_estado)) { $estado = -1; }

        if(isset($_GET["length"])){ $records = htmlspecialchars($_GET['length']); }
        if(isset($_GET["draw"])){ $page = htmlspecialchars($_GET['draw']); }

        set_time_limit(0);

        echo json_encode(
                SannaApi('post', 'solicitud/listado_mensajes', array( 'estado' => $estado, 'records'=> isset($records)?$records:9999, 'page' => isset($page)?$page:0 ) )
        );
    }
    public function BorrarMensaje()
    {
        $id = htmlspecialchars($_POST['mensaje_id']);

        $data = SannaApi('post', 'solicitud/delete_message', array(
                'id' => $id
            ));
        echo json_encode($data);
    }
    /* SECCION DE MENSAJES */

}