<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicar_gauchada_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_gauchada($data){
        $this->db->insert('favores',array(
            'fecha_expiracion' => $data['expiracion'],
            'contenido_imagen' => $data['contenido_imagen'],
            'extension_imagen' => $data['extension_imagen'],
            'contenido_favor' => $data['descripcion'],
            'id_categoria' => $data['categoria'],
            'id_localidad' => $data['localidad'],
            'id_usuario_dueño' => $data['usuario'],
        ));
    }

}