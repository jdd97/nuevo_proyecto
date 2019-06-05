<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_MOdel {

    public function getMarcas(){
        $this->db->select("c.*,descripcion_marca");
        $this->db->from("marcas c");        
        $this->db->where("c.estado_marca","1");
        $resultados = $this->db->get();   
        return $resultados->result();
    }

    public function getMarca($id){     
        $this->db->where("id_marca",$id);
        $resultado = $this->db->get('marcas');
        return $resultado->row();
    }

    public function save($data){
        return $this->db->insert("marcas",$data);
    }
    public function update($id,$data){
        $this->db->where("id_marca",$id);
        return $this->db->update("marcas",$data);

}
}