<?php

class Index_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	function getInformasi($info) {
        $sql = "SELECT isi as isi FROM site_settings WHERE nama_setting='$info'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			$rows = $query->row();
            return $rows->isi;
        } else {
			$null= '';
            return $null;
        }
    }
	
    function getUsers() {
        $sql = "SELECT * FROM users ORDER BY ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return $query;
        }
    }
	
	function getPages() {
        $sql = "SELECT * FROM pages ORDER BY id ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return $query;
        }
    }
	
	function getPagesID($id) {
        $sql = "SELECT * FROM pages WHERE id=$id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return $query;
        }
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




    
    function cekLogin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            $rows = $query->row();
            if($rows->status==1){
                $data = array(
                'id' => $rows->id,
                'email' => $rows->email,
                'nama_lengkap' => $rows->nama_lengkap,
                'nomor_handphone' => $rows->nomor_handphone,
                'foto' => $rows->foto,
                'akses' => $rows->akses,
                'logged_in' => TRUE
            );

            //$this->session->set_userdata('users', $data);
            $this->session->set_userdata($data);
            return 1;
            }else{
             return 0;
            }
            
        } else {
            return 9;
        }
    }
	
	function cekRegistrasi($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
			return false;
        } else {
            return true;
        }
    }
    
    function cekPassword($email,$pass) {
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
			return true;
        } else {
            return false;
        }
    }
	
	function getUserEmail($email) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return $query;
        }
    }
	
	
	
	function getOrderEmail($email) {
        $this->db->where("email", $email);
        $this->db->from("orders");
        return $this->db->get();
    }
	
	function getOrderDetailsEmail($email) {
        $this->db->where("email", $email);
        $this->db->from("orders_detail");
        return $this->db->get();
    }


}

