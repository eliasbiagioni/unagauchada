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
            $sql = "UPDATE usuarios_registrados SET nombre_usuario='$parametros[nombre]',apellido_usuario='$parametros[apellido]', fecha_nacimiento='$parametros[fecha_nacimiento]',foto_usuario='$parametros[imagen]', extension_foto='$parametros[extension]',telefono_usuario='$parametros[telefono]', id_localidad='$parametros[localidad]' WHERE id_usuario=$parametros[id]";
        }
        else {
           $sql = "UPDATE usuarios_registrados SET nombre_usuario='$parametros[nombre]',apellido_usuario='$parametros[apellido]', fecha_nacimiento='$parametros[fecha_nacimiento]', telefono_usuario='$parametros[telefono]', id_localidad='$parametros[localidad]' WHERE id_usuario=$parametros[id]";

        }
        $this->db->query($sql);
    }
    
    function sumarPunto($idusuario){
        $puntos = $this->db->query("SELECT puntos_usuario FROM usuarios_registrados WHERE id_usuario='".$idusuario."'")->result()[0]->puntos_usuario;
        $puntos++;
        $this->db->query("UPDATE usuarios_registrados SET puntos_usuario='".$puntos."'WHERE id_usuario='".$idusuario."'");
    }
    
    function restarPuntos($idusuario){
        $puntos = $this->db->query("SELECT puntos_usuario FROM usuarios_registrados WHERE id_usuario='".$idusuario."'")->result()[0]->puntos_usuario;
        $puntos = ($puntos-2);
        $this->db->query("UPDATE usuarios_registrados SET puntos_usuario='".$puntos."'WHERE id_usuario='".$idusuario."'");
    }
    function usuariosSinCalificar($idLogueado){
        $consulta = $this->db->query("SELECT ur.nombre_usuario,ur.apellido_usuario,f.titulo_favor,f.id_favor,ur.id_usuario FROM `usuarios_registrados` ur INNER JOIN `se_postula` sp ON (ur.id_usuario=sp.id_usuario) INNER JOIN `favores` f ON (sp.id_favor=f.id_favor) WHERE sp.estado='Aceptado' AND f.id_usuario_dueño='".$idLogueado."' AND NOT EXISTS (SELECT * FROM calificaciones c WHERE c.id_favor=sp.id_favor)");
        return $consulta;
    }
    
    function obtenerNombre($id){
        $consulta = $this->db->query("SELECT ur.nombre_usuario,ur.apellido_usuario FROM usuarios_registrados ur WHERE id_usuario='".$id."'");
        return $consulta->result()[0];
    }   

    function obtenerRanking($data){
        if ($data['cuantos'] != -1)
            $sql = "SELECT * FROM usuarios_registrados ORDER BY puntos_usuario DESC LIMIT $data[cuantos]";
        else {
            $sql = "SELECT * FROM usuarios_registrados ORDER BY puntos_usuario DESC";
        }
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    function eliminarUsuario($idLogueado){
        $this->db->query("DELETE FROM `usuarios_registrados` WHERE id_usuario='".$idLogueado."'");
    }
}