<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calificacion_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function existeCalificacion($datos){
        $consulta = $this->db->query("SELECT id_calificacion FROM calificaciones WHERE id_favor='".$datos['idFavor']."'and id_usuario='".$datos['idPostulante']."'");
        return $consulta->num_rows();
    }
    
    function agregarNuevaCalificacion($datos){
        $this->db->insert('calificaciones', array(
            'nombre_usuario_calificado' => $datos['nombreusuariocalificar'],
            'nombre_usuario_calificador' => $datos['nombreusuariocalificador'],
            'titulo_gauchada' => $datos['titulogauchada'],
            'calificacion' => $datos['calificacion'],
            'comentario' => $datos['comentario'],
            'id_usuario' => $datos['idusuario'],
            'id_favor' => $datos['idfavor'],
            'id_usuario_calificador' => $datos['idusuariocalificador'],
        ));
    }
    
    function existeAceptado($id_favor){
        $consulta = $this->db->query("SELECT sp.id_usuario FROM favores f INNER JOIN se_postula sp ON(f.id_favor=sp.id_favor) WHERE estado='"."Aceptado"."' and sp.id_favor='".$id_favor."'");
        if($consulta->num_rows() > 0){
            return $consulta->result()[0]->id_usuario;
        }
        return 0;
    }
    
    function obtenerCalificacionesDadas($id){
        $consulta = $this->db->query("SELECT c.calificacion,c.nombre_usuario_calificado,c.titulo_gauchada FROM calificaciones c Where c.id_usuario_calificador='".$id."'");
        return $consulta;
    }
    
    function obtenerCalificacionesRecibidas($id){
        $consulta = $this->db->query("SELECT c.calificacion,c.nombre_usuario_calificador,c.titulo_gauchada FROM calificaciones c Where c.id_usuario='".$id."'");
        return $consulta;
    }
}    