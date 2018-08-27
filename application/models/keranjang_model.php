<?php

class Keranjang_model extends CI_Model {

  

    function __construct() {
        parent::__construct();
    }


	function cekCartProduk($id,$type,$email) {
        $sql = "SELECT id as isi, quantity as qty FROM cart WHERE id_produk=$id AND tipe=$type AND email_user='$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			$rows = $query->row();
			$data= array('id' => $rows->isi,
						 'quantity' => $rows->qty
							);
            return $data;
        } else {
			
			$data= array('id' => 0,
						 'quantity' => 0
							);
            return $data;
			
        }
    }
	
	function cekCartUser($email) {
        $this->db->where("email_user", $email);
        $this->db->from("cart");
        return $this->db->get();
    }
	

}

