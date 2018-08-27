<?php

class Product_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	
	function getKategoriProduct() {
	    $this->db->order_by("id","asc");
        $this->db->from("product_kategori");
        return $this->db->get();
    }
	
	function getKategoriProductID($id) {
        $this->db->where("id", $id);
        $this->db->from("product_kategori");
        return $this->db->get();
    }
    
	function getProduct() {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->from("product");
		return $this->db->get();
    }
	
	function getProductPopuler() {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->where("populer", 1);
		$this->db->from("product");
		return $this->db->get();
    }
	function getProductKategori($id) {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->where("id_kategori", $id);
        $this->db->from("product");
        return $this->db->get();
    }
	
	function getProductID($id) {
        $this->db->where("id", $id);
        $this->db->from("product");
        return $this->db->get();
    }
	
	function getUserEmail($email) {
        $this->db->where("email", $email);
        $this->db->from("users");
        return $this->db->get();
    }
	
	public function record_count() {
		return $this->db->count_all("product");
	}


	public function fetch_data($limit, $start) {
	$offset = ($start-1)*$limit;
	$this->db->order_by("id","desc");$this->db->select('*');
	$this->db->limit($limit, $offset);
	$query = $this->db->get("product");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

		return $data;
		}
		return false;
	}
	
	public function record_count_kategori($id) {
		 $this->db->where("id_product", $id);
		return $this->db->count_all("product");
	}


	public function fetch_data_kategori($limit, $start,$id) {
	$offset = ($start-1)*$limit;
	$this->db->where("id_kategori", $id);
	$this->db->limit($limit, $offset);
	$query = $this->db->get("product");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

		return $data;
		}
		return false;
	}


function getProductSearch($text) {
        $this->db->like("title", $text);
        $this->db->order_by("id","desc");
        $this->db->from("product");
        return $this->db->get();
    }
    
    function getProductSearchKategori($text,$kategori) {
        $this->db->like("title", $text);
        $this->db->order_by("id","desc");
        $this->db->where("id_kategori", $kategori);
        $this->db->from("product");
        return $this->db->get();
    }
    

}

