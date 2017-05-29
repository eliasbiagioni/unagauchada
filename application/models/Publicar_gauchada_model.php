<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicar_gauchada_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function almacenar_creditos($data){
        echo $data['titulo'];
        echo "<br>";
        echo $data['descripcion'];
        echo "<br>";
        echo $data['localidad'];
        echo "<br>";
        echo $data['categoria'];
        echo "<br>";
        echo $data['cantDias'];
    }

}