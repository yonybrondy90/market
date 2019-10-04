<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function getCategories(){
		$resultados = $this->db->get("categories");
		return $resultados->result();
	}

	public function getCategory($id){
		$this->db->where("id",$id);
		$consulta = $this->db->get("categories");
		return $consulta->row();
	}

	public function save($datos){
		return $this->db->insert("categories",$datos);
	}

	public function update($id,$datos){
		$this->db->where("id",$id);
		return $this->db->update("categories",$datos);
	}

	public function delete($id){
		$this->db->where("id",$id);
		return $this->db->delete("categories");
	}
}
