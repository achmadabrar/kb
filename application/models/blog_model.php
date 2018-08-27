<?php

class Blog_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	
	function getKategoriBlog() {
        $this->db->from("blog_kategori");
        return $this->db->get();
    }
	
	function getKategoriBlogID($id) {
        $this->db->where("id", $id);
        $this->db->from("blog_kategori");
        return $this->db->get();
    }
    
	function getBlog() {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->from("blog");
		return $this->db->get();
    }
	function getBlogKategori($id) {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->where("id_kategori", $id);
        $this->db->from("blog");
        return $this->db->get();
    }
    
    function getBlogSearch($text) {
        $this->db->like("title", $text);
        $this->db->order_by("id","desc");
        $this->db->from("blog");
        return $this->db->get();
    }
    
    function getBlogSearchKategori($text,$kategori) {
        $this->db->like("title", $text);
        $this->db->order_by("id","desc");
        $this->db->where("id_kategori", $kategori);
        $this->db->from("blog");
        return $this->db->get();
    }
	
	function getBlogID($id) {
        $this->db->where("id", $id);
        $this->db->from("blog");
        return $this->db->get();
    }
	
	function getUserEmail($email) {
        $this->db->where("email", $email);
        $this->db->from("users");
        return $this->db->get();
    }
	
	public function record_count() {
		return $this->db->count_all("blog");
	}


	public function fetch_data($limit, $start) {
	$offset = ($start-1)*$limit;
	$this->db->order_by("id","desc");$this->db->select('*');
	$this->db->limit($limit, $offset);
	$query = $this->db->get("blog");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

		return $data;
		}
		return false;
	}
	
	public function record_count_kategori($id) {
		 $this->db->where("id_kategori", $id);
		return $this->db->count_all("blog");
	}


	public function fetch_data_kategori($limit, $start,$id) {
	$offset = ($start-1)*$limit;
	$this->db->where("id_kategori", $id);
	$this->db->limit($limit, $offset);
	$query = $this->db->get("blog");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

		return $data;
		}
		return false;
	}

    

}

