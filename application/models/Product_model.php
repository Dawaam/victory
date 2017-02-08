<?php 
	
class Product_model extends CI_Model{

	function get_product_all_outlet(){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type, suppliers.name as supplier');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('type','type.id = products.type_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->join('suppliers','suppliers.id = products.supplier_id','left');
		$this->db->where('products.status','available');
		$this->db->order_by('products.status','asc');
		return $this->db->get()->result();
	}

	function get_product_outlet($outlet_id = '',$status=''){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type,type.id as type_id,type.name as type_name');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('type','type.id = products.type_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		if($outlet_id != 0){
			$this->db->where('products.outlet_id',$outlet_id);	
		}
		if($status == ''){
			$this->db->where('products.status','available');	
		}elseif($status !=''){
			$this->db->where('products.status',$status);
		}
		
		$this->db->order_by('products.status','asc');
		return $this->db->get()->result();
	}

	function get_product_by_code($product_code = '', $outlet_id = ''){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type,category.name as category,type.name as type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->where('products.product_code',$product_code);
		if($outlet_id != 0){
			$this->db->where('products.outlet_id',$outlet_id);	
		}

		$this->db->join('category','category.id = tray.category_id');
		$this->db->join('type','type.id = category.type_id');
		$this->db->where('products.status','available');
		$this->db->order_by('products.status','asc');
		return $this->db->get()->row();
	}

	function get_product_detail($product_code = ''){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type,type.id as type_id,type.name as type_name');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('type','type.id = products.type_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->where('products.product_code',$product_code);
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->row();
	}

	
}

?>