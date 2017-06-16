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
                ));
    }
    
    function obtenerDatosSesion($email = ''){
        $consulta = $this->db->query("SELECT * FROM usuarios_registrados WHERE mail_usuario = '".$email ."'");
        if($consulta->num_rows() > 0){
            return $consulta->row();
        }else{
            return NULL;
        }
    }
    
    function cant_creditos($idLogueado){
        return $this->db->query("SELECT creditos_usuario FROM usuarios_registrados WHERE id_usuario = '".$idLogueado."'")->row();
    }
    
    function actualizarCreditos($parametros){
        $this->db->query("UPDATE usuarios_registrados SET creditos_usuario = '".$parametros['creditos']."' WHERE id_usuario = '".$parametros['id']."'");
    }

    function actualizarPerfil($parametros){
        if ($parametros['imagen'] != NULL) {
            $sql = "UPDATE usuarios_registrados SET nombre_usuario='$parametros[nombre]',apellido_usuario='$parametros[apellido]', fecha_nacimiento='$parametros[fecha_nacimiento]',foto_usuario='$parametros[imagen]', extension_foto='$parametros[extension]',telefono_usuario='$parametros[telefono]' WHERE id_usuario=$parametros[id]";
        }
        else {
           $sql = "UPDATE usuarios_registrados SET nombre_usuario='$parametros[nombre]',apellido_usuario='$parametros[apellido]', fecha_nacimiento='$parametros[fecha_nacimiento]', telefono_usuario='$parametros[telefono]' WHERE id_usuario=$parametros[id]";

        }
        $this->db->query($sql);
    }
}