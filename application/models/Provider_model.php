<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provider_model extends CI_Model {

	public function getProviders(){
		$this->db->order_by("name");
		$resultados = $this->db->get("providers");
		return $resultados->result();
	}

	public function getProvider($id){
		$this->db->where("id",$id);
		$consulta = $this->db->get("providers");
		return $consulta->row();
	}

	public function save($datos){
		return $this->db->insert("providers",$datos);
	}

	public function update($id,$datos){
		$this->db->where("id",$id);
		return $this->db->update("providers",$datos);
	}

	public function delete($id){
		$this->db->where("id",$id);
		return $this->db->delete("providers");
	}
}
