<?php

require_once "Models/ConnectionApi.php";

class SeguimientoModel extends ConnectionApi{
    public function getSeguimientoBcp($array)
    {
        try {
            return $this->SannaApi('post', 'listadoseguimientobcp', $array);
        }
        catch(Exception $e) {
            return $e;
        }

    }
    public function getSeguimiento($page, $records, $order, $fecha_inicio, $fecha_fin)
    {
        try {
            return $this->SannaApi('post', 'seguimiento', array(
                'page' => $page, 'records' => $records, 'order' => $order,
                'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin
            ));
        }
        catch(Exception $e) {
            return $e;
        }

    }
    public function getSeguimientoAtenciones($page, $records, $order, $fecha_inicio, $fecha_fin)
    {
        try {
            return $this->SannaApi('post', 'seguimientoatenciones', array(
                'page' => $page, 'records' => $records, 'order' => $order,
                'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getPacientePorCodAtencion($cod_atencion)
    {
        try {
            return $this->SannaApi('post', 'seguimientoreferenciada', array(
                'cod_atencion' => $cod_atencion
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getPacienteDniNombres($nro_documento, $ape_paterno, $ape_materno)
    {
        try {
            return $this->SannaApi('post', 'buscapaciente', array(
                'numdoc' => $nro_documento,
                'ape_paterno' => $ape_paterno,
                'ape_materno' => $ape_materno,
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getPacienteDirecciones($cod_tit)
    {
        try {
            return $this->SannaApi('post', 'buscapacientedireccion', array(
                'cod_tit' => $cod_tit
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function insertEmpleadosSinSeguimiento($data)
    {
        try {
            return $this->SannaApi('post', 'insertempleadossinseguimiento', $data );
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function getEmpleadosSinSeguimiento($data)
    {
        try {
            return $this->SannaApi('post', 'getempleadossinseguimiento', $data );
        }
        catch(Exception $e) {
            return $e;
        }
    }
    
    public function getClasificacionesTodos()
    {
        try {
            return $this->SannaApi('get', 'clasificacionpaciente', array() );
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function getClasificacionesFiltro($arraycodigos)
    {
        try {
            return $this->SannaApi('post', 'clasificacionpacientecodigos', array(
                'codigos' => $arraycodigos
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function insertAtencionSinSeguimiento($array)
    {
        try {
            return $this->SannaApi('post', 'insertatencionsinseguimiento', $array );
        }
        catch(Exception $e) {
            return $e;
        }
    }
    
    public function getSeguimientoCovidEstados($tipo_ingreso)
    {
        try {
            return $this->SannaApi('get', 'getseguimientocovidestados/'.$tipo_ingreso, array() );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getFactoresRiesgo()
    {
        try {
            return $this->SannaApi('get', 'getfactoresriesgo', array() );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function insertSeguimientoBcp($array)
    {
        try {
            return $this->SannaApi('post', 'insertseguimientobcp', $array );
        }
        catch(Exception $e) {
            return $e;
        }
    }

}
?>