<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buscarGauchada extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
   public function buscar ($busqueda) {

        
        $sql = "SELECT c.nombre_categorias,l.nombre_localidad,u.nombre_usuario,u.apellido_usuario,f.id_favor,f.titulo_favor,f.contenido_imagen,f.extension_imagen,f.fecha_expiracion FROM favores f INNER JOIN usuarios_registrados u ON(f.id_usuario_dueño=u.id_usuario) INNER JOIN localidades l ON (f.id_localidad=l.id_localidad) INNER JOIN categorias c ON(f.id_categoria=c.id_categoria) WHERE f.titulo_favor LIKE '%".$busqueda."%' AND NOT EXISTS (SELECT *
                                           FROM `se_postula` sp
                                           WHERE (sp.estado='Aceptado' OR sp.estado='Rechazado') AND f.id_favor=sp.id_favor) ORDER BY f.fecha_creacion DESC";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            $parameter['gauchadas'] = $result->result();
             if ($this->session->userdata('login')) {
                $this->load->view('sesioniniciada',$parameter);
            }
            else {
            $this->load->view('inicio',$parameter);  
            }
        }
        else{
            $parameter['noresults'] = "<h1>No hay resultados</h1>";
            if ($this->session->userdata('login')) {
                $this->load->view('sesioniniciada',$parameter);
            }
            else {
             $this->load->view('inicio',$parameter);
            }
        }
   }
}