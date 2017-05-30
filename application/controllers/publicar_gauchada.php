<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicar_gauchada extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('Publicar_gauchada_model');
        $this->load->model('usuario_model');
        $this->load->database();
        $this->validaciones();
    }

	public function index(){
                $parameter['creditos'] = $this->session->userdata('creditos_usuario');
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

        public function obtener_imagen(){
            if($_FILES['pic']['name']){
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
        
        private function validaciones(){
        $this->form_validation->set_message('required', ' Campo obligatorio');
        $this->form_validation->set_message('soloLetras', '%s no válido');
        $this->form_validation->set_message('max_length', 'Descripcion demasiada larga');
        $this->form_validation->set_message('check_default', 'Campo obligatorio');
        $this->form_validation->set_message('comprobarArchivoIngresado', '%s no válida');
        }
        
        public function validar_datos(){
        $this->form_validation->set_rules('titulo', 'Título', 'required|callback_soloLetras');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|max_length[600]');
        $this->form_validation->set_rules('ciudades', 'Localidad', 'required|callback_check_default');
        $this->form_validation->set_rules('categorias', 'categorias', 'required|callback_check_default');
        $this->form_validation->set_rules('cantDias', 'cantDias', 'required');
        $this->form_validation->set_rules('pic', 'Imagen', 'callback_comprobarArchivoIngresado');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $this->mandarDatos();
        }
    }
        
	public function crearFormulario(){
		$formulario['titulo'] = array(
			'name' => 'titulo',
			'size' => 70,
			'maxlength' => 60,
                        'class' => 'tamaño-campos'
		);

		$formulario['descripcion'] = array(
			'name' => 'descripcion',
			'rows' => 10,
			'cols' => 60,
			'maxlength' => 600
		);

		$formulario['cantDias'] = array(
			'name' => 'cantDias',
                        'type' => 'number',
                        'class' => 'tamaño-campos',
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
            $cantDias = $this->input->post('cantDias');
            $url_imagen = $this->obtener_imagen();
            $fecha = date('Y-m-d');
            $nuevafecha = strtotime ( '+'.$cantDias.' day' , strtotime ( $fecha ) ) ;
            $expiracion = date ( 'Y-m-d' , $nuevafecha );
            $data = array(
                'titulo' => $this->input->post('titulo'),
                'descripcion' => $this->input->post('descripcion'),
                'localidad' => $this->input->post('ciudades'),
                'categoria' => $this->input->post('categorias'),
                'expiracion' => $expiracion,
                'contenido_imagen' => $url_imagen['contenido'],
                'extension_imagen' => $url_imagen['extension'],
                'usuario' => $this->session->userdata('id'),
        );
            $this -> Publicar_gauchada_model -> almacenar_gauchada($data);
            $creditos = $this->session->userdata('creditos_usuario');
            $creditos--;
            $parametros = array(
              'id' => $this->session->userdata('id'),
              'creditos' => $creditos,
            );
            $this->usuario_model->actualizarCreditos($parametros);
            $parameter['mensaje'] = 'Gauchada publicada. Creditos ahora: '.$creditos;
            $this->load->view('mensajes',$parameter);
        }
        
        function check_default($post_string){
            return $post_string == '0' ? FALSE : TRUE;
        }
        function soloLetras($in){
            $pattern = "/[^a-zA-Z[:space:]\-_]/";
            if(preg_match($pattern,$in)){
                return false;
            }
            else{ return true;
            }
    }
    
    function correccionFecha($fechaAcomodar){
         $fecha = $fechaAcomodar;
         $correccion = explode('-', $fecha);
         $fecha_sql = $correccion[0]."-".$correccion[2]."-".$correccion[1];
         return $fecha_sql;
     }
     
     function volverAInicio(){
         $data = array(
            'email' => $this->session->userdata('email'),
            'id' => $this->session->userdata('id'),
            'nombre' => $this->session->userdata('nombre'),
            'apellido' => $this->session->userdata('apellido'),
            'es_administrador' => $this->session->userdata('es_administrador'),
            'login' => TRUE,
         );
         $this->session->set_userdata($data);
                $this->load->view('sesionIniciada');
     }
}