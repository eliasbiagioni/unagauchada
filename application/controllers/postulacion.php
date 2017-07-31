<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postulacion extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('postulacion_model');
        $this->load->library('form_validation');
        $this->load->model('buscarGauchada');
        $this->form_validation->set_message('required', 'Usted debe comentar el motivo de su postulacion');
        }
    
    public function index(){
        $parameters = array (
            'id_favor' => $_GET['idfavor'],
            'id_usuario_postulante' => $_GET['idpostulante'],
        );
        $existePostulacion = $this->postulacion_model->existePostulacion($parameters);
        if($existePostulacion > 0){
            $parameter['mensaje'] = 'Usted ya se postuló para esta gauchada';
            $this->load->view('mensajes',$parameter);
        }else{
            $parameters['area_comentario'] = array(
                'name' => "comentario",
                'cols' => "60",
                'rows' => "10",
                'maxlength' => "600",
                'placeholder' => "Escribe el comentario",
                'id' => "comentario"
            );
            $this->load->view('realizarComentarioPostulacion',$parameters);
        }
    }
    
    public function postularCandidato(){
        $this->form_validation->set_rules('comentario', 'Comentario', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $tituloGauchada = $this->buscarGauchada->obtenerTituloGauchada($_GET['idfavor']);
            $datos = array(
                'idfavor' => $_GET['idfavor'],
                'idusuario' => $_GET['idpostulante'],
                'comentario' => $this->input->post('comentario'),
                'tituloGauchada' => $tituloGauchada->titulo_favor
            );
            $this->postulacion_model->postularNuevoCandidato($datos);
            $parameter['mensaje'] = 'Postulación exitosa';
            $this->load->view('mensajes',$parameter);
        }
    }
    
    function cancelarCandidatura(){
        $datos = array(
            'id_favor' => $_GET['idfavor'],
            'id_postulante' => $_GET['idpostulante'],
        );
        $this->postulacion_model->cancelarCandidatura($datos);
        $parameter['mensaje'] = 'Usted ha cancelado su candidatura en una gauchada';
        $this->load->view('mensajes',$parameter);
    }
    
    function seleccionarPostulante(){
        $datos = array(
            'id_favor' => $_GET['idfavor'],
            'id_postulante' => $_GET['idpostulante'],
        );
        $this->postulacion_model->seleccionarCandidato($datos);
        $parameter['mensaje'] = 'Se ha seleccionado un candidato exitosamente';
        $this->load->view('mensajes',$parameter);
    }
    
    function eliminarSeleccion(){
        $datos = array(
            'id_favor' => $_GET['idfavor'],
        );
        $this->postulacion_model->eliminarCandidatura($datos);
        $parameter['mensaje'] = 'Se ha eliminado la selección de candidato';
        $this->load->view('mensajes',$parameter);
    }
}        