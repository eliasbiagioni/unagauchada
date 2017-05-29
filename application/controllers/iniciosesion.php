<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iniciosesion extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('usuario_model');
        $this->load->library('javascript');
        $this->validaciones();
    }
    
    public function index(){
        $parameter['head'] = array(
            "css2" => link_tag('css/imagen_principal.css'),
            'js' => $this->javascript->external('js/botonAtras.js'),
        );
        $parameter['image_properties'] = array(
          'src' => 'images/unagauchada.png',
           'class' => 'size_image',
           );
        $parameter['contrasenia'] = array(
                'type' => 'password',
                'name' => 'contrasenia',
                'placeholder' => 'Escribe tu contraseña',
                'class' => 'tamaño-campos',
            );
        $parameter['mail_usuario'] = array(
                'name' => 'mail_usuario',
                'placeholder' => 'Escribe tu cuenta de mail',
                'class' => 'tamaño-campos',
            );
        $this->load->view('iniciosesion',$parameter);
    }
    
    function validaciones(){
        $this->form_validation->set_message('required', 'Debe ingresar: %s');
        $this->form_validation->set_message('valid_email', '%s no válido');
    }
    
    function validar_datos(){
        $this->form_validation->set_rules('mail_usuario', 'Mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('contrasenia', 'Contraseña', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $this->iniciarsesion();
        }
    }
    
    function iniciarsesion(){
        $email = $this->input->post('mail_usuario');
        $contra = $this->input->post('contrasenia');
        $resultado = $this->usuario_model->obtenerDatosSesion($email);
        if($resultado != NULL){
            if($resultado->contraseña_usuario == $contra){
                $data = array(
                    'email' => $email,
                    'id' => $resultado->id_usuario,
                    'nombre' => $resultado->nombre_usuario,
                    'apellido' => $resultado->apellido_usuario,
                    'es_administrador' => $resultado->es_administrador,
                    'login' => TRUE,
                );
                $this->session->set_userdata($data);
                $parameter['head'] = array(
                    "css2" => link_tag('css/imagen_principal.css'),
                    'js' => $this->javascript->external('js/botonAtras.js'),
                    );
                $parameter['image_properties'] = array(
                    'src' => 'images/unagauchada.png',
                    'class' => 'size_image',
                );
                $this->load->view('sesionIniciada',$parameter);
            }
            else{
                echo "Contraseña mal ingresada";
            }
        }else{
            echo "No existe usuario";
        }
    }
    
    function cerrar_sesion(){
        $this->session->sess_destroy();
        header('Location: '. base_url().'inicio');
    }
    
    function verPerfilUsuario(){
        $this->load->view('verPerfilUsuario');
    }
}