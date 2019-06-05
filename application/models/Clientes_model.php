<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_MOdel {

    public function getClientes(){
        $this->db->select("c.*,razonsocial_cliente");
        $this->db->from("clientes c");        
        $this->db->where("c.estado_cliente","1");
        $resultados = $this->db->get();   
        return $resultados->result();
    }

    public function getCliente($id){     
        $this->db->where("id_cliente",$id);
        $resultado = $this->db->get('clientes');
        return $resultado->row();
    }

    public function save($data){
        return $this->db->insert("clientes",$data);
    }
    public function update($id,$data){
        $this->db->where("id_cliente",$id);
        return $this->db->update("clientes",$data);

}
}