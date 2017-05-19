<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
    }


    public function index(){
        $parameter['title'] = 'Una Gauchada';
        $parameter['mensaje'] = 'Bienvenido al sitio';
        $parameter['image_properties'] = array(
          'src' => 'images/unagauchada.png',
           'class' => 'size_image',
           );
        $this->load->view('vista_generica', $parameter);
    }
}
