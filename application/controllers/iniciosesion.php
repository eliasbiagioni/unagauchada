<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iniciosesion extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $parameter['head'] = array(
            "css2" => link_tag('css/imagen_principal.css'),
        );
        $parameter['image_properties'] = array(
          'src' => 'images/unagauchada.png',
           'class' => 'size_image',
           );
        $this->load->view('headers',$parameter);
        $this->load->view('iniciosesion');
    }
}