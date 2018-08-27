<?php

class Comment_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	
	function getCommentProduct($id) {
		$this->db->order_by("date","desc");
		$this->db->select('*');
		 $this->db->where("id_product", $id);
        $this->db->from("product_comments");
        return $this->db->get();
    }
	
	function getCommentCourse($id) {
		$this->db->order_by("date","desc");
		$this->db->select('*');
		 $this->db->where("id_course", $id);
        $this->db->from("course_comments");
        return $this->db->get();
    }
    
    function getCommentBlog($id) {
		$this->db->order_by("date","desc");
		$this->db->select('*');
		 $this->db->where("id_blog", $id);
        $this->db->from("blog_comments");
        return $this->db->get();
    }
	
	

    

}

