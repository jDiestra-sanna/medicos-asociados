<?php
require_once "Models/ConnectionApi.php";

class UsuariosModel{
    public $id, $clave, $nombre, $usuario, $correo, $rol;
    public function __construct()
    {
        //parent::__construct();
    }
    public function selectUsuario(string $usuario, string $clave)
    {
        try {
            return SannaApi('post', 'usuarios/validate', array(
                    'nom_usu' => $usuario,
                    'pas_usu' => $clave
            ));
        }
        catch(PDOException $e) {
            return $e;
        }

    }
    
}
?>