<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creditos extends CI_Controller {

	public function __construct(){
            parent::__construct();
            $this->load->model('mandarDatos');
            $this->load->library('javascript');
            $this->load->database();
        }

	public function index(){
		$parameter['title'] = 'Una Gauchada';
                $parameter['mensaje'] = 'Comprar creditos';
		$parameter['form'] = $this->crearFormulario();
		$this->load->view('comprarCreditos',$parameter);
	}

	public function crearFormulario(){

		$formulario['nombre'] = array(
			'name' => 'nombre'
		);

		$formulario['numeroTarjeta'] = array(
			'name' => 'numeroTarjeta'
		);

		$formulario['codigo'] = array(
			'name' => 'codigo'
		);

		$formulario['cantidadCreditos'] = array(
			'name' => 'cantidad'
		);

		$formulario['meses'] = array(
			'1' => '01',
			'2' => '02',
			'3' => '03',
			'4' => '04',
			'5' => '05', 
			'6' => '06',
			'7' => '07',
			'8' => '08',
			'9' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
		);

		$formulario['anios'] = array(
			'2016' => '2016',
			'2017' => '2017',
			'2018' => '2018',
			'2019' => '2019',
			'2020' => '2020',
			'2021' => '2021', 
		);

		return $formulario;
		
	}

	public function mandarDatos(){
                $creditos = $this->input->post('cantidad');
		$data = array(
                    'cantidadCreditos' => $creditos,
                    'id' => $this->session->userdata('id'),
                    'valor_compra' => ($creditos*50),
                    );
                $nuevosCreditos = $this -> mandarDatos -> almacenar_creditos($data);
                $this->mandarDatos->registrarCompra($data);
		$this->session->set_userdata('creditos_usuario',$nuevosCreditos); 
                $parametro['mensaje'] = 'La compra se ha realizado exitosamente';
                $this->load->view('mensajes',$parametro);
	}
}