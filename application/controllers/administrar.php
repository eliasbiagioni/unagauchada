<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrar extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('categorias');
    }
     
    public function index(){
        $this->load->view('administrar');
    }


    public function verCategorias(){
    	$parametro['categorias'] = $this->categorias->obtenerCategorias();
    	$this->load->view('categorias',$parametro);
    }   
    
}

?>        