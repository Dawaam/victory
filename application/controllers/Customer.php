<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Customer extends MY_Controller{
		function __construct(){
			parent::__construct();
		}

		public function index(){
			//customer main page
			
			$data['title'] = 'Customer';
			$data['customers'] = $this->crud_model->get_data('customers')->result();
			$this->template->load($this->default,'customer/list_customer',$data);
		
		}

		public function add_customer(){
			if($this->input->post()){

				$code = $this->db->get_where('code',array('code' => 'MKM'))->row();
				if($code){

					$customer_code = $code->code.sprintf("%07d", $code->count+1);
					
				}else{
					$this->db->insert('code',array('code' => 'MKM','count' => 1));
					$customer_code = 'MKM'.sprintf("%07d", 1);
					
				}
				$birthday=$this->input->post('customer_birthday');
	            $data_customer = array(
	            		'code' => $customer_code,
	            		'name' => $this->input->post('customer_name'),
	            		'gender' => $this->input->post('customer_gender'),
	            		'type' => $this->input->post('customer_type'),
	            		'phone' => $this->input->post('customer_phone'),
	            		'email' => $this->input->post('customer_email'),
	            		'address' =>$this->input->post('customer_address'),
	            		'outlet_id' => $this->session->user_outlet,
	            		'birthday' => date('Y-m-d',strtotime($birthday)),
	            		'no_ktp' => $this->input->post('customer_ktp')

	            	);

	            if($this->crud_model->insert_data('customers',$data_customer)){
	            	$this->session->set_flashdata('customer',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Berhasil tambah customer',
					    type: 'success'
					});");	
	            }else{
	            	$this->session->set_flashdata('customer',"$.Notify({
					    caption: 'Gagal',
					    content: 'Gagal menambah customer',
					    type: 'alert'
					});");
	            }
	            
	            redirect('customer/add_customer');

			}else{
				$data['title'] = 'Customer';
				$this->template->load($this->default,'customer/add_customer',$data);
			}
		}

		public function edit_customer($cust_id = ''){
			if($this->input->post()){
	            $data_customer = array(
	            		'name' => $this->input->post('customer_name'),
	            		'gender' => $this->input->post('customer_gender'),
	            		'type' => $this->input->post('customer_type'),
	            		'phone' => $this->input->post('customer_phone'),
	            		'email' => $this->input->post('customer_email'),
	            		'address' =>$this->input->post('customer_address'),
	            		'birthday' => date('Y-m-d',strtotime($birthday)),
	            		'no_ktp' => $this->input->post('customer_ktp')
	            	);

	            if($this->crud_model->update_data('customers',$data_customer,array('id' => $cust_id))){
	            	$this->session->set_flashdata('customer',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Berhasil edit customer',
					    type: 'success'
					});");
	            }else{
	            	$this->session->set_flashdata('Customer',"$.Notify({
					    caption: 'Gagal',
					    content: 'Gagal edit customer',
					    type: 'success'
					});");
	            }
	            
	            redirect('customer');

			}else{
				$data['title'] = 'Customer';
				$data['customer'] = $this->crud_model->get_by_condition('customers',array('id' => $cust_id))->row();
				$this->template->load($this->default,'customer/edit_customer',$data);
			}
		}

		public function delete_customer($cust_id = ''){
		
			if($this->crud_model->delete_data('customers',array('id' => $cust_id))){
				$this->session->set_flashdata('customer', "$.Notify({caption: 'Berhasil !', content: 'Customer berhasil dihapus', type: 'info'});");
			}else{
				$this->session->set_flashdata('customer', "$.Notify({caption: 'Gagal !', content: 'Customer gagal dihapus', type: 'alert'});");
			}
			
			redirect('customer');
		}

		public function email_member_password($cust_code=''){
			$random_code = random_string('numeric', 5);
			//hashed for database
			$password = hash_password($random_code);
			$this->crud_model->update_data('members',array('password' => $password), array('customer_code' => $cust_code));
			$data = $this->crud_model->get_by_condition('customers', array('code' => $cust_code))->row(); 
			$to = $data->email;
			$subject = "Congratulations ".$data->name."!";
			$message = <<<EOD
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
			<table style="width:100%; height:100%;">
				<tr>
					<td colspan="5">
						<p align="center">KEMENANGAN JEWELLERY</p>
					</td>
				</tr>
				<tr>
					<td style="padding:2em">
						<h1>Hello!</h1><br>
						<p>Here is your password : <p style="color: #16a085">$random_code</p>
						</p>
						<p>For Safety Please Quickly Change Your Password!</p>
					</td>
				</tr>
			</table>
EOD;
			//	--------------------------- EMAIL HAS NOT YET SET UP. THIS FUNCTION IS NOT DONE YET. ASK KEMENANGAN FOR EMAIL ---------------//
			$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: Kemenangan Jewellery' . "\r\n" .
						'Reply-To: kemenangan@gmail.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			
			if(!mail($to, $subject, $message, $headers))
			{
				return false;
			}else
			{
				return true;
			}
				
		}		

	}

?>