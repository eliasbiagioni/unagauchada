<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mandarDatos extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_creditos($data){
        $result = $this->db->query("SELECT creditos_usuario FROM usuarios_registrados WHERE id_usuario='".$data['id']."'");
        $var = $result->result()[0];
        $cant = $var->creditos_usuario;
        $creditos_nuevos = ($cant + $data['cantidadCreditos']);
        $this->db->query("UPDATE usuarios_registrados SET creditos_usuario=$creditos_nuevos WHERE id_usuario='".$data['id']."'");
        return $creditos_nuevos;
    }
}