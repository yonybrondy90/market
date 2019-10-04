<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Providers extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Provider_model');
	}


	public function index()
	{
		$contenido_interno = array(
            'providers' => $this->Provider_model->getProviders(),
        );

        $contenido_exterior = array(
            'title'     => 'Proveedor',
            'content' => $this->load->view('backend/providers/list', $contenido_interno, true),
        );

        $this->load->view('backend/template', $contenido_exterior);
	}

	public function add(){
        $contenido_exterior = array(
            'title'     => 'Agregar Proveedor',
            'content' => $this->load->view('backend/providers/add', '', true),
        );

        $this->load->view('backend/template', $contenido_exterior);
	}

	public function store(){
	
        $name        = $this->input->post("name");

        $this->form_validation->set_rules('name', 'Nombre', 'trim|required|is_unique[providers.name]', array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $dataProveedor = array(
                'name'        	=> $name,
                'status' => "Activo"
            );

            if ($this->Provider_model->save($dataProveedor)) {
            	$this->session->set_flashdata("success","La Proveedor fue registrado exitosamente");
                redirect(base_url() . "backend/providers");
            } else {
                $this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "backend/providers/add");
            }
        }
	}

	public function edit($id)
    {
        $contenido_interno = array(
            'provider'      => $this->Provider_model->getProvider($id),
            
        );

        $contenido_exterior = array(
            'title'     => 'Editar Proveedor',
            'content' => $this->load->view('backend/providers/edit', $contenido_interno, true),
        );

        $this->load->view('backend/template', $contenido_exterior);
    }

    public function update(){
        $category_id      = $this->input->post("category_id");
    	$name      = $this->input->post("name");

        $category_current = $this->Provider_model->getProvider($category_id);

        $is_unique_name = '';
    
        if ($category_current->name != $name) {
            $is_unique_name = '|is_unique[providers.name]';
        }

        $this->form_validation->set_rules('name', 'Nombre', 'trim|required'.$is_unique_name, array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->edit($category_id);
        } else {
          
            $dataProveedor = array(
                'name'         => $name,
            );

            if ($this->Provider_model->update($category_id,$dataProveedor)) {
            	$this->session->set_flashdata("success","La informacion del Proveedor fue actualizada correctamente");
                redirect(base_url() . "backend/providers");
            } else {
                $this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "backend/providers/edit/".$idProveedor);
            }
        }
    }

}
