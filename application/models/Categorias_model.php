<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_MOdel {

    public function getCategorias(){
        $this->db->select("c.*,descripcion_categoria");
        $this->db->from("categorias c");        
        $this->db->where("c.estado_categoria","1");
        $resultados = $this->db->get();   
        return $resultados->result();
    }

    public function getCategoria($id){     
        $this->db->where("id_categoria",$id);
        $resultado = $this->db->get('categorias');
        return $resultado->row();
    }

    public function save($data){
        return $this->db->insert("categorias",$data);
    }
    public function update($id,$data){
        $this->db->where("id_categoria",$id);
        return $this->db->update("categorias",$data);

}
}