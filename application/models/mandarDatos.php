<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mandarDatos extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_creditos($data){
        $result = $this->db->query("SELECT creditos_usuario FROM usuarios_registrados WHERE id_usuario='".$data['id']."'");
        $var = $result->result()[0];
        $cant = $var->creditos_usuario;
        $creditos_nuevos = ($cant + $data['cantidadCreditos']);
        $this->db->query("UPDATE usuarios_registrados SET creditos_usuario=$creditos_nuevos WHERE id_usuario='".$data['id']."'");
        return $creditos_nuevos;
    }

    function almacenarPregunta($data){
        $sql = "INSERT INTO `preguntas` (`id_pregunta`, `contenido_pregunta`, `contenido_respuesta`, `id_favor`, `id_usuario`) VALUES (NULL, '$data[pregunta]', '', '$data[id_favor]', '$data[id_usuario]')";
        $this->db->query($sql);
    }
    function obtenerPreguntas($data){
        $id = $data['id_favor'];
        $sql = "SELECT p.contenido_pregunta,p.contenido_respuesta,ur.nombre_usuario,ur.apellido_usuario FROM `preguntas` p INNER JOIN `usuarios_registrados` ur ON (p.id_usuario=ur.id_usuario) WHERE p.id_favor=$id";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function almacenarRespuesta($data){
        $sql = "UPDATE `preguntas` SET `contenido_respuesta` = '$data[respuesta]' WHERE `preguntas`.`id_favor` = $data[id_favor] ";
        $this->db->query($sql);
    }
}