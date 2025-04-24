<?php

require_once "Models/ConnectionApi.php";

class ConsultaModel{    
    public function getTiposDocumento()
    {
        try {
            return SannaApi('get', 'tipodocumento', array());
        }
        catch(Exception $e) {
            return $e;
        }

    }

    public function buscarEmpleado(int $id_tipo_documento, $nro_documento, $nombres)
    {
        try {
            return SannaApi('post', 'detalleempleado/getbynumbername', array(
                'id_tipo_documento' => $id_tipo_documento,
                'nro_documento' => $nro_documento,
                'nombres' => $nombres,
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    
    public function buscarAtencionesEmpleado(int $id_tipo_documento, $nro_documento)
    {
        try {
            return SannaApi('post', 'llamadas', array(
                'id_tipo_documento' => $id_tipo_documento,
                'nro_documento' => $nro_documento
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
}
?>