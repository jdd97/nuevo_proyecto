<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
		$this->load->model("Marcas_model");
    }


	public function index()
	{
		$data = array(
			'Productos' => $this->Productos_model->getProductos(),
		);
		//Aca trate de cargar un helper pero nada que ver
		//$this->load->helper('form_error');

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('productos/list',$data);
		$this->load->view('footer');
		$this->load->view('plugins_footer');
		$this->load->view('productos/script_productos');
	}
	public function view($id){
		//$idCategoria = $this->input->post("idCategoria");
		$data = array(
			"producto" => $this->Productos_model->getProducto($id)
		);
		$this->load->view("productos/view",$data);
	//	$this->load->view("admin/categorias/script_categorias");
	}
	public function add()
	{
		$data = array(
			'categorias' => $this->Categorias_model->getCategorias(),
			'marcas' => $this->Marcas_model->getMarcas(),

		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('productos/add',$data);
		$this->load->view('plugins_footer');
		//$this->load->view('categorias/script_categorias');

	}
	public function store(){
		$id_producto = $this->input->post("id_producto");
		$detalle_producto=$this->input->post("detalle_producto");
		$cod_producto=$this->input->post("cod_producto");
		$precio_compra=$this->input->post("precio_compra");
		$precio_venta=$this->input->post("precio_venta");
		$stock=$this->input->post("stock");
		$stock_minimo=$this->input->post("stock_minimo");
		$id_marca=$this->input->post("id_marca");
		$id_categoria=$this->input->post("id_categoria");
		$estado_producto=$this->input->post("estado_producto");

				
		$data = array(
			'detalle_producto' => ($detalle_producto),
			'cod_producto' => ($cod_producto),
			'precio_compra' => ($precio_compra),
			'precio_venta' => ($precio_venta),
			'stock' => ($stock),
			'stock_minimo' => ($stock_minimo),
			'id_marca' => ($id_marca),
			'id_categoria' => ($id_categoria),
			'estado_producto' =>"1" ,
			
		);
		if ($this->Productos_model->save($data)) {
			$this->session->set_flashdata("success","Producto agregado con éxito");
			redirect(base_url()."productos");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."productos/add/".$id_producto);
		}
	}
	public function edit($id)
	{
		$data = array(
			'productos'=> $this->Productos_model->getProducto($id),
				'categorias' => $this->Categorias_model->getCategorias(),
			'marcas' => $this->Marcas_model->getMarcas(),


		);
		//print_r($data);
		$this->load->view('head');
		$this->load->view('menu_costado');
		$this->load->view('productos/edit',$data);
		$this->load->view('footer');

	}
	public function update(){
		$id_producto = $this->input->post("id_producto");
		$detalle_producto=$this->input->post("detalle_producto");
		$cod_producto=$this->input->post("cod_producto");
		$precio_compra=$this->input->post("precio_compra");
		$precio_venta=$this->input->post("precio_venta");
		$stock=$this->input->post("stock");
		$stock_minimo=$this->input->post("stock_minimo");
		$id_marca=$this->input->post("id_marca");
		$id_categoria=$this->input->post("id_categoria");

				
		$data = array(
			'detalle_producto' => $detalle_producto,
			'cod_producto' => $cod_producto,
			'precio_compra' => $precio_compra,
			'precio_venta' => $precio_venta,
			'stock' => $stock,
			'stock_minimo' => $stock_minimo,
			'id_marca' => $id_marca,
			'id_categoria' => $id_categoria,
			'estado_producto' =>"1" ,
			
		);
		if ($this->Productos_model->update($id_producto,$data)) {
			$this->session->set_flashdata("success","Datos actualizados");
			redirect(base_url()."productos");
		}
		
		
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."productos/edit/".$id_producto);
		}
	}
	public function delete($id){
		$data = array('estado_producto' => "0",
	 );
	 $this->Productos_model->update($id,$data);
	 echo "Productos";
	}
}
