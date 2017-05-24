<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrousuario extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('nuevo_usuario_model');
        $this->load->database();
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', ' Campo obligatorio: %s');
        $this->form_validation->set_message('check_default', 'Campo obligatorio: %s');
        $this->form_validation->set_message('valid_date', 'Campo obligatorio: %s');
    }


    public function index(){
        $parameter['title'] = 'Una Gauchada';
        $parameter['mensaje'] = 'Bienvenido al sitio';
        $parameter['image_properties'] = array(
          'src' => 'images/unagauchada.png',
           'class' => 'size_image',
           );
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
                'type' => 'number',
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
        $parameter['sexo_hombre'] = array(
                'type' => 'radio',
                'name' => 'sexo',
                'value' => 'hombre',
            );
        $parameter['sexo_mujer'] = array(
                'type' => 'radio',
                'name' => 'sexo',
                'value' => 'mujer',
            );
        $parameter['localidades'] = $this->db->get('localidades')->result();
        $this->load->view('registro_usuario',$parameter);
    }

    public function almacenar_datos(){
        $url_imagen = $this->comprobar_imagen();
        $data = array(
            'nombre_usuario' => $this->input->post('nombre_usuario'),
            'id_localidad' => 1,
            'foto_usuario' => $url_imagen['contenido'],
            'extension_foto' => $url_imagen['extension'],
            'fecha_nacimiento' => $this->input->post('fecha'),
        );
        $this->nuevo_usuario_model->almacenar_usuario($data);
        $this->index();
    }
    
    private function comprobar_imagen(){
        if($_FILES['pic']['name']){
            $nombre = $_FILES['pic']['name'];
            $extension = end(explode(".", $_FILES['pic']['name']));
            $tmp = $_FILES['pic']['tmp_name'];
            $url = "./images/uploads/".uniqid(rand()).$nombre;
            move_uploaded_file($tmp, $url);
            $contenido = file_get_contents($url);
            $propiedades_imagen['contenido'] = $contenido;
            $propiedades_imagen['extension'] = $extension;
        }
        else{
            $propiedades_imagen['contenido'] = NULL;
            $propiedades_imagen['extension'] = NULL;
        }
        return $propiedades_imagen;
    }
    
    public function validar_datos(){
        $this->form_validation->set_rules('nombre_usuario', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido_usuario', 'Apellido', 'required');
        $this->form_validation->set_rules('ciudades', 'Localidad', 'required|callback_check_default');
        $this->form_validation->set_rules('fecha', 'Fecha de nacimiento', 'trim|required|callback_valid_date');
        $this->form_validation->set_rules('mail_usuario', 'Mail', 'required');
        $this->form_validation->set_rules('contrasenia_primera', 'Contraseña', 'required');
        $this->form_validation->set_rules('contrasenia_repetida', 'Repetir contraseña', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
    }
    
    function check_default($post_string){
        return $post_string == '0' ? FALSE : TRUE;
    }
    
    public function valid_date($date){
        if (!DateTime::createFromFormat('d-m-y', $date)) //yes it's YYYY-MM-DD
        {
            return FALSE;
        }
        else    
        {
            return TRUE;
        }
    }
}
