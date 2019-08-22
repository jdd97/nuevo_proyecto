<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {
/* public function gettipo_comprobante(){
    $resultados=$this-> db->get("tipo_comprobante");
    return $resultados->result(); 
	} */
	public function getVentas(){
		$this->db->select("v.*, c.razonsocial_cliente, nombre as tipo_comprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c", "v.id_cliente = c.id_cliente");
		$this->db->join("tipo_comprobante tc", "v.id_tipo_comprobante = tc.id_tipo_comprobante");
    
		$resultados = $this->db->get();

		if($resultados->num_rows()){
			return $resultados->result();
		}else{
			return false;
		}
	}
	
    

    public function getVentasbyDate($fechainicio, $fechafin){
    	$this->db->select("v.*, c.razonsocial_cliente, tc.nombre as tipo_comprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c", "v.id_cliente = c.id_cliente");
		$this->db->join("tipo_comprobante tc", "v.id_tipo_comprobante = tc.id_tipo_comprobante");
		$this->db->where("v.fecha >=", $fechainicio);
		$this->db->where("v.fecha <=", $fechafin);
		$resultados = $this->db->get();

		if($resultados->num_rows() > 0){
			return $resultados->result();
		}else{
			return false;
		}
    }

	public function getVenta($id){

		$this->db->select("v.*, c.razonsocial_cliente, c.direccion, c.telefono, c.num_documento as documento, tc.nombre as tipo_comprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c", "v.id_cliente = c.id_venta");
		$this->db->join("tipo_comprobante tc", "v.id_tipo_comprobante = tc.id_tipo_comprobante"); 
		$this->db->where("v.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();

	}

	public function getDetalle($id){

		$this->db->select("dt.*, p.codigo_producto, p.stock_minimo as stock_minimo, p.nombre");
		$this->db->from("detalle_venta dt");
		$this->db->join("productos p", "dt.id_producto = p.id_producto");
		$this->db->where("dt.id_venta", $id);
	  	$resultados = $this->db->get();
	  	return $resultados->result();

	}

    public function getTipo_comprobantes(){
        $resultados = $this->db->get("tipo_comprobante");
        return $resultados->result();
    }
 
    

    public function getTipo_comprobante($idcomprobante){

    	$this->db->where("id", $id_tipo_comprobante);
    	$resultado = $this->db->get("tipo_comprobante");
    	return $resultado->row();

    }

    public function getproductos($valor){ 

        $this->db->select("id_producto, codigo_producto, nombre as label, precio_compra, precio_venta, stock_minimo,stok");
        $this->db->from("productos");
        $this->db->like("nombre", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }
	
    public function save($data){
    	return $this->db->insert("ventas", $data);
    }

    public function lastID(){
    	return $this->db->insert_id();
    }


    public function updateTipo_comprobante($id_tipo_comprobante, $data){
    	$this->db->where("tipo_comprobante", $id_tipo_comprobante);
    	$this->db->update("tipo_comprobante", $data);
    }

    public function save_detalle($data){
    	$this->db->insert("detalle_venta", $data);

    }

    public function years(){

    	$this->db->select("YEAR(fecha) as year");
    	$this->db->from("ventas");
    	$this->db->group_by("year");
    	$this->db->order_by("year", "desc");
    	$resultados = $this->db->get();
    	return $resultados->result();

    }

    public function montos($year){
    	
    	$this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
    	$this->db->from("ventas");
    	$this->db->where("fecha >=", $year."-01-01");
    	$this->db->where("fecha <=", $year."-12-31");
    	$this->db->group_by("mes");
    	$resultados = $this->db->get();
    	return $resultados->result();
    }
    
}
