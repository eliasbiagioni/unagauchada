<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calificaciones extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('calificacion_model');
        $this->load->model('usuario_model');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', ' Campo obligatorio');
        $this->form_validation->set_message('check_default', 'Campo obligatorio');
        }
        
    function index(){
        $datos = array(
            'idfavor' => $_GET['idfavor'],
            'idusuariocalificar' => $_GET['idusuariocalificar'],
        );
        $this->load->view('calificar',$datos);
    }
    
    function enviarCalificacion(){
        $idfavor = $_GET['idfavor'];
        $idusuariocalificar = $_GET['idusuariocalificar'];
        $this->form_validation->set_rules('calificacion', 'Calificacion', 'required|callback_check_default');
        $this->form_validation->set_rules('comentario', 'Comentario', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            switch ($this->input->post('calificacion')) {
                case 1:
                    $nombreCalificacion = 'Positivo';
                    $this->usuario_model->sumarPunto($idusuariocalificar);       
                    break;
                case 2:
                    $nombreCalificacion = 'Neutro';
                    break;
                default:
                    $nombreCalificacion = 'Negativo';
                    $this->usuario_model->restarPuntos($idusuariocalificar);
                    break;
            }
            $datos = array (
                'idfavor' => $idfavor,
                'idusuario' => $idusuariocalificar,
                'calificacion' => $nombreCalificacion,
                'comentario' => $this->input->post('comentario'),
                'idusuariocalificador' => $this->session->userdata('id'),
                );
            $this->calificacion_model->agregarNuevaCalificacion($datos);
            $parameter['mensaje'] = 'Se ha realizado la calificación al usuario';
            $this->load->view('mensajes',$parameter);
        }
    }
    
    function check_default($post_string){
        return $post_string == '0' ? FALSE : TRUE;
    }
}