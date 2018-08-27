<?php

class Course_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	
	function getKategoriCourse() {
        $this->db->from("course_kategori");
        return $this->db->get();
    }
	
	function getKategorigetKategoriCourseID($id) {
        $this->db->where("id", $id);
        $this->db->from("course_kategori");
        return $this->db->get();
    }
    
	function getCourse() {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->from("course");
		return $this->db->get();
    }
	
	function getCoursePopuler() {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->where("populer", 1);
		$this->db->from("course");
		return $this->db->get();
    }
	function getCourseKategori($id) {
		$this->db->order_by("id","desc");$this->db->select('*');
		$this->db->where("id_kategori", $id);
        $this->db->from("course");
        return $this->db->get();
    }
	
	function getCourseID($id) {
        $this->db->where("id", $id);
        $this->db->from("course");
        return $this->db->get();
    }
	
	function getCourseSectionID($id) {
        $this->db->where("id_course", $id);
        $this->db->from("course_section");
        return $this->db->get();
    }
	
	function getCourseAccessEmail($email) {
        $this->db->where("email", $email);
        $this->db->where("status", 1);
        $this->db->where("tipe", 2);
        $this->db->from("orders_detail");
        return $this->db->get();
    }
	
	function getCourseAccessID($id,$email) {
        $this->db->where("id_produk", $id);
        $this->db->where("email", $email);
        $this->db->where("status", 1);
        $this->db->where("tipe", 2);
        $this->db->from("orders_detail");
        return $this->db->get();
    }
	
	function getUserEmail($email) {
        $this->db->where("email", $email);
        $this->db->from("users");
        return $this->db->get();
    }
	
	public function record_count() {
		return $this->db->count_all("course");
	}


	public function fetch_data($limit, $start) {
	$offset = ($start-1)*$limit;
	$this->db->order_by("id","desc");$this->db->select('*');
	$this->db->limit($limit, $offset);
	$query = $this->db->get("course");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

		return $data;
		}
		return false;
	}
	
	public function record_count_kategori($id) {
		 $this->db->where("id_course", $id);
		return $this->db->count_all("course");
	}


	public function fetch_data_kategori($limit, $start,$id) {
	$offset = ($start-1)*$limit;
	$this->db->where("id_kategori", $id);
	$this->db->limit($limit, $offset);
	$query = $this->db->get("course");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

		return $data;
		}
		return false;
	}
	
	function getCourseSearch($text) {
        $this->db->like("title", $text);
        $this->db->order_by("id","desc");
        $this->db->from("course");
        return $this->db->get();
    }

    

}

