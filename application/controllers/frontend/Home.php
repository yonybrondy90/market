<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_model');
	}


	public function index()
	{
		

        $contenido_exterior = array(
            'title'     => 'Categories',
            'content' => $this->load->view('frontend/home', '', true),
        );

        $this->load->view('frontend/template', $contenido_exterior);
	}

	public function add(){
        $contenido_exterior = array(
            'title'     => 'Agregar categoria',
            'content' => $this->load->view('backend/categories/add', '', true),
        );

        $this->load->view('backend/template', $contenido_exterior);
	}

	public function store(){
	
        $name        = $this->input->post("name");

        $this->form_validation->set_rules('name', 'Nombre', 'trim|required|is_unique[categories.name]', array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $datacategoria = array(
                'name'        	=> $name,
                'status' => "Activo"
            );

            if ($this->Category_model->save($datacategoria)) {
            	$this->session->set_flashdata("success","La Categoria fue registrado exitosamente");
                redirect(base_url() . "backend/categories");
            } else {
                $this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "backend/categories/add");
            }
        }
	}

	public function edit($id)
    {
        $contenido_interno = array(
            'category'      => $this->Category_model->getCategory($id),
            
        );

        $contenido_exterior = array(
            'title'     => 'Editar Categoria',
            'content' => $this->load->view('backend/categories/edit', $contenido_interno, true),
        );

        $this->load->view('backend/template', $contenido_exterior);
    }

    public function update(){
        $category_id      = $this->input->post("category_id");
    	$name      = $this->input->post("name");

        $category_current = $this->Category_model->getCategory($category_id);

        $is_unique_name = '';
    
        if ($category_current->name != $name) {
            $is_unique_name = '|is_unique[categories.name]';
        }

        $this->form_validation->set_rules('name', 'Nombre', 'trim|required'.$is_unique_name, array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->edit($category_id);
        } else {
          
            $datacategoria = array(
                'name'         => $name,
            );

            if ($this->Category_model->update($category_id,$datacategoria)) {
            	$this->session->set_flashdata("success","La informacion del categoria fue actualizada correctamente");
                redirect(base_url() . "backend/categories");
            } else {
                $this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "backend/categories/edit/".$idcategoria);
            }
        }
    }

}
