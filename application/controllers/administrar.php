<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrar extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('categorias_model');
        $this->load->model('logros_model');
        $this->load->model('mandarDatos');
        $this->load->model('usuario_model');
        $this->load->library('form_validation');
        $this->validaciones();
    }
     
    public function index(){
        $this->load->view('administrar');
    }


    public function verCategorias(){
    	$parametro['categorias'] = $this->categorias_model->obtenerCategorias();
    	$this->load->view('categorias',$parametro);
    }

    public function agregarCategoria(){
        $this->load->view('agregarCat');
    }

    public function mandarNuevaCategoria(){
        $parametro['nombre'] = $this->input->post('nombreCategoria');
        $this->categorias_model->mandarCategoria($parametro);
    }


    public function eliminarCategoria(){
        $parametro['id_categoria'] = $this->input->get("id");
        $this->categorias_model->eliminarCategoria($parametro);
    }

    public function editarCategoria(){
        $parametro['id'] = $this->input->get("id");
        $parametro['nombre'] = $this->input->get("nombre");
        $this->load->view('editarCategoria',$parametro);
    }

    public function mandarModificada(){
        $parametro['id'] = $this->input->post("id");
        $parametro['nombre'] = $this->input->post("nuevoNombre");
        $this->categorias_model->modificar($parametro);
    }
    
    public function listadoDeLogros(){
        $logros = $this->logros_model->obtenerLogros();
        $parameter['logros'] = $logros->result();
        $this->load->view('logros',$parameter);
    }
    
    private function validaciones(){
        $this->form_validation->set_message('required', ' Campo obligatorio');
        $this->form_validation->set_message('soloLetras', 'El nombre debe estar compuesto por letras unicamente');
        $this->form_validation->set_message('soloNumeros', 'El puntaje debe estar compuesto por números unicamente');
        $this->form_validation->set_message('is_unique', '%s existente');
        $this->form_validation->set_message('valid_date', '%s no válida');
        
    }
    
    public function validarDatos(){
        if($_GET['tipo']==0){
            if($_GET['nombre_rep'] == $this->input->post('nombre_logro')){
                $this->form_validation->set_rules('nombre_logro', 'Nombre del logro', 'trim');
            }else{
                $this->form_validation->set_rules('nombre_logro', 'Nombre del logro', 'trim|required|callback_soloLetras|is_unique[tabla_reputacion.nombre_reputacion]');
            }
            if($_GET['puntaje_rep'] == $this->input->post('puntaje_logro')){
               $this->form_validation->set_rules('puntaje_logro', 'Puntaje del logro', 'trim'); 
            }else{
                $this->form_validation->set_rules('puntaje_logro', 'Puntaje del logro', 'required|callback_soloNumeros|is_unique[tabla_reputacion.puntaje_minimo]');
            }
        }else{
            $this->form_validation->set_rules('nombre_logro', 'Nombre del logro', 'trim|required|callback_soloLetras|is_unique[tabla_reputacion.nombre_reputacion]');
            $this->form_validation->set_rules('puntaje_logro', 'Puntaje del logro', 'required|callback_soloNumeros|is_unique[tabla_reputacion.puntaje_minimo]');
        }
        if ($this->form_validation->run() == false){
            if ($_GET['tipo'] == 0){
                $this->nuevoLogro().'?tipo=0&id='.$_GET['id'].'&nombre_rep='.$_GET['nombre_rep'].'&puntaje_rep='.$_GET['puntaje_rep'];
            }else{
                $this->nuevoLogro().'?tipo=1';
            }
        }else{
            $data = array(
                    'nombre_reputacion' => $this->input->post('nombre_logro'),
                    'puntaje_minimo' => $this->input->post('puntaje_logro')
                );
            if ($_GET['tipo'] == 1){
                $this->logros_model->nuevoLogro($data);    
            }else{
                $data['id'] = $_GET['id'];
                if($_GET['nombre_rep'] != $data['nombre_reputacion']){
                    $this->logros_model->actualizarLogroCompleto($data);
                }else{
                    $this->logros_model->actualizarPuntajeLogro($data);
                }
            }
            $parameter['mensaje'] = 'Logro almacenado correctamente';
            $this->load->view('mensajes',$parameter);
        }
    }
    public function nuevoLogro(){
        $tipo = $_GET['tipo'];
        if($tipo == 1){
            $parameter['mensaje'] = 'Agregar nuevo ';
        }else{
            $parameter['id'] = $_GET['id'];
            $parameter['nombre_rep'] = $_GET['nombre_rep'];
            $parameter['puntaje_rep'] = $_GET['puntaje_rep'];
            $parameter['mensaje'] = 'Modificar ';
        }
        $this->load->view('nuevoLogro',$parameter);
    }
    
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
    
    function eliminarLogro(){
        $id = $_GET['id'];
        $this->logros_model->eliminarLogro($id);
        $parameter['mensaje'] = 'Logro eliminado correctamente';
        $this->load->view('mensajes',$parameter);
    }
    
    function ganancias(){
        $this->load->view('ganancias');
    }
    
    function validarFechas(){
        $this->form_validation->set_rules('primera_fecha', 'Primera fecha', 'trim|required|callback_valid_date');
        $this->form_validation->set_rules('segunda_fecha', 'Segunda fecha', 'trim|required|callback_valid_date');
        if($this->form_validation->run() == false){
            $this->ganancias();
        }else{
            $primeraFechaCorregida = $this->correccionFecha($this->input->post('primera_fecha'));
            $segundaFechaCorregida = $this->correccionFecha($this->input->post('segunda_fecha'));
            $primeraFechaDate = strtotime($primeraFechaCorregida);
            $segundaFechaDate = strtotime($segundaFechaCorregida);
            if ($primeraFechaDate >= $segundaFechaDate){
                echo "<script>
                alert('Fechas invalidas, la primera fecha debe ser anterior a la segunda.');
                window.location.href='" . base_url() . "administrar/ganancias';
                </script>";   
            }else{
                $data = array(
                    'primeraFecha' => $primeraFechaCorregida,
                    'segundaFecha' => $segundaFechaCorregida
                );
                $compras = $this->mandarDatos->obtenerCompras($data);
                if($compras->num_rows() == 0){
                    $parameter['mensaje'] = 'No existen compras en las fechas dadas.';
                }else{
                    $parameter['mensaje'] = 'Listado de compras entre las fechas dadas.';
                    $parameter['compras'] = $compras->result();
                }
                $this->load->view('listadoDeGanancias',$parameter);
            }
        }
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
    
    function correccionFecha($fecha){
         $correccion = explode('/', $fecha);
         $fecha_sql = $correccion[2]."-".$correccion[1]."-".$correccion[0];
         return $fecha_sql;
     }

     function ranking(){
        if (isset($_GET['cuantos'])){
            $parametro['cuantos'] = $_GET['cuantos'];
        }
        else {
            $parametro['cuantos'] = 5;
        }
        $parametro['usuarios'] = $this->usuario_model->obtenerRanking($parametro);
        $this->load->view('ranking',$parametro);
     }
}

?>        