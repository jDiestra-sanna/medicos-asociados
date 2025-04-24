<?php
class Usuarios extends Controllers
{
    public function __construct()
    {
        // if (empty($_SESSION['activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }
    public function Listar()
    {
        $data = $this->model->selectUsuarios();
        $this->views->getView($this, "Listar", $data, "");
    }

    // public function login()
    // {
    //     echo json_encode(array('success'=>true));
    //     return;
    //     //session_destroy();
    //     if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
    //         $usuario = $_POST['usuario'];
    //         $clave = $_POST['clave'];

    //         $data = $this->model->selectUsuario($usuario, $clave);
    //         // return;
    //         if ($data) {
    //             $_SESSION['id'] = $data->cod_usu;
    //             $_SESSION['nombre'] = $data->des_usu;
    //             $_SESSION['usuario'] = $data->nom_usu;
    //             $_SESSION['correo'] = $data->email;
    //             $_SESSION['rol'] = $data->cod_tip_usuario;
    //             $_SESSION['activo'] = true;
    //             $_SESSION['permisos'] = $data->permisos;
    //             echo json_encode(array('success'=>true));
    //         } else {
    //             echo json_encode(array('success'=>false, 'message'=> 'Hubieron errores en el inicio de Sesión'));
    //         }
    //     }
    //     else {
    //         echo json_encode(array('success'=>false, 'message'=> 'Debe ingresar su usuario y clave'));
    //     }
    // }

    public function salir()
    {
        session_destroy();
        if(isset($_SESSION['medico_data'])){
            header("Location: ".base_url()."home/sesionmedicos");    
        }
        else{
            header("Location: ".base_url());
        }
    }
}
