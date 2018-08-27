<?php

class Admin_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	function getAnggota() {
        $this->db->where("status", 1);
        $this->db->from("users");
        return $this->db->get();
    }
	
	function getAnggotaID($id) {
        $this->db->where("id", $id);
        $this->db->from("users");
        return $this->db->get();
    }
	
	function getHalaman() {
        $this->db->from("pages");
        return $this->db->get();
    }
	
	function getHalamanID($id) {
        $this->db->where("id", $id);
        $this->db->from("pages");
        return $this->db->get();
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
        $this->db->from("blog");
        return $this->db->get();
    }
	
	function getBlogID($id) {
        $this->db->where("id", $id);
        $this->db->from("blog");
        return $this->db->get();
    }
	
	function getSlider() {
        $this->db->from("slide");
        return $this->db->get();
    }
	
	function getSliderID($id) {
        $this->db->where("id", $id);
        $this->db->from("slide");
        return $this->db->get();
    }

	
	function getKategoriProduct() {
        $this->db->from("product_kategori");
        return $this->db->get();
    }
	
	function getKategoriProductID($id) {
        $this->db->where("id", $id);
        $this->db->from("product_kategori");
        return $this->db->get();
    }
    
	function getProduct() {
        $this->db->from("product");
        return $this->db->get();
    }
	
	function getProductID($id) {
        $this->db->where("id", $id);
        $this->db->from("product");
        return $this->db->get();
    }
	
	function getKategoriCourse() {
        $this->db->from("course_kategori");
        return $this->db->get();
    }
	
	function getKategoriCourseID($id) {
        $this->db->where("id", $id);
        $this->db->from("course_kategori");
        return $this->db->get();
    }
    
	function getCourse() {
        $this->db->from("course");
        return $this->db->get();
    }
	
	function getCourseID($id) {
        $this->db->where("id", $id);
        $this->db->from("course");
        return $this->db->get();
    }
	
	function getSectionCourse($course) {
		$this->db->where("id_course", $course);
        $this->db->from("course_section");
        return $this->db->get();
    }
	
	function getSectionID($id) {
        $this->db->where("id", $id);
        $this->db->from("course_section");
        return $this->db->get();
    }
	
	function getOrder() {
        $this->db->from("orders");
        return $this->db->get();
    }
	
	function getOrderID($id) {
        $this->db->where("id", $id);
        $this->db->from("orders");
        return $this->db->get();
    }
	
	function getOrderDetailsID($id) {
        $this->db->where("order_id", $id);
        $this->db->from("orders_detail");
        return $this->db->get();
    }
    
    function getKomentarProduk() {
        $this->db->from("product_comments");
        return $this->db->get();
    }
    
    function getKomentarCourse() {
        $this->db->from("course_comments");
        return $this->db->get();
    }
    function getKomentarBlog() {
        $this->db->from("blog_comments");
        return $this->db->get();
    }


    
   
	
	

}

