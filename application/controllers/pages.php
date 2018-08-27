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
class Pages extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Index_model'); 
        $this->load->model('Admin_model'); 
        $this->load->model('Blog_model'); 
        $this->load->model('Product_model'); 
		$this->load->library(array('session'));
    }	function tawk(){
        echo "
<script type='text/javascript'>
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement('script'),s0=document.getElementsByTagName('script')[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b4462d54af8e57442dc7c1e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>";
    }
function index() {
	   $this->tawk();
		redirect(base_url(), 'refresh');
        
    }
	
	function id($id) {
	$this->tawk();
			$id = urldecode($id);
			
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['pages'] = $this->Index_model->getPages()->result();
           $data['pagesdetail'] = $this->Index_model->getPagesID($id)->result();
		   $data['blog'] = $this->Admin_model->getBlog()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'pages';
		   $this->load->library('session');
            $this->load->view('pages/pagesdetail',$data);
        
    }
   
	
	
	
}
