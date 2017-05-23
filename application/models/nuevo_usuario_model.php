<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nuevo_usuario_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_usuario($data){
        $this->db->insert('usuarios_registrados',array(
            'nombre_usuario' => $data['nombre_usuario'],
            'id_localidad' => $data['id_localidad'],
            'foto_usuario' => $data['foto_usuario'],
            'extension_foto' => $data['extension_foto'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
                ));
    }
}