<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerCategorias(){
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);
        return $categorias->result();
    }
    
    
}    