<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Product extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('product_model');
			$this->load->model('type_model','type');

		}

		public function index(){
			$this->load->model('outlets_model');
			if($this->session_role != 'admin'){
				//customer main page
				
				$data['title'] = 'Product';
				$data['outlet_name'] = $this->db->get_where('outlets',array('id' => $this->session_outlet))->row('name');
				$data['products'] = $this->product_model->get_product_outlet($this->session_outlet);
				$data['outlets'] = $this->db->get('outlets')->result();
				$this->template->load($this->default,'product/list_product',$data);
			}else{
				//customer main page
				
				$data['title'] = 'Product';
				$data['outlet_name'] = 'Semua Outlet';
				$data['products'] = $this->product_model->get_product_all_outlet();
				$data['outlets'] = $this->db->get('outlets')->result();
				$this->template->load($this->default,'product/list_product',$data);	
			}
			

		
		}

		/****ADD NEW ITEM START****/
		public function upload(){
			//upload image via webcam

			$this->load->library('image_moo');

			$config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;					
			$config['upload_path']          = 'uploads/temp/product/'.$this->session_outlet.'/'.$this->session_id;
			$config['overwrite']			= True;
			$config['file_name']			= 'product'.$this->session_id.'.jpg';
			$this->upload->initialize($config);

			//Check if the folder for the upload existed
			if(!file_exists($config['upload_path']))
			{
				//if not make the folder so the upload is possible
				mkdir($config['upload_path'], 0777, true);
			}

            if($this->upload->do_upload('webcam'))
            {
                //Get the link for the database
                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
            }

            //resize image
            $this->image_moo
				->load($photo)
				->resize_crop(400,400)
				->save($photo,TRUE);

		}

		public function add_product(){
			if($this->session_role == 'sales'){
				redirect('home');
			}
			if($this->input->post()){
				
				$this->load->library('image_moo');

				$config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 5000;					
				$config['upload_path']          = 'uploads/photo/product/'.$this->input->post('product_tray');
				$config['overwrite']			= false;
				$config['file_name']			= $this->input->post('product_code').'.jpg';
				$this->upload->initialize($config);

				//Check if the folder for the upload existed
				if(!file_exists($config['upload_path']))
				{
					//if not make the folder so the upload is possible
					mkdir($config['upload_path'], 0777, true);
				}

	            if($this->upload->do_upload('capture'))
	            {
	                //Get the link for the database
	                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
	            }else{

	            	$photo = $config ['upload_path'] . '/' . $config ['file_name'];

					rename('uploads/temp/product/'.$this->session_outlet.'/'.$this->session_id.'/'.'product'.$this->session_id.'.jpg' , $photo);	
					
	            }

	             //resize image
            	$this->image_moo
					->load($photo)
					->resize_crop(400,400)
					->save($photo,TRUE);

	            //check if user upload a photo or not.
				if(!file_exists($photo))
				{
					
					$photo = '';
				}

	            $data_product = array(

	            		'name'			=> $this->input->post('product_name'),
	            		'product_code'	=> $this->input->post('product_code'),
	            		'type'			=> $this->input->post('product_type'),
	            		'category'		=> $this->input->post('product_category'),
	            		'real_weight'	=> $this->input->post('product_real_weight'),
	            		'rounded_weight'=> $this->input->post('product_rounded_weight'),
	            		'selling_price'	=> $this->input->post('product_selling_price'),
	            		'gold_amount'	=> $this->input->post('gold_amount'),
	            		'tray_id'		=> $this->input->post('product_tray'),
	            		'supplier_id'	=> $this->input->post('product_supplier'),
	            		'photo'			=> $photo,

	            	);

	            if($this->session_role == 'admin'){
	            	$data_product['outlet_id'] = $this->input->post('outlet');
	            }elseif ($this->session_role == 'manager') {
	            	$data_product['outlet_id'] = $this->session_outlet;
	            }

	            $this->db->update('code',array('count' => $this->input->post('count')+1),array('code' => $this->input->post('code')));

	            if($this->input->post('product_type') == 'Berlian'){
	            	for($i = 0; $i < count($this->input->post('stone_type')); $i++){
	            		$data_spec = array(
	            			'product_code' => $this->input->post('product_code'),
	            			'stone_type' => $this->input->post('stone_type')[$i],
	            			'stone_amount' => $this->input->post('stone_amount')[$i],
	            			'stone_ct' => $this->input->post('stone_ct')[$i]

	            		);

	            		$this->db->insert('specification',$data_spec);
	            	}
	            }

	            if($this->crud_model->insert_data('products',$data_product)){
	            	$this->session->set_flashdata('product',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Berhasil tambah produk',
					    type: 'success'
					});");	
	            }else{
	            	$this->session->set_flashdata('product',"$.Notify({
					    caption: 'Gagal',
					    content: 'Gagal menambah produk',
					    type: 'alert'
					});");
	            }
	            
	            redirect('product/add_product');

			}else{
				$data['role'] = $this->session_role;
				if ($this->session_role == 'admin') {
					$data['outlets'] = $this->db->get('outlets')->result();
				}
				$data['suppliers'] = $this->db->get('suppliers')->result();
				$data['title'] = 'Product';
				$data['type'] = $this->type->get_all();
				$data['stone_type'] = $this->db->get('diamond_type')->result();
				$data['is_mobile'] = $this->is_mobile;
				$data['trays'] = $this->db->get_where('tray', array('outlet_id' => $this->session_outlet))->result();
				$data['gold_amount'] = $this->db->get('gold_amount')->result();
				$this->template->load($this->default,'product/add_product',$data);
			}
		}

		/*ajax for insert product*/

		public function get_tray_data($outlet_id = ''){
			$this->load->model('tray_model');
			$tray = $this->tray_model->get_tray($outlet_id);
			$output = '';
			if($tray){
				foreach($tray as $row){
					$output .= "<option value='".$row->id."'>".$row->code." - ".$row->name."</option>";
				}
				echo $output;
			}else{
				echo 'Toko ini belum punya baki';
			}
		}
	
		public function get_data_new_product($tray_id = '', $outlet_id = ''){
			$this->load->model('tray_model');
			if($outlet_id == ''){
				$outlet_id = $this->session_outlet;
			}
			$outlet_code = $this->db->get_where('outlets',array('id' => $outlet_id))->row('code');
			$tray = $this->tray_model->get_specific_tray($tray_id);
			$code = $this->db->get_where('code',array('code' => $outlet_code.$tray->code))->row();
			if($code){
				$data = (array) $tray;
				$data['product_code'] = $code->code.sprintf("%05d", $code->count);
				$data['hidden_code'] = $code->code;
				$data['hidden_count'] = $code->count;
				$data = (Object) $data;
				echo json_encode($data);
			}else{
				$this->db->insert('code',array('code' => $outlet_code.$tray->code,'count' => 1));
				$data = (array) $tray;
				$data['product_code'] = $outlet_code.$tray->code.sprintf("%05d", 1);
				$data['hidden_code'] = $outlet_code.$tray->code;
				$data['hidden_count'] = 1;
				$data = (Object) $data;
				echo json_encode($data);
				
			}
		}
		/* end of ajax */

		/*ajax for insert product*/
		public function count_gold_amount($gold_amount_id = ''){
			$gold_amount = $this->db->get_where('gold_amount',array('id'=>$gold_amount_id))->row();
			$gold_amount = (array) $gold_amount;
			$gold_amount['gold_price'] = $this->db->get_where('currency',array('id' => 2))->row('value');
			echo json_encode($gold_amount);

		}
		/* end of ajax */
		/****ADD NEW ITEM END****/

		/****SEND ITEM START****/
		public function send_item(){
			if($this->session_role == 'sales'){
				redirect('home');	
			}
			if ($this->input->post()) {

				$data_mutation = array(
						'product_qty' 	=> count($this->input->post('product_code')),
						'from_outlet' 	=> $this->session_outlet,
						'to_outlet'		=> $this->input->post('to_outlet'),
						'status'		=> 'Pending',
						'date'			=> date('Y-m-d H:i:s')
					);

				$outlet_code = $this->db->get_where('outlets',array('id' => $this->session_outlet))->row('code');
				$code = $this->db->get_where('code',array('code' => $outlet_code.'MUT'))->row();

				if($code){
					$data_mutation['mutation_code'] = $code->code.sprintf("%05d", $code->count);
					$this->db->update('code',array('count' => $code->count+1),array('code' => $code->code));
					
				}else{
					$this->db->insert('code',array('code' => $outlet_code.'MUT','count' => 1));
					$data_mutation['mutation_code'] = $outlet_code.'MUT'.sprintf("%05d", 1);
					$this->db->update('code',array('count' => 2),array('code' => $outlet_code.'MUT'));
				}

				$this->db->insert('mutation',$data_mutation);

				foreach($this->input->post('product_code') as $product_code){
					$data_product = array(
							'product_code' => $product_code,
							'mutation_code' => $data_mutation['mutation_code'],
							'status'		=> 'OK'
						);
					$this->db->insert('mutation_product',$data_product);
					$this->db->update('products',array('status' => 'pending'),array('product_code' => $product_code));
				}

				$this->session->set_flashdata('success',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Berhasil mengirim barang',
				    type: 'success'
				});");	

				redirect('home');
			

			}else{
				$this->load->model('outlets_model');
				$data['outlets'] = $this->outlets_model->get_all_outlet_except($this->session_outlet);
				$data['title'] = 'Kirim Barang';	
				$this->template->load($this->default,'product/send_item',$data);
			}
			

				
		}

		/*ajax for send_item*/
		public function get_product_by_code($product_code = ''){
			$product = $this->product_model->get_product_by_code($product_code,$this->session_outlet);
			
			if($product == NULL){
				echo 'not found';
			}else{
				$limit = $this->db->get_where('amount_limit',array('outlet_id' => $this->session_outlet, 'amount_id' => $product->gold_amount))->row('amount_limit');
				$gold_price = $this->db->get_where('currency',array('id' => 2))->row('value');
				$limit = $gold_price * $limit / 100;
				$limit = $limit * $product->rounded_weight;
				$product = (array) $product;
				$product['limit'] = number_format($limit,0,',','.');
				$product['selling_price'] = number_format($product['selling_price'],0,',','.');
				$product = (Object) $product;
				echo json_encode($product);	
			}
			
		}

		public function get_product_detail($product_code = ''){
			$product = $this->product_model->get_product_detail($product_code);
			
			if($product == NULL){
				echo 'not found';
			}else{
				$product = (array) $product;
				$product['selling_price'] = rupiah($product['selling_price']);
				$product = (Object) $product;
				echo json_encode($product);	
			}
		}

		public function get_product_by_outlet($outlet_id = '',$status = ''){
			$product = $this->product_model->get_product_outlet($outlet_id,$status);
			if($product == NULL){
				echo 'not found';
			}else{
				$product = (Object) $product;
				echo json_encode($product);	
			}
			
		}

		/* end of ajax */
		/****SEND ITEM END****/


		/****SENT ITEM START****/
		public function sent_item(){
			if($this->session_role == 'sales'){
				redirect('home');	
			}
			$this->load->model('mutation_model');
			$data['title'] = "Pengiriman Barang";
			$data['sent_items'] = $this->mutation_model->get_sent_items($this->session_outlet);
			$this->template->load($this->default,'product/sent_item',$data);
		}

		/****SENT ITEM END****/

		/****RECEIVE ITEM START****/
		public function receive_item($mutation_code = ''){
			if($this->session_role == 'sales'){
				redirect('home');	
			}
			if($mutation_code == ''){
				$this->load->model('mutation_model');
				$data['title'] = "Penerimaan Barang";
				$data['receives'] = $this->mutation_model->get_received_transactions($this->session_outlet);
				$data['transaction_count'] = count($data['receives']);
				$this->template->load($this->default,'product/receive_item',$data);
			}else{
				$mutation = $this->db->get_where('mutation',array('mutation_code' => $mutation_code))->row();

				if($mutation->to_outlet == $this->session_outlet){
					$this->load->model('mutation_model');
					$this->load->model('tray_model');
					$data['title'] = "Penerimaan Barang";
					$data['trays'] = $this->tray_model->get_tray($this->session_outlet);
					$data['receives'] = $this->mutation_model->get_received_items($mutation->mutation_code);
					$this->template->load($this->default,'product/receiving',$data);
				}else{
					redirect('product/receive_item');
				}
			}
			
		}

		public function get_product_from_mutation($product_code = '',$mutation_code = ''){
			$this->load->model('mutation_model');
			$product = $this->mutation_model->get_mutation_product($product_code, $mutation_code);
			if($product == NULL){
				echo 'not found';
			}else{
				$product = (Object) $product;
				echo json_encode($product);	
			}

		}

		public function received(){
			if($this->session_role == 'sales'){
				redirect('home');	
			}
			if ($this->input->post()) {
				for($i = 0; $i < count($this->input->post('checked_code')); $i++){
					$data_update = array(
							'tray_id' => $this->input->post('tray')[$i],
							'outlet_id' => $this->session_outlet,
							'status'	=> 'available'
						);
					$this->db->update('products',$data_update,array('product_code' => $this->input->post('checked_code')[$i]));
				}

				if($this->db->update('mutation',array('status' => 'Diterima'),array('mutation_code' => $this->input->post('mutation_code')))){
					$this->session->set_flashdata('success',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Barang berhasil diterima',
					    type: 'success'
					});");	

					redirect('home');
				}
			}
		}
		/****RECEIVE ITEM END****/

		public function mutation_item_detail($code = ''){
			$this->load->model('mutation_model');
			$data['title'] = 'Detail Penerimaan';
			$data['details'] = $this->mutation_model->get_mutation_detail($this->session_outlet,$code);
			$this->template->load($this->default,'product/mutation_detail',$data);
		}
		
	}

?>