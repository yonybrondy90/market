<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Product_model');
        $this->load->model('Category_model');
        $this->load->model('Provider_model');
        $this->load->library('excel');
	}


	public function index()
	{
		$contenido_interno = array(
            'products' => $this->Product_model->getProducts(),
        );

        $contenido_exterior = array(
            'title'     => 'products',
            'content' => $this->load->view('backend/products/list', $contenido_interno, true),
        );

        $this->load->view('backend/template', $contenido_exterior);
	}

	public function add(){
        $contenido_interno = array(
            'categories' => $this->Category_model->getCategories(),
            'providers' => $this->Provider_model->getProviders(),
        );
        $contenido_exterior = array(
            'title'     => 'Agregar producto',
            'content' => $this->load->view('backend/products/add', $contenido_interno, true),
        );

        $this->load->view('backend/template', $contenido_exterior);
	}

	public function store(){
	
        $name        = $this->input->post("name");
        $price        = $this->input->post("price");
        $category_id        = $this->input->post("category_id");
        $provider_id        = $this->input->post("provider_id");
        $stock        = $this->input->post("stock");
        $minimum_stock        = $this->input->post("minimum_stock");
        $image = "product-default.png";

        $this->form_validation->set_rules('name', 'Nombre', 'trim|required|is_unique[products.name]', array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $dataproducto = array(
                'name'        	=> $name,
                'price'          => $price,
                'minimum_stock'          => $minimum_stock,
                'category_id'          => $category_id,
                'provider_id'          => $provider_id,
                'image'          => $image,
                'stock'=> 0,
                'status' => "Activo"
            );

            $product = $this->Product_model->save($dataproducto);

            if ($product) {
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path']          = './assets/images/products/';
                    $config['allowed_types']        = 'gif|jpg|png';

                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('image'))
                    {
                        $data = array('upload_data' => $this->upload->data());
                        $image = $data['upload_data']['file_name'];
                    } 
                }

                $dataproducto = array(
                    'image'          => $image,
                );

                $this->Product_model->update($product->id, $dataproducto);

            	$this->session->set_flashdata("success","La producto fue registrado exitosamente");
                redirect(base_url() . "backend/products");
            } else {
                $this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "backend/products/add");
            }
        }
	}

	public function edit($id)
    {
        $contenido_interno = array(
            'categories'      => $this->Category_model->getCategories(),
            'providers'      => $this->Provider_model->getProviders(),
            'product'      => $this->Product_model->getProduct($id),
        );

        $contenido_exterior = array(
            'title'     => 'Editar producto',
            'content' => $this->load->view('backend/products/edit', $contenido_interno, true),
        );

        $this->load->view('backend/template', $contenido_exterior);
    }

    public function update(){
        $product_id        = $this->input->post("product_id");
        $name        = $this->input->post("name");
        $price        = $this->input->post("price");
        $category_id        = $this->input->post("category_id");
        $provider_id        = $this->input->post("provider_id");
        $stock        = $this->input->post("stock");
        $minimum_stock        = $this->input->post("minimum_stock");

        $product_current = $this->Product_model->getProduct($product_id);

        $is_unique_name = '';
    
        if ($product_current->name != $name) {
            $is_unique_name = '|is_unique[products.name]';
        }

        $this->form_validation->set_rules('name', 'Nombre', 'trim|required'.$is_unique_name, array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->edit($product_id);
        } else {
          
            $dataproducto = array(
                'name'          => $name,
                'price'          => $price,
                'minimum_stock'          => $minimum_stock,
                'category_id'          => $category_id,
                'provider_id'          => $provider_id,
            );

            if ($this->Product_model->update($product_id,$dataproducto)) {
                $image = $product_current->image;
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path']          = './assets/backend/images/products/';
                    $config['allowed_types']        = 'gif|jpg|png';

                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('image'))
                    {
                        $data = array('upload_data' => $this->upload->data());
                        $image = $data['upload_data']['file_name'];
                        if ($product->image != "product-default.png") {
                            unlink("assets/backend/images/products/".$product->image);
                        }

                    } 
                }
                $data  = array('image' => $image );
                $this->Product_model->update($product_id, $data);
            	$this->session->set_flashdata("success","La informacion del producto fue actualizada correctamente");
                redirect(base_url() . "backend/products");
            } else {
                $this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "backend/products/edit/".$idproducto);
            }
        }
    }

    public function import(){
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);

        foreach($object->getWorksheetIterator() as $worksheet)
        {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=2; $row<=$highestRow; $row++)
            {
                $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $price = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $provider_id = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $category_id = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $status = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $stock = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $minimum_stock = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $image = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                if ($image == "") {
                    $image = "product-default.png";
                }


                $data[] = array(
                    "name" => $name,
                    "price" => $price,
                    "stock" => $stock,
                    "minimum_stock" => $minimum_stock,
                    "category_id" => $category_id,
                    "provider_id" => $provider_id,
                    "status" => $status,
                    "image" => $image,
                );

                
            }
        }
        $this->Product_model->insertProducts($data);
        $this->session->set_flashdata("success", "Los datos fueron cargados exitosamente");
        redirect(base_url()."backend/products");
    }

   
}
