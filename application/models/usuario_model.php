<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_usuario($data){
        $this->db->insert('usuarios_registrados',array(
            'nombre_usuario' => $data['nombre_usuario'],
            'apellido_usuario' => $data['apellido_usuario'],
            'es_administrador' => $data['es_administrador'],
            'id_localidad' => $data['id_localidad'],
            'foto_usuario' => $data['foto_usuario'],
            'extension_foto' => $data['extension_foto'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'telefono_usuario' => $data['telefono_usuario'],
            'mail_usuario' => $data['mail_usuario'],
            'puntos_usuario' => $data['puntos_usuario'],
            'creditos_usuario' => $data['puntos_usuario'],
            'contraseña_usuario' => $data['contraseña_usuario'],
            'sexo_usuario' => $data['sexo_usuario'],
                ));
    }
}