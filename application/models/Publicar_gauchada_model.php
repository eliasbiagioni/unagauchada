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
            'titulo_favor' => $data['titulo'],
        ));
    }
    
    function obtenerGauchadas(){
        $consulta = $this->db->query("SELECT c.nombre_categorias,l.nombre_localidad,u.nombre_usuario,u.apellido_usuario,f.id_favor,f.titulo_favor,f.contenido_imagen,f.extension_imagen,f.fecha_expiracion FROM favores f INNER JOIN usuarios_registrados u ON(f.id_usuario_dueño=u.id_usuario) INNER JOIN localidades l ON (f.id_localidad=l.id_localidad) INNER JOIN categorias c ON(f.id_categoria=c.id_categoria) ORDER BY f.fecha_expiracion ASC");
        return $consulta->result();
    }
    
    function obtenerGauchadaCompleta($id_favor){
        $consulta = $this->db->query("SELECT f.id_localidad,f.id_categoria,f.id_favor,f.fecha_expiracion,f.contenido_imagen,f.extension_imagen, f.contenido_favor,l.nombre_localidad,c.nombre_categorias,f.postulante_designado,ur.nombre_usuario,ur.apellido_usuario,f.titulo_favor,f.id_usuario_dueño FROM favores f INNER JOIN usuarios_registrados ur ON(f.id_usuario_dueño = ur.id_usuario) INNER JOIN localidades l ON (f.id_localidad=l.id_localidad) INNER JOIN categorias c ON (f.id_categoria=c.id_categoria) WHERE f.id_favor=$id_favor");
        return $consulta->row();
    }

    function obtenerMisGauchadas($id){
        $consulta = $this->db->query("SELECT c.nombre_categorias,l.nombre_localidad,u.nombre_usuario,u.apellido_usuario,f.id_favor,f.titulo_favor,f.contenido_imagen,f.extension_imagen,f.fecha_expiracion FROM favores f INNER JOIN usuarios_registrados u ON(f.id_usuario_dueño=u.id_usuario) INNER JOIN localidades l ON (f.id_localidad=l.id_localidad) INNER JOIN categorias c ON(f.id_categoria=c.id_categoria) WHERE id_usuario_dueño='$id' ORDER BY f.fecha_expiracion ASC ");
        return $consulta->result();
    }

    function actualizar_gauchada($data){
        $this->db->query("UPDATE favores SET fecha_expiracion='".$data['expiracion']."',contenido_imagen='".$data['contenido_imagen']."',extension_imagen='".$data['extension_imagen']."',contenido_favor='".$data['descripcion']."',id_categoria='".$data['categoria']."',id_localidad='".$data['localidad']."',id_usuario_dueño='".$data['usuario']."',titulo_favor='".$data['titulo']."'WHERE id_favor='".$data['idfavor']."'");
    }
    
    function existeGauchadaSinCalificar($idfavor){
        $consulta = $this->db->query("");
    }
}