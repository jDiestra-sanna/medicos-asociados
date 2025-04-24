<?php
require('vendor/autoload.php');
use RobThree\Auth\TwoFactorAuth;

class Seguridad extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function GenerarQR()
    {
        try{
            $tfa = new TwoFactorAuth();
            $secret = $tfa->createSecret();        
            echo json_encode( array('link' => $tfa->getQRCodeImageAsDataUri('Sanna', $secret), 'code'=> $secret ) );
        }
        catch(Exception $ex){
            echo 'No image';
        }        
    }

    public function ValidarCodigo($secret, $codigo){
        $tfa = new TwoFactorAuth();
        if($tfa->verifyCode($secret, $codigo)){
            return true;
        }
        else{
            return false;
        }
    }    
    
}
