<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerCategorias(){
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);
        return $categorias->result();
    }

    function mandarCategoria($data){
    	$sql = "SELECT * FROM categorias WHERE nombre_categorias='$data[nombre]'";
    	$result = $this->db->query($sql);
    	if ($result->num_rows() == 0){
    		$sql = "INSERT INTO `categorias` (`id_categoria`, `nombre_categorias`) VALUES (NULL, '$data[nombre]')";
    		$this->db->query($sql);
    		$parametro['mensaje'] = "Se agregó la nueva categoría ".$data['nombre'];
    		$this->load->view('mensajes',$parametro);
    	}
    	else{
    		$parametro['mensaje'] = "¡Error! La categoría ".$data['nombre']." ya existe";
    		$this->load->view('mensajes',$parametro);
    	}
    }

    function eliminarCategoria($data){
        $sql = "SELECT id_categoria FROM categorias WHERE nombre_categorias='general'";
        $result = $this->db->query($sql);
        $id = $result->result()[0]->id_categoria;
        $sql = "UPDATE favores SET id_categoria=$id WHERE id_categoria=$data[id_categoria]";
        $this->db->query($sql);
        $sql =  "DELETE FROM `categorias` WHERE `categorias`.`id_categoria` = $data[id_categoria]";
        $result = $this->db->query($sql);
        if ($result){
            $parametro['mensaje'] = "Se ha eliminado la categoria";
            $this->load->view('mensajes',$parametro);
        }
        else{
            $parametro['mensaje'] = "Ha habido un error al intentar eliminar la categoria";
            $this->load->view('mensajes',$parametro);
        }
    }

    function modificar($data){
        $sql = "UPDATE categorias SET nombre_categorias='$data[nombre]' WHERE id_categoria=$data[id]";
        $result = $this->db->query($sql);
        if ($result){
            $parametro['mensaje'] = "Se ha modificado la categoria";
            $this->load->view('mensajes',$parametro);
        }
        else{
            $parametro['mensaje'] = "Ha habido un error al intentar modificar la categoria";
            $this->load->view('mensajes',$parametro);
        }
    }
}    