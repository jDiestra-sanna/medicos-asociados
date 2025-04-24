<?php

require_once "Models/ConnectionApi.php";

class AtencionModel{
    public function insertAtencion($array)
    {
        try {
            return SannaApi('post', 'crearatencionbcp', $array);
        }
        catch(Exception $e) {
            return $e;
        }

    }
    
}
?>