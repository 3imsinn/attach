<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piypa extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('piypa_model');
		$this->load->model('products_model');
		$this->load->model('category_model');
		
		$this->load->library('session');
		$this->load->helper('form');
	}




		public function view($slug)
			{
				$data['piyps'] = $this->piypa_model->get_piyps($slug);
				$data['products'] = $this->products_model->get_products();
			}



			public function data(){
				
				$data['title']  = "attach your products";		
				
				$data['products'] = $this->products_model->get_products();
				$i = 0;
					while($i < count($data['products'])){

						$where = $data['products'][$i]['id'];
					$data['piyps'][$i] = $this->piypa_model->get_piyps($where);
				$i++;
			}

			return $data;
			}


			public function index(){

				
			$kind = "piypa";
			$data = $this->data();
			$this->loadPiypa($data, $kind);

	}

	public function delete(){

		$deleteID = $this->input->post('piypaID');
		print_r($deleteID);
		$del= $this->piypa_model->delete($deleteID);
		$data = $this->index(); 
	}

	public function edit(){

		$update = $this->input->post('update');
		if($update != "")
		{
			$update = $this->update();
		}


		$asin = $this->input->post('asin');
		$data['products'] = $this->products_model->get_product($asin);

		$where = $this->input->post('piypaID');
		$data['piyps'] = $this->piypa_model->get_piyp($where);

		$data = $this->forms($data);
		

		$kind = 'edit';
		$this->loadPiypa($data,$kind);
	}


		public function forms($data){

/**
		* Formular wird aufgebaut
		*/ 

		$title = $data['piyps']['0']['title'];
		$tags = $data['piyps']['0']['tags'];
		$abstract = $data['piyps']['0']['abstract'];
		$pricing = $data['piyps']['0']['pricing'];
		$language = $data['piyps']['0']['language'];


		// get category

		$category = $this->category_model->get_categories();
	


		$data['category_options'] = $category; 
		
		  
		
		
		


		$data['attributes'] = array('class' => 'formee');
		$data['hidden'] = array('piypaID' => $where,'update' => '1');

		$data['pricing_options'] = array(
                  '0'  => 'piypa for free',
                  '1'    => 'piypa for sale'
                );

		if($pricing == "1"){
			$data['pricing_selected'] = array('1', 'piypa for sale');
		}
		else{
			$data['pricing_selected']  = array('0', 'piypa for free');
		}



		// Sprachen 

		$data['language_options'] = array(
                  'en'  => 'english',
                  'de'    => 'deutsch'
                );

		if($language == "en"){
			$data['language_selected'] = array('en', 'english');
		}
		else{
			$data['language_selected']  = array('de', 'deutsch');
		}



		$data['title_input'] = array(
              'name'        => 'title',
              'id'          => 'title',
              'value'       => 	$title,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:100%'
            );

		$data['tags_input'] = array(
              'name'        => 'tags',
              'id'          => 'tags',
              'value'       => 	$tags,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:100%'
            );

		$data['abstract_textarea'] = array(
              'name'        => 'abstract',
              'id'          => 'abstract',
              'value'       => 	$abstract,
              'rows'  		=> '10',
              'cols'        => '20',
              'style'       => 'width:100%'
            );

		return $data;

		}


	public function update(){

		$title = $this->input->post('title');
		$abstract = $this->input->post('abstract');
		$price = $this->input->post('price');

	$data = array(
               'title' => $title,
               'abstract' => $abstract,
               'price' => $price
            );

	$id = $this->input->post('piypaID');

	$data['update'] = $this->piypa_model->update_piyp($data,$id);

	return $id;
	}


	public function add(){

		if($this->input->post('newpiyp') == "1"){

	$data = array(
   				'account' => $this->input->post('account') ,
   				'product' => $this->input->post('product') ,
   				'text' => 	 $his->input->post('text'),
   				'title' => 	 $this->input->post('title'),
   				'abstract' => $this->input->post('abstract'),
   				'tags' => 	 $this->input->post('tags'),
   				'categoryID' =>$this->input->post('categoryID'),
   				'language' => $this->input->post('language'),
   				'price' => $this->input->post('price'),
   				'amazonLink' => $this->input->post('amazonLink'),
   				'filename' => $this->input->post('file_upload'),
   				'pricing' => $this->input->post('pricing'),
   				'publishing' => $this->input->post('publish')
			);
		}

			

		$asin = $this->input->post('asin');
		$data['products'] = $this->products_model->get_product($asin);
		$data['piyps'] = '';
		

		// Dokument für neue piyp


		$data['attributes'] = array('class' => 'formee');
	

		$data['pricing_options'] = array(
                  '0'  => 'piypa for free',
                  '1'    => 'piypa for sale'
                );

			// Sprachen 

		$data['language_options'] = array(
                  'en'  => 'english',
                  'de'    => 'deutsch'
                );


		$data['title_input'] = array(
              'name'        => 'title',
              'id'          => 'title',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:100%'
            );

		$data['tags_input'] = array(
              'name'        => 'tags',
              'id'          => 'tags',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:100%'
            );

		$data['abstract_textarea'] = array(
              'name'        => 'abstract',
              'id'          => 'abstract',
              'rows'  		=> '10',
              'cols'        => '20',
              'style'       => 'width:100%'
            );

		$kind = "add";
		
		$delivery = $this->loadPiypa($data,$kind);
	}

	public function loadPiypa($data, $kind){
		$data['username']= $this->session->userdata('username');

		$this->load->view('templates/header', $data);
		$this->load->view($kind, $data);
		$this->load->view('templates/footer', $data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */