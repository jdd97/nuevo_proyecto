<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Clientes_model");
    }


	public function index()
	{
		$data = array(
			'clientes' => $this->Clientes_model->getClientes(),
		);
		//Aca trate de cargar un helper pero nada que ver
		//$this->load->helper('form_error');

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('clientes/list',$data);
		$this->load->view('footer');
		$this->load->view('plugins_footer');
		$this->load->view('clientes/script_clientes');
	}
	public function view($id){
		//$idCategoria = $this->input->post("idCategoria");
		$data = array(
			"cliente" => $this->Clientes_model->getCliente($id)
		);
		$this->load->view("clientes/view",$data);
	//	$this->load->view("admin/categorias/script_categorias");
	}
	public function add()
	{
		$data = array(

		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('clientes/add',$data);
		$this->load->view('plugins_footer');
		//$this->load->view('categorias/script_categorias');

	}
	public function store(){
		$id_cliente = $this->input->post("id_cliente");
		$razonsocial_cliente=$this->input->post("razonsocial_cliente");
		$nrodocumento_cliente=$this->input->post("nrodocumento_cliente");
		$direccion_cliente=$this->input->post("direccion_cliente");
		$telefono_cliente=$this->input->post("telefono_cliente");

				
		$data = array(
			'razonsocial_cliente' => ($razonsocial_cliente),
			'nrodocumento_cliente' => ($nrodocumento_cliente),
			'direccion_cliente' => ($direccion_cliente),
			'telefono_cliente' => ($telefono_cliente),
			'estado_cliente' =>"1" ,
			
		);
		if ($this->Clientes_model->save($data)) {
			$this->session->set_flashdata("success","Nuevo Clientes agregado con éxito");
			redirect(base_url()."clientes");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."clientes/add/".$id_cliente);
		}
	}
	public function edit($id)
	{
		$data = array(
			'clientes'=> $this->Clientes_model->getCliente($id)

		);
		//print_r($data);
		$this->load->view('head');
		$this->load->view('menu_costado');
		$this->load->view('clientes/edit',$data);
		$this->load->view('footer');

	}
	public function update(){
		$id_cliente = $this->input->post("id_cliente");
		$razonsocial_cliente=$this->input->post("razonsocial_cliente");
		$nrodocumento_cliente=$this->input->post("nrodocumento_cliente");
		$direccion_cliente=$this->input->post("direccion_cliente");
		$telefono_cliente=$this->input->post("telefono_cliente");

				
		$data = array(
			'razonsocial_cliente' =>($razonsocial_cliente),
			'nrodocumento_cliente' =>($nrodocumento_cliente),
			'direccion_cliente' =>($direccion_cliente),
			'telefono_cliente' =>($telefono_cliente),
	
		
			//'estado_categoria' =>"1" ,
			
		);
		if ($this->Clientes_model->update($id_cliente,$data)) {
			$this->session->set_flashdata("success","Datos actualizados");
			redirect(base_url()."clientes");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."clientes/edit/".$id_cliente);
		}
	}
	public function delete($id){
		$data = array('estado_cliente' => "0",
	 );
	 $this->Clientes_model->update($id,$data);
	 echo "Clientes";
	}
}
