<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_MOdel {

    public function getProductos(){
        $this->db->select("p.*,c.descripcion_categoria as categoria, m.descripcion_marca as marca");
        $this->db->from("productos p"); 
        $this->db->join("categorias c","p.id_categoria = c.id_categoria");       
        $this->db->join("marcas m","p.id_marca = m.id_marca");       
        $this->db->where("p.estado_producto","1");
        $resultados = $this->db->get();   
        return $resultados->result();
    }

    public function getProducto($id){     
        $this->db->where("id_producto",$id);
        $resultado = $this->db->get('productos');
        return $resultado->row();
    }

    public function save($data){
        return $this->db->insert("productos",$data);
    }
    public function update($id,$data){
        $this->db->where("id_producto",$id);
        return $this->db->update("productos",$data);

}
}