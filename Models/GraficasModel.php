<?php

require_once "Models/ConnectionApi.php";

class GraficasModel{    
    public function getAtencionesDia($id_prodcap_cabecera, $id_beneficio, $ano)
    {
        try {
            return SannaApi('post', 'estadistica/getatencionesmes', array(
                'id_prodcap_cabecera' => $id_prodcap_cabecera,
                'id_beneficio' => $id_beneficio,
                'ano' => $ano,
            ));
        }
        catch(Exception $e) {
            return $e;
        }

    }

    public function getAtencionesData($id_prodcap_cabecera, $id_beneficio, $ano, $mes)
    {
        try {
            return SannaApi('post', 'estadistica/getatencionesdia', array(
                'id_prodcap_cabecera' => $id_prodcap_cabecera,
                'id_beneficio' => $id_beneficio,
                'ano' => $ano,
                'mes' => $mes,
            ));
        }
        catch(Exception $e) {
            return $e;
        }

    }

    public function getBeneficiosPorProducto($id_prodcap_cabecera)
    {
        try {
            return SannaApi('post', 'beneficio/getbyproducto', array(
                'idProducto' => $id_prodcap_cabecera
            ));
        }
        catch(Exception $e) {
            return $e;
        }

    }
    
}
?>