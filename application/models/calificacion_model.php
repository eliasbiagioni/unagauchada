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
}    