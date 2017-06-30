<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerGauchadaCompleta extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Publicar_gauchada_model');
        $this->load->model('postulacion_model');
        $this->load->model('calificacion_model');
        $this->load->model('mandarDatos');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'Ingrese respuesta');
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
        $parameter['totDias'] = $totDias;
        if($totDias > 0){
            $parameter['mensaje'] = 'Dias restantes: '.$totDias;
        }else{
            $parameter['mensaje'] = 'Expiró';
        }
        $parameter['cantDias'] = $totDias;
        $parameter['id_favor'] = $id_favor;
        $parametros_calificacion = array(
            'idFavor' => $id_favor,
            'idPostulante' => $this->calificacion_model->existeAceptado($id_favor),
        );
        if($parametros_calificacion['idPostulante'] != 0){
            $consulta_calificacion = $this->calificacion_model->existeCalificacion($parametros_calificacion);
            if($consulta_calificacion > 0){
                $parameter['existeAceptado'] = TRUE;
                $parameter['existeCalificacion'] = TRUE;
            }else{
                $parameter['existeAceptado'] = TRUE;
                $parameter['existeCalificacion'] = FALSE;}
        }else{
            $parameter['existeAceptado'] = FALSE;
            $parameter['existeCalificacion'] = FALSE;
        }
        $preg = $this->mandarDatos->obtenerPreguntas($parameter);
        $parameter['preguntas'] = $preg->result();
        $parameter['cantPreguntas'] = $preg->num_rows();

        $this->load->view('detalleGauchada',$parameter);
    }


    function realizarPregunta(){
        $parameters['id_favor'] = $_GET['idGauchada'];
        $parameters['id_usuario'] = $_GET['idUsuario'];
        $parameters['area_pregunta'] = array(
                'name' => "pregunta",
                'cols' => "70",
                'rows' => "10",
                'maxlength' => "600",
                'placeholder' => "Escribe tu pregunta",
                'id' => "pregunta"
            );
            $this->load->view('realizarPregunta',$parameters);
    }

    function mandarPregunta(){

        $parametro['pregunta'] = $this->input->post('pregunta');
        $parametro['id_favor'] = $_POST['id_favor'];
        $parametro['id_usuario'] = $_POST['id_usuario'];
        $this->mandarDatos->almacenarPregunta($parametro);
        $parameter['mensaje'] = 'Pregunta enviada';
        $this->load->view('mensajes',$parameter);
    }
    
    function editarGauchada(){
        $idfavor = $_GET['idfavor'];
        $parameter['gauchada'] = $this->Publicar_gauchada_model->obtenerGauchadaCompleta($idfavor);
        $parameter['idfavor'] = $idfavor;
        $this->load->view('editarGauchada',$parameter);
    }

    function responderPregunta(){
        $parameters['id_favor'] = $_GET['idGauchada'];
        $parameters['pregunta'] = $_GET['pregunta'];
        $parameters['id_pregunta'] = $_GET['id'];
        $parameters['area_respuesta'] = array(
                'name' => "respuesta",
                'cols' => "70",
                'rows' => "10",
                'maxlength' => "600",
                'placeholder' => "Escribe la respuesta a la pregunta",
                'id' => "respuesta"
        );
        $this->load->view('responderPregunta',$parameters);
    }

    function mandarRespuesta(){
        $parametro['respuesta'] = $this->input->post('respuesta');
        $parametro['id_favor'] = $this->input->post('id_favor');
        $parametro['id_pregunta'] = $this->input->post('id_pregunta');
        $this->mandarDatos->almacenarRespuesta($parametro);
        $parameter['mensaje'] = 'Respuesta enviada';
        $this->load->view('mensajes',$parameter);
    }
}