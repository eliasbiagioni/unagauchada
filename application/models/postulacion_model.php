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
            'titulo_gauchada' => $datos['tituloGauchada']
        ));
    }
    
    function existePostulacion($datos){
        $consulta = $this->db->query("SELECT id_postulacion FROM se_postula WHERE id_favor = '".$datos['id_favor']."'and id_usuario = '".$datos['id_usuario_postulante']."'");
        return $consulta->num_rows();
        }
        
    function postulantes($id_favor){
        $consulta = $this->db->query("SELECT ur.telefono_usuario,ur.mail_usuario,ur.id_usuario,ur.nombre_usuario,ur.apellido_usuario,ur.puntos_usuario,sp.comentario,sp.respuesta,sp.id_postulacion,sp.estado FROM `se_postula` sp INNER JOIN `usuarios_registrados` ur ON (sp.id_usuario=ur.id_usuario) WHERE id_favor='".$id_favor."' ORDER BY ur.puntos_usuario DESC");
        return $consulta;
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
    public function nombre_logro($id_usuario){
        $consulta = $this->db->query("SELECT tr.nombre_reputacion, MAX(tr.puntaje_minimo), ur.nombre_usuario,ur.puntos_usuario FROM `usuarios_registrados` ur INNER JOIN `tabla_reputacion` tr WHERE ur.id_usuario='".$id_usuario."' AND tr.puntaje_minimo = (SELECT MAX(tre.puntaje_minimo) FROM `tabla_reputacion` tre WHERE tre.puntaje_minimo <= ur.puntos_usuario)");
        return $consulta->result()[0];
    }
}