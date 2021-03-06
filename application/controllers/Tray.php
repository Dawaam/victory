<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Tray extends MY_Controller{
		function __construct(){
			parent::__construct();
			if($this->session_role=='sales'){
				redirect('home');
			}
			$this->load->model('category_model');
			$this->load->model('tray_model');
		}

		public function index(){
			
			$data['title'] = 'Daftar Baki';
			$data['trays'] = $this->tray_model->get_tray($this->session_outlet);
			$data['category'] = $this->category_model->get_category('category');
			$this->template->load($this->default,'tray/list_tray',$data);
		
		}

		public function detail($code = ''){
			$data['title'] = 'Detail Penjualan';
			$data['details'] = $this->tray_model->get_tray_detail($this->session_outlet,$code);
			$this->template->load($this->default,'tray/tray_detail',$data);
		}

		public function add_tray(){
			if($this->session_role!='manager'){
				redirect('home');
			}
			if($this->input->post('submit')){
				$data= array(
						'code' => $this->input->post('tray_code'),
						'outlet_id'=> $this->session_outlet,
						'category_id' => $this->input->post('tray_category'),
						'name'	=> $this->input->post('tray_name')
				);
	            $this->crud_model->insert_data('tray',$data);
	            $this->session->set_flashdata('tray',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Baki telah ditambahkan',
				    type: 'success'
				});");
				redirect('tray');
			}else{
				$this->index();
			}
		}

		public function delete_tray($id){
			if($this->session_role!='manager'){
				redirect('home');
			}
			if($this->crud_model->delete_data('tray',array('id'=>$id))){
				$this->session->set_flashdata('tray',"$.Notify({
					caption: 'Berhasil',
					content : 'Baki telah dihapus',
					type: 'success'
				});");
				redirect('tray');
			}else{
				$this->session->set_flashdata('tray',"$.Notify({
					caption: 'Gagal',
					content : 'Baki gagal dihapus',
					type : 'alert'
				});");
			}
		}

		public function check_code($category_id, $number){
			$category_code = $this->db->get_where('category',array('id' => $category_id))->row('code');
			$tray_code = $this->db->get_where('tray',array('code' => $category_code.$number,'outlet_id' => $this->session_outlet))->row('code');
			if($tray_code != NULL){
				echo 'taken';
			}else{
				echo $category_code.$number;
			}
		}
		
	}

?>