<?php
require_once("Models/ConsultaModel.php");
require_once("Models/BeneficiosModel.php");
require_once("Models/ProductosModel.php");

class Graficas extends Controllers
{
    public function __construct()
    {
        // if (empty($_SESSION['activo'])) {
        //     header("location: ".base_url());
        // }
        parent::__construct();
    }
    /************ INICIO SECCION LISTAR ****************/
        public function Listar()
        {
            // $beneficios = new BeneficiosModel();
            // $data_beneficio = $beneficios->getBeneficios();
            $productos = new ProductosModel();
            $data_producto = $productos->getProductosAll();
            $data = array(
                //'beneficios' => $data_beneficio,
                'productos' => $data_producto
            );
            $this->views->getView($this, "Listar", $data, "");
        }
        public function Buscar()
        {
            $datax = ['1','2','3','4','5','6','7','8','9','10','11','12'];
            $datay = [];
            $id_prodcap_cabecera = htmlspecialchars($_GET['producto']);
            $id_beneficio = htmlspecialchars($_GET['beneficio']);
            $ano = htmlspecialchars($_GET['ano']);
            if(isset($_GET['mes']))
                $mes = htmlspecialchars($_GET['mes']);
            else $mes = 0;
            // $mes_desde = $_GET['mes_desde'];
            // $mes_hasta = $_GET['mes_hasta'];
            
            $data = $this->model->getAtencionesDia($id_prodcap_cabecera, $id_beneficio, $ano);
            if($data->data){
                foreach ($datax as $keymonth => $itemmonth) {
                    $datay[] = 0;
                    foreach ($data->data as $key => $item) {
                        if($mes == 0){
                            if($itemmonth == $item->month){
                                $datay[count($datay)-1] = $item->count;
                                break;
                            }
                        }
                        else{
                            if($itemmonth == $item->month && $mes == $itemmonth){
                                $datay[count($datay)-1] = $item->count;
                                break;
                            }
                        }
                    }
                }
            }

            $productos = new ProductosModel();
            if($mes == 0)
                $productolista = $productos->getProductos(true, $ano.'/01/01', $ano.'/12/31', $id_prodcap_cabecera);
            else
                $productolista = $productos->getProductos(true, $ano.'/'.$mes.'/01', $ano.'/'.$mes.'/'.cal_days_in_month(CAL_GREGORIAN, $mes, $ano), $id_prodcap_cabecera);

            $datatotal = array(
                'datay' => $datay,
                'data' => $productolista->data
            );

            echo json_encode($datatotal);
            //echo json_encode([12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 8]);
        }

        public function BuscarData()
        {
            $datax = ['1','2','3','4','5','6','7','8','9','10','11','12'];
            $datay = [];
            $id_prodcap_cabecera = htmlspecialchars($_GET['producto']);
            $id_beneficio = htmlspecialchars($_GET['beneficio']);
            $ano = htmlspecialchars($_GET['ano']);
            $mes = htmlspecialchars($_GET['mes']);
            
            $data = $this->model->getAtencionesData($id_prodcap_cabecera, $id_beneficio, $ano, $mes);
            echo json_encode($data);
            //echo json_encode([12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 8]);
        }

        public function BeneficiosProProducto(){
            /* Catálogos permitidos */
            $productos = new ProductosModel();
            $array_producto = $productos->getProductosAll();
            /* Catálogos permitidos */

            $id_prodcap_cabecera = htmlspecialchars($_GET['producto']);

            if (!in_array( $id_prodcap_cabecera, $array_producto)) { $id_prodcap_cabecera = -1; }

            $data = $this->model->getBeneficiosPorProducto($id_prodcap_cabecera);
            echo json_encode($data);
        }
}
