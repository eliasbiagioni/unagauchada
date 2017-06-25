<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verPerfil extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('javascript');
        $this->load->model('usuario_model');
        $this->load->model('Publicar_gauchada_model');
        $this->load->database();
    }

	public function index(){
		if (isset($_GET['mail'])){
			$email = $_GET['mail'];
			$parametro['usuario'] = $this->usuario_model->obtenerDatosSesion($email);
			$parametro['propio'] = 1;
			$id_l = $parametro['usuario']->id_localidad;
			$parametro['localidad'] = $this->db->query("SELECT nombre_localidad FROM localidades WHERE id_localidad=$id_l")->row();
			$this->load->view('verPerfilUsuario',$parametro);
		}
		elseif (isset($_GET['id'])){
			$id = $_GET['id'];
			$resultado = $this->db->query("SELECT * FROM usuarios_registrados WHERE id_usuario=$id");
			$parametro['usuario'] = $resultado->row();
			$parametro['propio'] = 0;
			$id_l = $parametro['usuario']->id_localidad;
			$parametro['localidad'] = $this->db->query("SELECT nombre_localidad FROM localidades WHERE id_localidad=$id_l")->row();
			$this->load->view('verPerfilUsuario',$parametro);
		}

	}

	public function editarPerfil(){
		$email = $this->session->userdata('email');
		$parametro['localidades'] = $this->db->get('localidades')->result();
		$parametro['usuario'] = $this->usuario_model->obtenerDatosSesion($email);
		$this->load->view('editarPerfil',$parametro);

	}

	public function actualizarPerfil(){
		$url_imagen = $this->obtener_imagen();
		$nuevosDatos = array(
			'id' => $this->session->userdata('id'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'), 
			'fecha_nacimiento' => $this->input->post('nacimiento'), 
			'telefono' => $this->input->post('telefono'),
			'localidad' => $this->input->post('localidad'), 
			'imagen' => $url_imagen['contenido'],
			'extension' => $url_imagen['extension'],
		);
		$this -> usuario_model -> actualizarPerfil($nuevosDatos);
		$this->session->set_userdata('nombre',$nuevosDatos['nombre']); 
		$this->session->set_userdata('apellido',$nuevosDatos['apellido']); 
		$parametro['mensaje'] = 'Se ha actualizado tu Perfil';
        $this->load->view('mensajes',$parametro);
	}

	public function verMisGauchadas(){
		$id = $this->session->userdata('id');
		$parameter['gauchadas'] = $this->Publicar_gauchada_model->obtenerMisGauchadas($id);
		$parameter['misGauchadas'] = "Estas son tus Gauchadas";
		$parameter['soloVolver'] = TRUE;
        $this->load->view('sesioniniciada',$parameter);

	}

	public function verGauchadasQueMePostule(){

	}

	public function obtener_imagen(){
            if($_FILES['imagen']['name']){
                $image = $_FILES['imagen'];
                $var = array(
					'type' => $image['type'],
					'tmp_name' => $image['tmp_name']
                );
                $pepe = addslashes(file_get_contents($var['tmp_name']));
                $pepe2 = $var['type'];
                $propiedades_imagen['contenido'] = $pepe;
                $propiedades_imagen['extension'] = $pepe2;
                }
            else{
                $propiedades_imagen['contenido'] = NULL;
                $propiedades_imagen['extension'] = NULL;}
            return $propiedades_imagen;
    }

}