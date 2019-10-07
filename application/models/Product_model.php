<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function getProducts(){
		$this->db->order_by("name");
		$resultados = $this->db->get("products");
		return $resultados->result();
	}

	public function getProduct($id){
		$this->db->where("id",$id);
		$consulta = $this->db->get("products");
		return $consulta->row();
	}

	public function save($datos){
		return $this->db->insert("products",$datos);
	}

	public function update($id,$datos){
		$this->db->where("id",$id);
		return $this->db->update("products",$datos);
	}

	public function delete($id){
		$this->db->where("id",$id);
		return $this->db->delete("products");
	}

	public function insertProducts($data)
	{
		$this->db->insert_batch("products", $data);
	}

	public function search($search){
		$this->db->like("name",$search);
		$this->db->order_by("name");
		$resultados = $this->db->get("products");
		return $resultados->result();
	}

	public function pagination($search, $rowperpage = false, $rowno = false){
		if ($rowperpage!==false && $rowno!== false) {
			 $this->db->limit($rowperpage, $rowno);
		}
		$this->db->like("name",$search);
		$this->db->order_by("name");
		$resultados = $this->db->get("products");
		return $resultados->result();
	}
}
