<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicar_gauchada extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Publicar_gauchada_model');
        $this->load->database();
        $this->validaciones();
    }

	public function index(){
		$parameter['title'] = 'Una Gauchada';
	    $parameter['mensaje'] = 'Publicar gauchada';
	    $parameter['image_properties'] = array(
	      'src' => 'images/unagauchada.png',
	       'class' => 'size_image',
	     );
		$parameter['form'] = $this->crearFormulario();
		$parameter['localidades'] = $this->db->get('localidades')->result();
		$parameter['categorias'] = $this->db->get('categorias')->result();
		$this->load->view('Publicar_gauchada',$parameter);
	}

        private function validaciones(){
        $this->form_validation->set_message('required', ' Campo obligatorio');
        $this->form_validation->set_message('check_default', 'Campo obligatorio');
        $this->form_validation->set_message('valid_date', '%s no válida');
        $this->form_validation->set_message('matches', 'Contraseñas no coinciden');
        $this->form_validation->set_message('soloLetras', '%s no válido');
        $this->form_validation->set_message('soloNumeros', '%s no válido');
        $this->form_validation->set_message('valid_email', '%s no válido');
        $this->form_validation->set_message('comprobarArchivoIngresado', '%s no válida');
        $this->form_validation->set_message('is_unique', '%s ya existe'); 
        $this->form_validation->set_message('mayor_de_edad', 'Eres menor de 18 años');
        $this->form_validation->set_message('min_length', 'Numero de telefono demasiado corto');
        $this->form_validation->set_message('max_length', 'Numero de telefono demasiado largo');
        }
        
        public function validar_datos(){
        $this->form_validation->set_rules('nombre_usuario', 'titulo', 'required|callback_soloLetras');
        $this->form_validation->set_rules('apellido_usuario', 'Apellido', 'required|callback_soloLetras');
        $this->form_validation->set_rules('ciudades', 'Localidad', 'required|callback_check_default');
        $this->form_validation->set_rules('fecha', 'Fecha de nacimiento', 'trim|required|callback_valid_date|callback_mayor_de_edad');
        $this->form_validation->set_rules('mail_usuario', 'Mail', 'trim|required|valid_email|is_unique[usuarios_registrados.mail_usuario]');
        $this->form_validation->set_rules('telefono_usuario', 'Telefono', 'trim|required|callback_soloNumeros|min_length[8]|max_length[12]|is_unique[usuarios_registrados.telefono_usuario]');
        $this->form_validation->set_rules('contrasenia_primera', 'Contraseña', 'required');
        $this->form_validation->set_rules('contrasenia_repetida', 'Repetir contraseña', 'required|matches[contrasenia_primera]');
        $this->form_validation->set_rules('pic', 'Imagen', 'callback_comprobarArchivoIngresado');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $this->almacenar_datos();
        }
    }
        
	public function crearFormulario(){
		$formulario['titulo'] = array(
			'name' => 'titulo',
			'size' => 70,
			'maxlength' => 60
		);

		$formulario['descripcion'] = array(
			'name' => 'descripcion',
			'rows' => 10,
			'cols' => 60,
			'maxlength' => 600
		);

		$formulario['cantDias'] = array(
			'name' => 'cantDias',
                        'type' => 'number'
		);

		$formulario['imagen'] = array(
            'type' => 'file',
            'enctype' => 'multipart/form-data',
            'name' => 'pic',
        );
		return $formulario;
	}

	public function mandarDatos(){
		#Con esta funcion hay que mandar los datos al modelo Publicar_gauchada para que los suba a la BBDD

		$data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion'),
            'localidad' => $this->input->post('ciudades'),
            'categoria' => $this->input->post('categorias'),
            'cantDias' => $this->input->post('cantDias'),
            'imagen' => $this->input->post('pic')        
        );
                
                $this -> Publicar_gauchada_model -> almacenar_creditos($data);
	}
	    
        public function obtener_imagen(){
            if($_FILES['pic']){
                $image = $_FILES['pic'];
                $var = array(
			'type' => $image['type'],
			'tmp_name' => $image['tmp_name']
                );
                $pepe = file_get_contents($var['tmp_name']);
                $pepe2 = $var['type'];
                $propiedades_imagen['contenido'] = $pepe;
                $propiedades_imagen['extension'] = $pepe2;
                }
            else{
                $propiedades_imagen['contenido'] = NULL;
                $propiedades_imagen['extension'] = NULL;}
            return $propiedades_imagen;
    }

    function comprobarArchivoIngresado(){
        if($_FILES['pic']['name']){
            $extension_archivo = end(explode(".", $_FILES['pic']['name']));
            if(($extension_archivo == 'jpg') || ($extension_archivo == 'png') || ($extension_archivo == 'jpeg')) {
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }


}