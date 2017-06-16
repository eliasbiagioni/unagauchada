<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Publicar_gauchada_model');
        }


    public function index(){
        $this->session->sess_destroy();
        $parameter['submit_registro'] = array(
            'name' => "registro",
            'value' => "Registrarse",
        );
        $parameter['submit_inicio_sesion'] = array(
            'name' => "inicio_sesion",
            'value' => "Iniciar sesión",
        );
        $parameter['gauchadas'] = $this->Publicar_gauchada_model->obtenerGauchadas();
        $this->load->view('inicio',$parameter);
    }
}