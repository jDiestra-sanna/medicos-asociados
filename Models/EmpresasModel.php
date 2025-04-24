<?php

require_once "Models/ConnectionApi.php";

class EmpresasModel{    
    public function getEmpresas()
    {
        try {
            return SannaApi('get', 'empresa', array());
        }
        catch(Exception $e) {
            return $e;
        }

    }

    public function getEmpresaById(int $id)
    {
        try {
            return SannaApi('get', 'empresa/'.$id, array());
        }
        catch(Exception $e) {
            return $e;
        }
    }
    
}
?>