<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Marcas_model");
    }


	public function index()
	{
		$data = array(
			'marcas' => $this->Marcas_model->getMarcas(),
		);
		//Aca trate de cargar un helper pero nada que ver
		//$this->load->helper('form_error');

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('marcas/list',$data);
		$this->load->view('footer');
		$this->load->view('plugins_footer');
		$this->load->view('marcas/script_marcas');
	}
	public function view($id){
		//$idCategoria = $this->input->post("idCategoria");
		$data = array(
			"marca" => $this->Marcas_model->getMarca($id)
		);
		$this->load->view("marcas/view",$data);
	//	$this->load->view("admin/marcas/script_marcas");
	}
	public function add()
	{
		$data = array(

		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('marcas/add',$data);
		$this->load->view('plugins_footer');
		//$this->load->view('marcas/script_marcas');

	}
	public function store(){
		$id_marca = $this->input->post("id_marca");
		$descripcion_marca=$this->input->post("descripcion_marca");

				
		$data = array(
			'descripcion_marca' => ($descripcion_marca),
			'estado_marca' =>"1" ,
			
		);
		if ($this->Marcas_model->save($data)) {
			$this->session->set_flashdata("success","Marca agregada con éxito");
			redirect(base_url()."marcas");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."marcas/add/".$id_marca);
		}
	}
	public function edit($id)
	{
		$data = array(
			'marca'=> $this->Marcas_model->getMarca($id)

		);
		$this->load->view('head');
		$this->load->view('menu_costado');
		$this->load->view('marcas/edit',$data);
		$this->load->view('footer');

	}
	public function update(){
		$id_marca = $this->input->post("id_marca");
		$descripcion_marca=$this->input->post("descripcion_marca");

				
		$data = array(
			'descripcion_marca' => $descripcion_marca
			//'estado_categoria' =>"1" ,
			
		);
		if ($this->Marcas_model->update($id_marca,$data)) {
			$this->session->set_flashdata("success","Datos actualizados");
			redirect(base_url()."marcas");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."marcas/edit/".$id_marca);
		}
	}
	public function delete($id){
		$data = array('estado_marca' => "0",
	 );
	 $this->Marcas_model->update($id,$data);
	 echo "marcas";
	}
}
