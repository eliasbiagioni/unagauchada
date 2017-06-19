<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RespuestaComentario extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('postulacion_model');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'Ingrese respuesta');
        }
        
    function index(){
        $parameters = array (
            'idpostulacion' => $_GET['idpostulacion'],
            'comentario' => $_GET['comentario'],
            'area_respuesta' => array(
                'name' => "respuesta",
                'cols' => "60",
                'rows' => "10",
                'maxlength' => "600",
                'placeholder' => "Escribe la respuesta",
                'id' => "respuesta"
            ),
        );
        $this->load->view('responderComentario',$parameters);
        
    }
    
    public function guardarRespuesta(){
        $this->form_validation->set_rules('respuesta', 'Respuesta', 'required');
        $idpostulacion = $_GET['idpostulacion'];
        $comentario= $_GET['comentario'];
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $datos = array(
                'id_postulacion' => $idpostulacion,
                'respuesta' => $this->input->post('respuesta'),
            );
            $this->postulacion_model->guardarRespuesta($datos);
            $parameter['mensaje'] = 'Comentario respondido';
            $this->load->view('mensajes',$parameter);
        }
        
    }

}