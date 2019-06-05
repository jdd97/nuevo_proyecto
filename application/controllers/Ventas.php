<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller{
    
    public function __construct(){

        parent::__construct();
    //    $this->permisos = $this->backend_lib->control();
        $this->load->model("Ventas_model");
        $this->load->model("Clientes_model");
        $this->load->model("Productos_model");
        $this->load->model("Tipo_Cliente_model");
    
    }
    
    public function index(){
        $data = array(
          //  'permisos' => $this->permisos,
            'ventas' => $this->Ventas_model->getVentas(),
        );

       $this->load->view('head');
        $this->load->view('menu_head');
        $this->load->view('menu_costado');
        $this->load->view('ventas/list',$data);
        $this->load->view('footer');
        $this->load->view('plugins_footer');
       // $this->load->view('ventas/script_ventas');
    }
    
    public function add(){
        
        $data = array(
          "tipo_comprobante" => $this->Ventas_model->getTipo_comprobantes(),
          "clientes" => $this->Clientes_model->getClientes(),
          "tipo_cliente" => $this->Tipo_Cliente_model->getTipo_cliente()
        );
        
       $this->load->view('head');
        $this->load->view('menu_head');
        $this->load->view('menu_costado');
        $this->load->view('ventas/add',$data);
        $this->load->view('plugins_footer');
    }

    public function getproductos(){

        $valor = $this->input->post("valor");
        $productos = $this->Ventas_model->getproductos($valor);
        echo json_encode($productos); 

    }

    public function store(){

        $fecha = $this->input->post("fecha");
        $subtotal = $this->input->post("subtotal");
        $igv = $this->input->post("igv");
        $descuento = $this->input->post("descuento");
        $total = $this->input->post("total");
        $idcomprobante = $this->input->post("id_tipo_comprobante");
        $idcliente = $this->input->post("id_cliente");
        $idusuario = $this->session->userdata("id");
        $numero = $this->input->post("numero");
        $serie = $this->input->post("serie");

        $idproductos = $this->input->post("id_productos");
        $precios = $this->input->post("precios");
        $cantidades = $this->input->post("cantidades");
        $importes = $this->input->post("importes");

        $data = array(
            'fecha' => $fecha,
            'subtotal' => $subtotal,
            'igv' => $igv,
            'descuento' => $descuento,
            'total' => $total,
            'tipo_comprobante_id' => $idcomprobante,
            'id_cliente' => $id_cliente,
            //'usuario_id' => $idusuario,
            'nrodocumento_cliente' => $nrodocumento_cliente,
            'serie' => $serie
        );
    
        if($this->Ventas_model->save($data)){
            $idventa = $this->Ventas_model->lastID();
            $this->updateComprobante($id_tipo_comprobante);
            $this->save_detalle($id_productos, $id_venta, $precio_compra,$precio_venta, $cantidades, $importes);
            redirect(base_url()."ventas");
        }else{
            redirect(base_url()."ventas/add");
        }

    }

    protected function updatetipo_comprobante($id_tipo_comprobante){

        $comprobanteActual = $this->Ventas_model->getTipo_comprobante($id_tipo_comprobante);
        $data = array(
            'cantidad' => $comprobanteActual->cantidad + 1 
        );
        $this->Ventas_model->updateTipo_comprobante($id_tipo_comprobante, $data);

    }

    protected function save_detalle($productos, $id_venta, $precio_compra,$precio_venta, $cantidades, $importes){
        for ($i = 0; $i < count($productos) ; $i++) {
            $data = array(
                'id_producto' => $id_productos[$i],
                'id_venta' => $id_venta,
                'precio_compra' => $precio_compra[$i],
                'precio_venta' => $precio_venta[$i],
                'cantidad' => $cantidades[$i],
                'importe' => $importes[$i],
            );
            $this->Ventas_model->save_detalle($data);
            $this->updateProducto($productos[$i], $cantidades[$i]);
        }
    }

    protected function updateProducto($idproducto, $cantidad){
        $productoActual = $this->Productos_model->getProducto($idproducto);
        $data = array(
            'stock' => $productoActual->stock - $cantidad,
        );
        $this->Productos_model->update($idproducto, $data);
    }

    public function view(){
        $idventa = $this->input->post("id");
        $data = array(
            "venta" => $this->Ventas_model->getVenta($idventa),
            "detalles" => $this->Ventas_model->getDetalle($idventa),
        );
        $this->load->view("ventas/view", $data);
    }
    }