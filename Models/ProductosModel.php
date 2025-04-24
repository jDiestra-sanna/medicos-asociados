<?php

require_once "Models/ConnectionApi.php";

class ProductosModel{
    public $id, $clave, $nombre, $usuario, $correo, $rol;

    public function getProductosAll()
    {
        try {
            return SannaApi('post', 'productoall', array());
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function getProductos(int $param, $fecha_inicio, $fecha_fin, $idProducto)
    {
        try {
            $arrayparam = array();
            switch($param) {
                case 0:
                    $arrayparam = array(
                        'fecha_inicio' => $fecha_inicio,
                        'fecha_fin' => $fecha_fin,
                        'idProducto' => $idProducto
                    );
                    break;
                case 1:
                    $arrayparam = array(
                        'activo'=> true,
                        'fecha_inicio' => $fecha_inicio,
                        'fecha_fin' => $fecha_fin,
                        'idProducto' => $idProducto
                    );
                    break;                
                case 2:
                    $arrayparam = array(
                        'activo'=> false,
                        'fecha_inicio' => $fecha_inicio,
                        'fecha_fin' => $fecha_fin,
                        'idProducto' => $idProducto
                    );
                    break;
            }
            return SannaApi('post', 'productofilter', $arrayparam);
        }
        catch(Exception $e) {
            return $e;
        }

    }
    public function insertarProducto(String $nombre, string $descripcion)
    {
        try {
            return SannaApi('post', 'producto', array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'activo' => true
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function editarProducto(int $id)
    {
        try {
            return SannaApi('get', 'producto/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function actualizarProductos(int $id, String $nombre, String $descripcion)
    {
        try {
            return SannaApi('put', 'producto', array(
                'id' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function eliminarProducto(int $id)
    {
        try {
            return SannaApi('delete', 'producto/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }





    public function insertarDetalle(int $id_prodcap_cabecera, $id_empresa, $fecha_inicio, $fecha_fin, int $tiempo_permanencia, int $edad_desde, int $edad_hasta, float $limite_credito, string $atenciones_para, bool $tiene_contrato, float $tarifa_total)
    {
        try {
            return SannaApi('post', 'productodetalle', array(
                'id_prodcap_cabecera' => $id_prodcap_cabecera,
                'id_empresa' => $id_empresa,
                'fecha_inicio' => date('d/m/Y', strtotime($fecha_inicio)),
                'fecha_fin' => date('d/m/Y', strtotime($fecha_fin)),
                'tiempo_permanencia' => $tiempo_permanencia,
                'tiene_contrato' => $tiene_contrato,
                'limite_credito' => $limite_credito,
                'tarifa_total' => $tarifa_total,
                'atenciones_para' => $atenciones_para,
                'edad_desde' => $edad_desde,
                'edad_hasta' => $edad_hasta,
                'activo' => true
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function actualizaDetalle(int $id, int $id_prodcap_cabecera, int $id_empresa, $fecha_inicio, $fecha_fin, int $tiempo_permanencia, int $edad_desde, int $edad_hasta, float $limite_credito, string $atenciones_para, bool $tiene_contrato, float $tarifa_total)
    {
        try {
            return SannaApi('put', 'productodetalle', array(
                'id' => $id,
                'id_prodcap_cabecera' => $id_prodcap_cabecera,
                'id_empresa' => $id_empresa,
                'fecha_inicio' => date('d/m/Y', strtotime($fecha_inicio)),
                'fecha_fin' => date('d/m/Y', strtotime($fecha_fin)),
                'tiempo_permanencia' => $tiempo_permanencia,
                'tiene_contrato' => $tiene_contrato,
                'limite_credito' => $limite_credito,
                'tarifa_total' => $tarifa_total,
                'atenciones_para' => $atenciones_para,
                'edad_desde' => $edad_desde,
                'edad_hasta' => $edad_hasta,
                'activo' => true
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    



    public function editarBeneficio(int $id)
    {
        try {
            return SannaApi('post', 'detallebeneficio/getbydetalle', array(
                'id_prodcap_detalle' => $id
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function inactivarBeneficio(int $id)
    {
        try {
            return SannaApi('delete', 'detallebeneficio/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function eliminarBeneficio(int $id)
    {
        try {
            return SannaApi('delete', 'detallebeneficiodelete/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function insertarBeneficio(int $id_prodcap_detalle, int $id_beneficio, $nro_veces, $copago, $aplica_delivery, $aplica_laboratorio)
    {
        try {
            return SannaApi('post', 'detallebeneficio', array(
                'id_prodcap_detalle' => $id_prodcap_detalle,
                'id_beneficio' => $id_beneficio,
                'nro_veces' => $nro_veces,
                'copago' => $copago,
                'aplica_delivery' => $aplica_delivery,
                'aplica_laboratorio' => $aplica_laboratorio,
                'activo' => true
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function actualizarBeneficio($id_detalle_beneficio, $id_prodcap_detalle, int $id_beneficio, $nro_veces, $copago, $aplica_delivery, $aplica_laboratorio)
    {
        try {
            return SannaApi('put', 'detallebeneficio', array(
                'id' => $id_detalle_beneficio,
                'id_prodcap_detalle' => $id_prodcap_detalle,
                'id_beneficio' => $id_beneficio,
                'nro_veces' => $nro_veces,
                'copago' => $copago,
                'aplica_delivery' => $aplica_delivery,
                'aplica_laboratorio' => $aplica_laboratorio,
                'activo' => true
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }


    public function editarEmpleado(int $id)
    {
        try {
            return SannaApi('post', 'detalleempleado/getbydetalle', array(
                'id_prodcap_detalle' => $id
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function insertarEmpleado(int $id_prodcap_detalle, int $id_tipo_documento, $nro_documento, $nombre, $apellido, $genero, $fecha_nacimiento, $correo, $telefono, $ubigeo,$direccion)
    {
        try {
            return SannaApi('post', 'detalleempleado', array(
                'id_prodcap_detalle' => $id_prodcap_detalle,
                'id_tipo_documento' => $id_tipo_documento,
                'nro_documento' => $nro_documento, 
                'nombre' => $nombre, 
                'apellido' => $apellido, 
                'genero' => $genero, 
                'fecha_nacimiento' => date('d/m/Y', strtotime($fecha_nacimiento)),
                'correo' => $correo, 
                'telefono' => $telefono, 
                'ubigeo' => $ubigeo,
                'direccion' => $direccion,
                'estado' => "Activo"
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function eliminarEmpleado(int $id)
    {
        try {
            return SannaApi('delete', 'detalleempleado/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }

}
?>