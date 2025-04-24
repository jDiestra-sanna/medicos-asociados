<?php

require_once "Models/ConnectionApi.php";

class SitedsModel extends ConnectionApi{

    public function getAseguradorasSiteds()
    {
        try {
            return SannaApi('get', 'aseguradorasiteds', array() );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getPacienteSiteds($metodo, $ape_paterno, $ape_materno, $nombres, $tipo_doc, $nro_doc, $cod_financ)
    {
        try {
            return SannaApi('post', 'getdatasiteds', array(
                'metodo' => $metodo,
                'data' => array(
                    "CodTipoDocumentoAfiliado" => $tipo_doc==2?1:$tipo_doc,
                    "RUC" => Ruc_ipress,
                    "SUNASA" => cod_ipress,
                    "IAFAS" => $cod_financ,
                    "NombresAfiliado" => $nombres,
                    "ApellidoPaternoAfiliado" => $ape_paterno,
                    "ApellidoMaternoAfiliado" => $ape_materno,
                    "NumeroDocumentoAfiliado" => $nro_doc,
                    "CodEspecialidad" => ""
                )
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getPacienteSitedsCoberturas($metodo, $ape_paterno, $ape_materno, $nombres, $cod_afiliado, $codtipodocumentoafiliado, $numerodocumentoafiliado,
    $codproducto, $desproducto, $numeroplan, $codtipodocumentocontratante, $numerodocumentocontratante, $nombrecontratante, $codparentesco, $tipocalificadorcontratante, $cod_financ)
    {
        try {
            return SannaApi('post', 'getdatasiteds', array(
                'metodo' => $metodo,
                'data' => array(
                    "RUC" => Ruc_ipress,
                    "SUNASA" => cod_ipress,
                    "IAFAS" => $cod_financ,
                    "NombresAfiliado" => $nombres,
                    "ApellidoPaternoAfiliado" => $ape_paterno,
                    "ApellidoMaternoAfiliado" => $ape_materno,
                    "CodigoAfiliado" => $cod_afiliado,
                    "CodTipoDocumentoAfiliado" => $codtipodocumentoafiliado,
                    "NumeroDocumentoAfiliado" => $numerodocumentoafiliado,
                    "CodProducto" => $codproducto,
                    "DesProducto" => $desproducto,
                    "NumeroPlan" => $numeroplan,
                    "CodTipoDocumentoContratante" => $codtipodocumentocontratante,
                    "NumeroDocumentoContratante" => $numerodocumentocontratante,
                    "NombreContratante" => $nombrecontratante,
                    "CodParentesco" => $codparentesco,
                    "TipoCalificadorContratante" => $tipocalificadorcontratante,
                    "CodEspecialidad" => ""
                )
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }

    public function getNumeroAutorizacion($metodo, $ape_paterno, $ape_materno, $nombres, $cod_afiliado, $codtipodocumentoafiliado, $numerodocumentoafiliado,
    $codproducto, $desproducto, $numeroplan, $codtipodocumentocontratante, $numerodocumentocontratante, $nombrecontratante, $codparentesco, $cod_financ,
    $beneficiomaximoinicial, $codigotitular, $codcalificacionservicio, $codestado, $codmoneda, $codcopagofijo, $codcopagovariable, $codsubtipocobertura,
    $codtipocobertura, $codtipoafiliacion, $codestadomarital, $codfechafincarencia, $codfechaafiliacion, $codfechainiciovigencia, $codfechanacimiento,
    $codgenero, $condicionesespeciales, $apellidomaternotitular, $apellidopaternotitular, $nombrestitular, $numerocertificado, $numerocontrato, $numerodocumentotitular,
    $numeropoliza, $codtipodocumentotitular, $codtipoplan, $codindicadorrestriccion)
    {
        try {
            return SannaApi('post', 'getdatasiteds', array(
                'metodo' => $metodo,
                'data' => array(
                    "RUC" => Ruc_ipress,
                    "SUNASA" => cod_ipress,
                    "IAFAS" => $cod_financ,
                    "ApellidoPaternoAfiliado" => $ape_paterno,
                    "ApellidoMaternoAfiliado" => $ape_materno,
                    "BeneficioMaximoInicial" => $beneficiomaximoinicial,
                    "CodigoAfiliado" => $cod_afiliado,
                    "CodigoTitular" => $codigotitular,
                    "CodCalificacionServicio" => $codcalificacionservicio,
                    "CodEstado" => $codestado,
                    "CodEspecialidad" => "",
                    "CodMoneda" => $codmoneda,
                    "CodCopagoFijo" => $codcopagofijo,
                    "CodCopagoVariable" => $codcopagovariable,
                    "CodParentesco" => $codparentesco,
                    "CodProducto" => $codproducto,
                    "NumeroDocumentoContratante" => $numerodocumentocontratante,
                    "CodSubTipoCobertura" => $codsubtipocobertura,
                    "CodTipoCobertura" => $codtipocobertura,
                    "CodTipoAfiliacion" => $codtipoafiliacion,
                    "DesProducto" => $desproducto,
                    "CodEstadoMarital" => $codestadomarital,
                    "CodFechaFinCarencia" => $codfechafincarencia,
                    "CodFechaAfiliacion" => $codfechaafiliacion,
                    "CodFechaInicioVigencia" => $codfechainiciovigencia,
                    "CodFechaNacimiento" => $codfechanacimiento,
                    "CodGenero" => $codgenero,
                    "CondicionesEspeciales" => $condicionesespeciales,
                    "ApellidoMaternoTitular" => $apellidomaternotitular,
                    "CondicionesEspeciales" => $condicionesespeciales,
                    "NombreContratante" => $nombrecontratante,
                    "ApellidoPaternoTitular" => $apellidopaternotitular,
                    "NombresAfiliado" => $nombres,
                    "NombresTitular" => $nombrestitular,
                    "NumeroCertificado" => $numerocertificado,
                    "NumeroContrato" => $numerocontrato,
                    "NumeroDocumentoAfiliado" => $numerodocumentoafiliado,
                    "NumeroDocumentoTitular" => $numerodocumentotitular,
                    "NumeroPlan" => $numeroplan,
                    "NumeroPoliza" => $numeropoliza,
                    "CodTipoDocumentoContratante" => $codtipodocumentocontratante,
                    "CodTipoDocumentoAfiliado" => $codtipodocumentoafiliado,
                    "CodTipoDocumentoTitular" => $codtipodocumentotitular,
                    "CodTipoPlan" => $codtipoplan,
                    "CodIndicadorRestriccion" => $codindicadorrestriccion
                )
            ) );
        }
        catch(Exception $e) {
            return $e;
        }
    }
}