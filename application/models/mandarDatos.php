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
    
    function registrarCompra($data){
        $this->db->insert('compras',array(
            'cantidad_creditos' => $data['cantidadCreditos'],
            'valor_total' => $data['valor_compra'],
            'fecha_compra' => date("Y-m-d")
        ));
    }
    
    function obtenerCompras($data){
        $consulta = $this->db->query("SELECT * FROM compras WHERE fecha_compra BETWEEN '".$data['primeraFecha']."' AND '".$data['segundaFecha']."' ORDER BY fecha_compra");
        return $consulta;
    }
    
    function almacenarPregunta($data){
        $sql = "INSERT INTO `preguntas` (`id_pregunta`, `contenido_pregunta`, `contenido_respuesta`, `id_favor`, `id_usuario`) VALUES (NULL, '$data[pregunta]', '', '$data[id_favor]', '$data[id_usuario]')";
        $this->db->query($sql);
    }
    function obtenerPreguntas($data){
        $id = $data['id_favor'];
        $sql = "SELECT p.id_pregunta, p.contenido_pregunta,p.contenido_respuesta,ur.nombre_usuario,ur.apellido_usuario FROM `preguntas` p INNER JOIN `usuarios_registrados` ur ON (p.id_usuario=ur.id_usuario) WHERE p.id_favor=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    function almacenarRespuesta($data){
        $sql = "UPDATE `preguntas` SET `contenido_respuesta` = '$data[respuesta]' WHERE `preguntas`.`id_favor` = $data[id_favor] and `preguntas`.`id_pregunta` = $data[id_pregunta]  ";
        $this->db->query($sql);
    }
}