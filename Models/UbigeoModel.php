<?php

require_once "Models/ConnectionApi.php";

class UbigeoModel extends ConnectionApi{
    
    public function getUbigeos($search)
    {
        try {
            return SannaApi('post', 'ubigeo', array(
                'search' => $search
            ));
        }
        catch(Exception $e) {
            return $e;
        }

    }

    
}
?>