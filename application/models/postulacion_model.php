<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postulacion_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function postularNuevoCandidato($datos){
        $this->db->insert('se_postula', array(
            'id_favor' => $datos['idfavor'],
            'id_usuario' => $datos['idusuario'],
            'comentario' => $datos['comentario'],
            'estado' => 'Pendiente',
        ));
    }
    
    function existePostulacion($datos){
        $consulta = $this->db->query("SELECT id_postulacion FROM se_postula WHERE id_favor = '".$datos['id_favor']."'and id_usuario = '".$datos['id_usuario_postulante']."'");
        return $consulta->num_rows();
        }
        
    function postulantes($id_favor){
        $contulta = $this->db->query("SELECT ur.id_usuario,ur.nombre_usuario,ur.apellido_usuario,ur.puntos_usuario,sp.comentario,sp.respuesta,sp.id_postulacion,sp.estado FROM `se_postula` sp INNER JOIN `usuarios_registrados` ur ON (sp.id_usuario=ur.id_usuario) WHERE id_favor='".$id_favor."'");
        return $contulta;
    }
    
    function cancelarCandidatura($datos){
        $this->db->query("DELETE FROM se_postula WHERE id_favor='".$datos['id_favor']."'and id_usuario='".$datos['id_postulante']."'");
    }
    
    function guardarRespuesta($datos){
        $this->db->query("UPDATE se_postula SET respuesta='".$datos['respuesta']."'WHERE id_postulacion='".$datos['id_postulacion']."'");
    }
    
    function seleccionarCandidato($datos){
        $this->db->query("UPDATE se_postula SET estado='"."Aceptado"."' WHERE id_favor='".$datos['id_favor']."'AND id_usuario='".$datos['id_postulante']."'");
        $this->db->query("UPDATE se_postula SET estado='"."Rechazado"."' WHERE id_favor='".$datos['id_favor']."'AND id_usuario!='".$datos['id_postulante']."'");
    }
    function eliminarCandidatura($datos){
        $this->db->query("UPDATE se_postula SET estado='"."Pendiente"."' WHERE id_favor='".$datos['id_favor']."'");
    }
}