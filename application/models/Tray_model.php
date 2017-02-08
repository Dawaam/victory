<?php 
class Tray_model extends CI_Model{
	function get_tray($outlet_id = ''){
		$this->db->select('tray.*,category.name as category,type.name as type');
		$this->db->from('tray');
		$this->db->join('category','category.id = tray.category_id');
		$this->db->join('type','type.id = category.type_id');
		$this->db->where('tray.outlet_id',$outlet_id);
		$this->db->order_by('tray.code','asc');
		return $this->db->get()->result();
	}

	function get_specific_tray($tray_id =''){
		$this->db->select('tray.*,category.name as category,type.name as type');
		$this->db->from('tray');
		$this->db->join('category','category.id = tray.category_id');
		$this->db->join('type','type.id = category.type_id');
		$this->db->where('tray.id',$tray_id);
		return $this->db->get()->row();
	}

	function get_tray_detail($outlet_id = '', $tray_code=''){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		if($outlet_id != ''){
			$this->db->where('products.outlet_id',$outlet_id);	
		}
		$this->db->where('tray.code',$tray_code);
		$this->db->where('products.status','available');
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->result();
	}
}
