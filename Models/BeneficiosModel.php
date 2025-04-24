<?php

require_once "Models/ConnectionApi.php";

class BeneficiosModel extends ConnectionApi{
    
    public function getBeneficios()
    {
        try {
            return SannaApi('get', 'beneficio', array());
        }
        catch(Exception $e) {
            return $e;
        }

    }
    public function insertarBeneficio(String $nombre, string $descripcion, $precio_regular)
    {
        try {
            return SannaApi('post', 'beneficio', array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio_regular' => $precio_regular,
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
    public function actualizarBeneficios(int $id, String $nombre, String $descripcion, $precio_regular)
    {
        try {
            return SannaApi('put', 'beneficio', array(
                'id' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio_regular' => $precio_regular
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