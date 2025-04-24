<?php
require_once "Models/ConnectionApi.php";

class MedicosModel extends ConnectionApi{
    public $id, $clave, $nombre, $usuario, $correo, $rol;
    public function __construct()
    {
        //parent::__construct();
    }
    public function validateMedico(string $usuario, string $clave)
    {
        try {
            return SannaApi('post', 'medico/validate', array(
                    'email' => $usuario,
                    'password' => $clave
            ));
        }
        catch(PDOException $e) {
            return $e;
        }

    }
    
}
?>