<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerGauchadaCompleta extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Publicar_gauchada_model');
        $this->load->model('postulacion_model');
        }


    public function index(){
        $id_favor = $_GET['num'];
        if($this->session->userdata('login') == TRUE){
            $datos = array(
                'id_favor' => $id_favor,
                'id_usuario_postulante' => $this->session->userdata('id'),
            );
            $parameter['se_postulo'] = $this->postulacion_model->existePostulacion($datos);
        }
        $parameter['gauchada'] = $this->Publicar_gauchada_model->obtenerGauchadaCompleta($id_favor);
        $consulta_postulantes = $this->postulacion_model->postulantes($id_favor);
        $parameter['cant_postulantes'] = $consulta_postulantes->num_rows();
        $parameter['postulantes'] = $consulta_postulantes->result();
        $parameter['idfavor'] = $id_favor;
        if ($parameter['cant_postulantes'] > 0){
            $existeDesignado = $parameter['postulantes'][0]->estado;
            if ($existeDesignado == 'Pendiente'){
                $parameter['colocarBotonSeleccionar'] = TRUE;
            }else{
                $parameter['colocarBotonSeleccionar'] = FALSE;
            }
        }
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
        $parameter['id_favor'] = $id_favor;
        $this->load->view('detalleGauchada',$parameter);
    }
    
}