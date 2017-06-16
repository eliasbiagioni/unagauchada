<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrousuario extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->validaciones();
    }
    
    private function validaciones(){
        $this->form_validation->set_message('required', ' Campo obligatorio');
        $this->form_validation->set_message('check_default', 'Campo obligatorio');
        $this->form_validation->set_message('valid_date', '%s no válida');
        $this->form_validation->set_message('matches', 'Contraseñas no coinciden');
        $this->form_validation->set_message('soloLetras', '%s no válido, solo letras');
        $this->form_validation->set_message('soloNumeros', '%s no válido, solo números');
        $this->form_validation->set_message('valid_email', '%s no válido');
        $this->form_validation->set_message('comprobarArchivoIngresado', '%s no válida');
        $this->form_validation->set_message('is_unique', '%s ya existe'); 
        $this->form_validation->set_message('mayor_de_edad', 'Eres menor de 18 años');
        $this->form_validation->set_message('min_length', 'Numero de telefono demasiado corto');
        $this->form_validation->set_message('max_length', 'Numero de telefono demasiado largo');
    }

    public function index(){
        $parameter['nombre_usuario'] = array(
                'name' => 'nombre_usuario',
                'placeholder' => 'Escribe tu nombre',
                'class' => 'tamaño-campos',
            );
        $parameter['apellido_usuario'] = array(
                'name' => 'apellido_usuario',
                'placeholder' => 'Escribe tu apellido',
                'class' => 'tamaño-campos',
            );
        $parameter['telefono_usuario'] = array(
                'type' => 'text',
                'name' => 'telefono_usuario',
                'placeholder' => 'Escribe tu numero de telefono',
                'class' => 'tamaño-campos',
            );
        $parameter['mail_usuario'] = array(
                'name' => 'mail_usuario',
                'placeholder' => 'Escribe tu cuenta de mail',
                'class' => 'tamaño-campos',
            );
        $parameter['contrasenia_primera'] = array(
                'type' => 'password',
                'name' => 'contrasenia_primera',
                'placeholder' => 'Escribe tu contraseña',
                'class' => 'tamaño-campos',
            );
        $parameter['contrasenia_repetida'] = array(
                'type' => 'password',
                'name' => 'contrasenia_repetida',
                'placeholder' => 'Repetir contraseña',
                'class' => 'tamaño-campos',
            );
        $parameter['mail_usuario'] = array(
                'name' => 'mail_usuario',
                'placeholder' => 'Escribe tu cuenta de mail',
                'class' => 'tamaño-campos',
            );
        $parameter['fecha'] = array(
                'type' => 'text',
                'name' => 'fecha',
                'placeholder' => 'dd/mm/yyyy',
                'class' => 'tamaño-campos',
            );
        $parameter['imagen_usuario'] = array(
            'type' => 'file',
            'enctype' => 'multipart/form-data',
            'name' => 'pic',
        );
        $parameter['localidades'] = $this->db->get('localidades')->result();
        $this->load->view('registro_usuario',$parameter);
    }

    public function almacenar_datos(){
        $url_imagen = $this->obtener_imagen();
        $fecha = $this->correccionFecha();
        $data = array(
            'nombre_usuario' => $this->input->post('nombre_usuario'),
            'apellido_usuario' => $this->input->post('apellido_usuario'),
            'id_localidad' => $this->input->post('ciudades'),
            'fecha_nacimiento' => $fecha,
            'es_administrador' => FALSE,
            'telefono_usuario' => $this->input->post('telefono_usuario'),
            'mail_usuario' => $this->input->post('mail_usuario'),
            'puntos_usuario' => 1,
            'creditos_usuario' => 1,
            'contraseña_usuario' => $this->input->post('contrasenia_primera'),
            'foto_usuario' => $url_imagen['contenido'],
            'extension_foto' => $url_imagen['extension'],
            );
        $this->usuario_model->almacenar_usuario($data);
        $parameter['mensaje'] = 'Registro exitoso';
        $this->load->view('mensajes',$parameter);
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
    public function validar_datos(){
        $this->form_validation->set_rules('nombre_usuario', 'Nombre', 'trim|required|callback_soloLetras');
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
    
    function check_default($post_string){
        return $post_string == '0' ? FALSE : TRUE;
    }
    
    function valid_date($date){
    $pattern="/^(0?[1-9]|[12][0-9]|3[01])[\/|-](0?[1-9]|[1][012])[\/|-]((19|20)?[0-9]{2})$/";
    if(preg_match($pattern,$date)){
        $values=preg_split("[\/|-]",$date);
        if(checkdate($values[1],$values[0],$values[2])){
            return true;
        }
    }
    return false;
    }
    #"|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|"
    #"/[^a-zA-Z[:space:]\-_]/" 
    function soloLetras($in){
        $pattern = "/[^a-zA-Z[:space:]\-_]/";
        if(preg_match($pattern,$in)){
            return false;
        }
        else{ return true;
        }
    }
    
    function soloNumeros($in){
        $pattern = "/[^0-9\-_]/";
        if(preg_match($pattern,$in)){
            return false;
        }
        else{ return true;
        }
    }
     function mayor_de_edad($fecha){
        $fecha1 = str_replace("/","-",$fecha);
        $fecha2 = date('Y/m/d',strtotime($fecha1));
        $hoy = date('Y/m/d');
        $edad = $hoy - $fecha2;
        if($edad >= 18){return TRUE;}else{return FALSE;}
     }
     function correccionFecha(){
         $fecha = $this->input->post('fecha');
         $correccion = explode('/', $fecha);
         $fecha_sql = $correccion[2]."-".$correccion[1]."-".$correccion[0];
         return $fecha_sql;
     }
    
}