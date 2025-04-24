<?php

require_once "Models/ConnectionApi.php";

class TestModel{
    
    public function getTest($page, $records, $order)
    {
        try {
            return SannaApiAutenticacion('post', 'test', array(
                'page' => $page, 'records' => $records, 'order' => $order
            ));
        }
        catch(Exception $e) {
            return $e;
        }

    }

    public function getLlamadas($page, $records, $order)
    {
        try {
            return SannaApiAutenticacion('post', 'llamadas', array(
                'page' => $page, 'records' => $records, 'order' => $order
            ));
        }
        catch(Exception $e) {
            return $e;
        }
    }

    
}
?>