<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of base
 *
 * @author hugaf
 */
class Reset_password extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Index_model'); 
        $this->load->model('Admin_model'); 
        $this->load->model('Product_model'); 
        $this->load->model('Blog_model'); 
		$this->load->model('Course_model'); 
		$this->load->library(array('session'));
			
    }
    
    function id($kode) {
				$kode = urldecode($kode);
				$email = $this->my_simple_crypt($kode, 'd' );
				if($email==''){
				    redirect('index');
				}else{
				     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                       $newpass = substr(str_shuffle($chars),0,8);
				    $data = array(
					'password' => md5($newpass)
				);
				   $this->db->where("email", $email);	
                   $this->db->update('users', $data);
                   
                    $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
		   $data['pages'] = $this->Index_model->getPages()->result();
		   $data['blog'] = $this->Admin_model->getBlog()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		   $data['error'] = $email;
		   $data['newpassword'] = $newpass;
		   $data['toast'] = 'berhasilreset2';
           $data['menu'] = 'login';
           $this->load->view('index/login', $data);
				}
        
    }
    
    public function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'kitongbisasecret';
    $secret_iv = 'dimasnurpanca';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
    }
	

	

	
	
}