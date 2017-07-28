<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logros_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerLogros(){
        $consulta = $this->db->query("SELECT * FROM `tabla_reputacion` tr ORDER BY tr.puntaje_minimo ");
        return $consulta;
    }
    
    function nuevoLogro($data){
        $this->db->insert('tabla_reputacion',array(
            'nombre_reputacion' => $data['nombre_reputacion'],
            'puntaje_minimo' => $data['puntaje_minimo'],
        ));
    }
    
    function actualizarLogroCompleto($data){
        $this->db->query("UPDATE tabla_reputacion SET nombre_reputacion='".$data['nombre_reputacion']."', puntaje_minimo='".$data['puntaje_minimo']."' WHERE id_reputacion='".$data['id']."'");
    }
    
    function actualizarPuntajeLogro($data){
        $this->db->query("UPDATE tabla_reputacion SET puntaje_minimo='".$data['puntaje_minimo']."' WHERE id_reputacion='".$data['id']."'");
    }
    
    function eliminarLogro($id){
        $this->db->query("DELETE FROM tabla_reputacion WHERE id_reputacion='".$id."'");
    }
}
?>