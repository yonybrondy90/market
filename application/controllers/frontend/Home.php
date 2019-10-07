<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Product_model');
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

    public function search(){
        $search = $this->input->post("search");
        $products = $this->Product_model->search($search);
        echo json_encode($products);
    }

    public function loadRecord($rowno=0){
 
        $rowperpage = 12;
        $search = $_REQUEST['search'];
 
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
  
        $allcount = count($this->Product_model->pagination($search));
 
        $products_record = $this->Product_model->pagination($search, $rowperpage, $rowno);
  
        $config['base_url'] = base_url().'frontend/home/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
 
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $products_record;
        $data['row'] = $rowno;
 
        echo json_encode($data);
  }


}
