<?php

require_once "Models/ConnectionApi.php";

class EmpleadosModel{
    
    public function getEmpleados()
    {
        try {
            return SannaApi('get', 'detalleempleado', array());
        }
        catch(Exception $e) {
            return $e;
        }

    }
    public function insertarBeneficio(String $nombre, string $descripcion)
    {
        try {
            return SannaApi('post', 'beneficio', array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
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
            return SannaApi('get', 'beneficio/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function actualizarBeneficios(int $id, String $nombre, String $descripcion)
    {
        try {
            return SannaApi('put', 'beneficio', array(
                'id' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }
    public function eliminarBeneficio(int $id)
    {
        try {
            return SannaApi('delete', 'beneficio/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }

    
}
?>