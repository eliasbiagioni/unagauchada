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
			'1' => '2017',
			'2' => '2018',
			'3' => '2019',
			'4' => '2020',
			'5' => '2021', 
		);

		return $formulario;
		
	}

	public function mandarDatos(){

		$data = array(
            'cantidadCreditos' => $this->input->post('cantidad'),
            'id_usuario' => 25
        );

		$this -> mandarDatos -> almacenar_creditos($data);
	}
}