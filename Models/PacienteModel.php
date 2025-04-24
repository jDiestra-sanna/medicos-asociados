<?php

require_once "Models/ConnectionApi.php";

class PacienteModel extends ConnectionApi{
    public function insertPersona($array)
    {
        try {
            return SannaApi('post', 'paciente', $array);
        }
        catch(Exception $e) {
            return $e;
        }

    }
    public function buscaPaciente($array)
    {
        try {
            return SannaApi('post', 'buscapaciente', $array);
        }
        catch(Exception $e) {
            return $e;
        }
    }
    
}
?>