<?php 
	
class Product_model extends CI_Model{

	function get_product_all_outlet(){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->result();
	}

	function get_product_outlet($outlet_id){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->where('products.outlet_id',$outlet_id);
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->result();
	}

}

?>