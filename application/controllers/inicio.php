<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('../controllers/registrousuario');
    }


    public function index(){
        $parameter['head'] = array(
            "css2" => link_tag('css/imagen_principal.css'),
            "css1" => link_tag('css/pagina_inicio.css'),
        );
        $parameter['image_properties'] = array(
          'src' => 'images/unagauchada.png',
           'class' => 'size_image',
           );
        $parameter['submit_registro'] = array(
            'name' => "registro",
            'value' => "Registrarse",
        );
        $parameter['submit_inicio_sesion'] = array(
            'name' => "inicio_sesion",
            'value' => "Iniciar sesión",
        );
        $this->load->view('headers',$parameter);
        $this->load->view('inicio',$parameter);
    }
    
    function redireccionar(){
        if(isset($_POST['registro'])){
            header('Location: '.base_url()."registrousuario");
            }
        else{
            header('Location: '.base_url()."iniciosesion");
        }
    }
}