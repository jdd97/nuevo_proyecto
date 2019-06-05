<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Categorias_model");
    }


	public function index()
	{
		$data = array(
			'categorias' => $this->Categorias_model->getCategorias(),
		);
		//Aca trate de cargar un helper pero nada que ver
		//$this->load->helper('form_error');

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('categorias/list',$data);
		$this->load->view('footer');
		$this->load->view('plugins_footer');
		$this->load->view('categorias/script_categorias');
	}
	public function view($id){
		//$idCategoria = $this->input->post("idCategoria");
		$data = array(
			"categoria" => $this->Categorias_model->getCategoria($id)
		);
		$this->load->view("categorias/view",$data);
	//	$this->load->view("admin/categorias/script_categorias");
	}
	public function add()
	{
		$data = array(

		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('categorias/add',$data);
		$this->load->view('plugins_footer');
		//$this->load->view('categorias/script_categorias');

	}
	public function store(){
		$id_categoria = $this->input->post("id_categoria");
		$descripcion_categoria=$this->input->post("descripcion_categoria");

				
		$data = array(
			'descripcion_categoria' => ($descripcion_categoria),
			'estado_categoria' =>"1" ,
			
		);
		if ($this->Categorias_model->save($data)) {
			$this->session->set_flashdata("success","Categoría agregada con éxito");
			redirect(base_url()."categorias");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."categorias/add/".$id_categoria);
		}
	}
	public function edit($id)
	{
		$data = array(
			'categorias'=> $this->Categorias_model->getCategoria($id)

		);
		//print_r($data);
		$this->load->view('head');
		$this->load->view('menu_costado');
		$this->load->view('categorias/edit',$data);
		$this->load->view('footer');

	}
	public function update(){
		$id_categoria = $this->input->post("id_categoria");
		$descripcion_categoria=$this->input->post("descripcion_categoria");

				
		$data = array(
			'descripcion_categoria' => $descripcion_categoria
			//'estado_categoria' =>"1" ,
			
		);
		if ($this->Categorias_model->update($id_categoria,$data)) {
			$this->session->set_flashdata("success","Datos actualizados");
			redirect(base_url()."categorias");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."categorias/edit/".$id_categoria);
		}
	}
	public function delete($id){
		$data = array('estado_categoria' => "0",
	 );
	 $this->Categorias_model->update($id,$data);
	 echo "Categorias";
	}
}
