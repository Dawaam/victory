<?php 
	
class Sale_model extends CI_Model{

	function get_sale_by_outlet($outlet_id = ''){
		$this->db->select('sale.*, s1.name as sales_name, o1.name as outlet_name, c1.name as cashier, c2.name as customer');
		$this->db->from('sale');
		$this->db->join('accounts as s1','sale.sales_id = s1.id','left');
		$this->db->join('accounts as c1','sale.cashier_id = c1.id','left');
		$this->db->join('customers as c2','sale.customer_code = c2.code','left');
		$this->db->join('outlets as o1','sale.outlet_id = o1.id','left');
		if($outlet_id != ''){
			$this->db->where('sale.outlet_id',$outlet_id);	
		}
		$this->db->order_by('sale.date','desc');
		return $this->db->get()->result();
	}

	function get_sale_by_type($type_id = '',$type_name = ''){
		$this->db->select('sale_detail.*,products.name, products.photo, products.real_weight, products.rounded_weight, s1.name as sales_name, c1.name as cashier, c2.name as customer');
		$this->db->from('sale_detail');
		$this->db->join('sale','sale.sale_code = sale_detail.sale_code','left');
		$this->db->join('products','products.product_code = sale_detail.product_code','left');
		$this->db->join('accounts as s1','sale.sales_id = s1.id','left');
		$this->db->join('accounts as c1','sale.cashier_id = c1.id','left');
		$this->db->join('customers as c2','sale.customer_code = c2.code','left');
		$this->db->where('products.type_id',$type_id);	
		$this->db->or_where('products.type',$type_name);	
		$this->db->order_by('sale.date','desc'); 
		return $this->db->get()->result();
	}

	function get_sale_detail($outlet_id = '',$sale_code = ''){
		$this->db->select('sale_detail.*,products.name, products.photo, products.real_weight, products.rounded_weight, s1.name as sales_name, c1.name as cashier, c2.name as customer');
		$this->db->from('sale_detail');
		$this->db->join('sale','sale.sale_code = sale_detail.sale_code','left');
		$this->db->join('products','products.product_code = sale_detail.product_code','left');
		$this->db->join('accounts as s1','sale.sales_id = s1.id','left');
		$this->db->join('accounts as c1','sale.cashier_id = c1.id','left');
		$this->db->join('customers as c2','sale.customer_code = c2.code','left');
		if($outlet_id != 0){
			$this->db->where('sale.outlet_id',$outlet_id);
		}
		$this->db->where('sale.sale_code',$sale_code);
		$this->db->order_by('sale.date','desc');
		return $this->db->get()->result();
	}

}
