<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mandarDatos extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_creditos($data){
        #$sql = "SELECT creditos_usuario FROM usuarios_registrados WHERE id_usuario=13";
        $result = $this->db->query("SELECT nombre_usuario, apellido_usuario, creditos_usuario FROM usuarios_registrados WHERE id_usuario=25");
        if (($result->num_rows()) > 0) {
        	$var = $result->result()[0];
        	$cant = $var->creditos_usuario;
            $nombre = $var->nombre_usuario;
            $apellido = $var->apellido_usuario;
        	echo "El usuario con id $data[id_usuario] ($nombre $apellido) va a comprar $data[cantidadCreditos] credito y anteriormente tenia $cant<br>";
        }
        $creditos_nuevos = ($cant + $data['cantidadCreditos']);
        echo "Por lo tanto, ahora tiene $creditos_nuevos creditos";
        $this->db->query("UPDATE usuarios_registrados SET creditos_usuario=$creditos_nuevos WHERE id_usuario=25");
    }
}