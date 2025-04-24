<?php
require_once("Models/SitedsModel.php");

class Siteds extends Controllers
{
    public function __construct()
    {
        // if (empty($_SESSION['activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }
    
    public function CargarAseguradoras()
    {
        $data = $this->model->getAseguradorasSiteds();
        echo json_encode($data->data);
    }

    public function BuscarPacienteSitedsXNombre()
    {
        /* Catálogos permitidos */
        $array_tipodoc = array( "2", "3", "5" );
        /* Catálogos permitidos */
        $ape_paterno = htmlspecialchars($_GET['ape_paterno']);
        $ape_materno = htmlspecialchars($_GET['ape_materno']);
        $nombres = htmlspecialchars($_GET['nombres']);
        $tipo_doc = htmlspecialchars($_GET['tipo_doc']);
        $nro_doc = htmlspecialchars($_GET['nro_doc']);
        $cod_financ = htmlspecialchars($_GET['cod_financ']);

        if (!in_array( $tipo_doc, $array_tipodoc)) { $tipo_doc = -1; }

        $data = $this->model->getPacienteSiteds('ConsultaAsegNom',$ape_paterno, $ape_materno, $nombres, $tipo_doc, $nro_doc, $cod_financ);
        echo json_encode($data);
    }
    public function BuscarPacienteSitedsBeneficios()
    {
        $ape_paterno = htmlspecialchars($_GET['ape_paterno']);
        $ape_materno = htmlspecialchars($_GET['ape_materno']);
        $nombres = htmlspecialchars($_GET['nombres']);
        $cod_afiliado = htmlspecialchars($_GET['cod_afiliado']);
        $codtipodocumentoafiliado = htmlspecialchars($_GET['codtipodocumentoafiliado']);
        $numerodocumentoafiliado = htmlspecialchars($_GET['numerodocumentoafiliado']);
        $codproducto = htmlspecialchars($_GET['codproducto']);
        $desproducto = htmlspecialchars($_GET['desproducto']);
        $numeroplan = htmlspecialchars($_GET['numeroplan']);
        $codtipodocumentocontratante = htmlspecialchars($_GET['codtipodocumentocontratante']);
        $numerodocumentocontratante = htmlspecialchars($_GET['numerodocumentocontratante']);
        $nombrecontratante = htmlspecialchars($_GET['nombrecontratante']);
        $codparentesco = htmlspecialchars($_GET['codparentesco']);
        $tipocalificadorcontratante = htmlspecialchars($_GET['tipocalificadorcontratante']);
        $cod_financ = htmlspecialchars($_GET['cod_financ']);

        $data = $this->model->getPacienteSitedsCoberturas('ConsultaAsegCod',$ape_paterno, $ape_materno, $nombres, $cod_afiliado, $codtipodocumentoafiliado, $numerodocumentoafiliado,
        $codproducto, $desproducto, $numeroplan, $codtipodocumentocontratante, $numerodocumentocontratante, $nombrecontratante, $codparentesco, $tipocalificadorcontratante, $cod_financ);
        echo json_encode($data);
    }

    public function ConsultaNumeroAutorizacion()
    {
        $dataget = $_GET;
        $dataget['RUC'] = Ruc_ipress;
        $dataget['SUNASA'] = cod_ipress;
        $dataget['IAFAS'] = htmlspecialchars($_GET['cod_financ']);
        $arraydata = array(
            'metodo' => 'ConsultaNumeroAutorizacion',
            'data' => array(
                "RUC" => Ruc_ipress,
                "SUNASA" => cod_ipress,
                "IAFAS" => htmlspecialchars($_GET['cod_financ']),
                "ApellidoPaternoAfiliado" => htmlspecialchars($_GET['ApellidoPaternoAfiliado']),
                "ApellidoMaternoAfiliado" => htmlspecialchars($_GET['ApellidoMaternoAfiliado']),
                "BeneficioMaximoInicial" => htmlspecialchars($_GET['BeneficioMaximoInicial']),
                "CodigoAfiliado" => htmlspecialchars($_GET['CodigoAfiliado']),
                "CodigoTitular" => htmlspecialchars($_GET['CodigoTitular']),
                "CodCalificacionServicio" => htmlspecialchars($_GET['CodCalificacionServicio']),
                "DesCalificacionServicio" => htmlspecialchars($_GET['DesCalificacionServicio']),
                "CodEstado" => htmlspecialchars($_GET['CodEstado']),
                "DesEstado" => htmlspecialchars($_GET['DesEstado']),
                "CodFechaActualizacionFoto" => htmlspecialchars($_GET['CodFechaActualizacionFoto']),
                "FechaActualizacionFoto" => htmlspecialchars($_GET['FechaActualizacionFoto']),
                "CodEspecialidad" => "",
                "CodMoneda" => htmlspecialchars($_GET['CodMoneda']),
                "DesMoneda" => htmlspecialchars($_GET['DesMoneda']),
                "CodCopagoFijo" => htmlspecialchars($_GET['CodCopagoFijo']),
                "DesCopagoFijo" => htmlspecialchars($_GET['DesCopagoFijo']),
                
                "FechaFinVigencia" => htmlspecialchars($_GET['FechaFinVigencia']),
                "CodCopagoVariable" => htmlspecialchars($_GET['CodCopagoVariable']),
                "DesCopagoVariable" => htmlspecialchars($_GET['DesCopagoVariable']),
                "CodParentesco" => htmlspecialchars($_GET['CodParentesco']),
                "DesParentesco" => htmlspecialchars($_GET['DesParentesco']),
                "CodProducto" => htmlspecialchars($_GET['CodProducto']),
                "NumeroDocumentoContratante" => htmlspecialchars($_GET['NumeroDocumentoContratante']),
                "CodSubTipoCobertura" => htmlspecialchars($_GET['CodSubTipoCobertura']),
                "CodTipoCobertura" => htmlspecialchars($_GET['CodTipoCobertura']),
                "Observaciones" => htmlspecialchars($_GET['Observaciones']),
                "CodTipoAfiliacion" => htmlspecialchars($_GET['CodTipoAfiliacion']),
                "DesTipoAfiliacion" => htmlspecialchars($_GET['DesTipoAfiliacion']),
                "DesProducto" => htmlspecialchars($_GET['DesProducto']),
                "CodEstadoMarital" => htmlspecialchars($_GET['CodEstadoMarital']),
                "DesEstadoCivil" => htmlspecialchars($_GET['DesEstadoCivil']),
                "Edad" => htmlspecialchars($_GET['Edad']),
                "CodFechaFinCarencia" => htmlspecialchars($_GET['CodFechaFinCarencia']),
                "FechaFinCarencia" => htmlspecialchars($_GET['FechaFinCarencia']),
                "CodFechaAfiliacion" => htmlspecialchars($_GET['CodFechaAfiliacion']),
                "FechaAfiliacion" => htmlspecialchars($_GET['FechaAfiliacion']),
                "CodFechaInicioVigencia" => htmlspecialchars($_GET['CodFechaInicioVigencia']),
                "FechaInicioVigencia" => htmlspecialchars($_GET['FechaInicioVigencia']),
                "CodFechaFinVigencia" => htmlspecialchars($_GET['CodFechaFinVigencia']),

                "CodFechaNacimiento" => htmlspecialchars($_GET['CodFechaNacimiento']),
                "FechaNacimiento" => htmlspecialchars($_GET['FechaNacimiento']),
                "CodGenero" => htmlspecialchars($_GET['CodGenero']),
                "DesGenero" => htmlspecialchars($_GET['DesGenero']),
                "CondicionesEspeciales" => htmlspecialchars($_GET['CondicionesEspeciales']),
                "ApellidoMaternoTitular" => htmlspecialchars($_GET['ApellidoMaternoTitular']),
                "NombreContratante" => htmlspecialchars($_GET['NombreContratante']),
                "ApellidoPaternoTitular" => htmlspecialchars($_GET['ApellidoPaternoTitular']),
                "NombresAfiliado" => htmlspecialchars($_GET['NombresAfiliado']),
                "NombresTitular" => htmlspecialchars($_GET['NombresTitular']),
                "NumeroCertificado" => htmlspecialchars($_GET['NumeroCertificado']),
                "NumeroContrato" => htmlspecialchars($_GET['NumeroContrato']),
                "NumeroDocumentoAfiliado" => htmlspecialchars($_GET['NumeroDocumentoAfiliado']),
                "NumeroCobertura" => htmlspecialchars($_GET['NumeroCobertura']),
                "NumeroDocumentoTitular" => htmlspecialchars($_GET['NumeroDocumentoTitular']),
                "NumeroPlan" => htmlspecialchars($_GET['NumeroPlan']),
                "NumeroPoliza" => htmlspecialchars($_GET['NumeroPoliza']),
                "CodigoCobertura" => htmlspecialchars($_GET['CodigoCobertura']),
                "Beneficios" => htmlspecialchars($_GET['Beneficios']),
                "CodTipoDocumentoContratante" => htmlspecialchars($_GET['CodTipoDocumentoContratante']),
                "DesTipoDocumentoContratante" => htmlspecialchars($_GET['DesTipoDocumentoContratante']),
                "CodTipoDocumentoAfiliado" => htmlspecialchars($_GET['CodTipoDocumentoAfiliado']),
                "DesTipoDocumentoAfiliado" => htmlspecialchars($_GET['DesTipoDocumentoAfiliado']),
                "CodTipoDocumentoTitular" => htmlspecialchars($_GET['CodTipoDocumentoTitular']),
                "DesTipoDocumentoTitular" => htmlspecialchars($_GET['DesTipoDocumentoTitular']),
                "CodTipoPlan" => htmlspecialchars($_GET['CodTipoPlan']),
                "DesTipoPlan" => htmlspecialchars($_GET['DesTipoPlan']),
                "CodIndicadorRestriccion" => htmlspecialchars($_GET['CodIndicadorRestriccion']),
                "Restricciones" => htmlspecialchars($_GET['Restricciones'])
            )
        );

        $datasited = $this->model->SannaApi('post', 'getdatasiteds', $arraydata );
        //$datasited['documentobase'] = base64_encode($datasited->Documento);        
        echo json_encode($datasited);
    }
}
