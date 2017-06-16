<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerGauchadaCompleta extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Publicar_gauchada_model');
        }


    public function index(){
        $id_favor = $_GET['num'];
        $parameter['gauchada'] = $this->Publicar_gauchada_model->obtenerGauchadaCompleta($id_favor);
        $fecha2 = date('Y-m-d');
        $inicio = strtotime($parameter['gauchada']->fecha_expiracion);
        $fin = strtotime($fecha2);
        $dif = $inicio - $fin;
        $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
        $totDias = ceil($diasFalt);
        if($totDias > 0){
            $parameter['mensaje'] = 'Dias restantes: '.$totDias;
        }else{
            $parameter['mensaje'] = 'Expiró';
        }
        $parameter['cantDias'] = $totDias;
        $this->load->view('detalleGauchada',$parameter);
        
    }
}