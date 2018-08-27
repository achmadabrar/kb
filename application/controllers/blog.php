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
class Blog extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
		$this->load->library('pagination');
        $this->load->model('Index_model'); 
        $this->load->model('Blog_model'); 
        $this->load->model('Product_model'); 
        $this->load->model('Admin_model'); 
        $this->load->model('Comment_model'); 
		$this->load->library(array('session'));
		
    }
	
		function tawk(){
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
		$config = array();
$config["base_url"] = base_url() . "blog/index";
$total_row = $this->Blog_model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 3;
$config['use_page_numbers'] = TRUE;
$config['num_links'] = $total_row;
$config['cur_tag_open'] = '&nbsp;<a class="active tran3s">';
$config['cur_tag_close'] = '</a>';
$config['next_link'] = "<i class='fa fa-arrow-right' aria-hidden='true'></i>";
$config['prev_link'] = "<i class='fa fa-arrow-left' aria-hidden='true'></i>";

$this->pagination->initialize($config);
if($this->uri->segment(3)){
$page = ($this->uri->segment(3)) ;
}
else{
$page = 1;
}
$data["results"] = $this->Blog_model->fetch_data($config['per_page'], $page);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

		
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['pages'] = $this->Index_model->getPages()->result();
		   $data['blog'] = $this->Blog_model->getBlog()->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		    $data['kategori_id'] = '';
           $data['error'] = '';
           $data['menu'] = 'blog';
		   $this->load->library('session');
		
           
	  $this->load->view('blog/blog', $data);
	 
	   
    }
	
	
	function kategori($id) {
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
		   $data['results'] = $this->Blog_model->getBlogKategori($id)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['kategori_id'] = $id;
           $data['menu'] = 'blog';
		   $this->load->library('session');
           
	  $this->load->view('blog/blog', $data);
	 
	   
    }
	
	
	
	
	function id($id) {
	
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
		   $data['blog'] = $this->Blog_model->getBlogID($id)->result();
		   $data['penulis'] = $this->Blog_model->getUserEmail($data['blog'][0]->author_email)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlogID($id)->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		    $data['blog_comments'] = $this->Comment_model->getCommentBlog($id)->result();
           $data['error'] = '';
           $data['menu'] = 'blog';
		   $this->load->library('session');
           
	  $this->load->view('blog/blogdetail', $data);
        
    }
    
    function comment(){
		if($this->session->userdata('email')==''){
			echo "<script>window.location.href='../index/login';</script>";
		}else{
		$isi = $this->input->post('isi');
		$id = $this->input->post('id');
		
        
			$datax = array(
                'isi' => $this->input->post('isi'),
                'id_blog' => $this->input->post('id'),
                'email' => $this->session->userdata('email'),
                'date' => time()
               
            );
            $this->db->insert('blog_comments', $datax);
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['pages'] = $this->Index_model->getPages()->result();
		   $data['blog'] = $this->Blog_model->getBlogID($id)->result();
		   $data['penulis'] = $this->Blog_model->getUserEmail($data['blog'][0]->author_email)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlogID($id)->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		   $data['blog_comments'] = $this->Comment_model->getCommentBlog($id)->result();
           $data['error'] = 1;
           $data['menu'] = 'blog';
		   $this->load->library('session');
           
	  $this->load->view('blog/blogdetail', $data);
            
            
          // echo "<script>alert('Komentar Anda Berhasil Di Tambahkan!');window.location.href='id/$id';</script>";
		}
	}
	
	
	function hapus($id,$id_product) {
	
			$id = urldecode($id);
			$id_product = urldecode($id_product);
			if($this->session->userdata('akses')==9){
			$this->db->where("id", $id);	
			$this->db->delete('blog_comments');
			echo "<script>alert('Komentar Berhasil Di Hapus!');window.location.href='".site_url()."blog/id/$id_product';</script>";
			}else{
			echo "<script>alert('Terjadi Kesalahan!');window.location.href='".site_url()."blog/id/$id_product';</script>";
			}
	}
	
	
	 function search(){
		$text = urldecode($this->input->post('search'));
		$kategori = urldecode($this->input->post('kategori'));
		
		if($kategori==null){
		    $hasil = $this->Blog_model->getBlogSearch($text)->result();
		}else{
		    $hasil = $this->Blog_model->getBlogSearchKategori($text,$kategori)->result();
		}
		
        
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['pages'] = $this->Index_model->getPages()->result();
		   $data['results'] = $hasil;
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		   $data['kategori_id'] = $kategori;
           $data['error'] = '';
           $data['menu'] = 'blog';
		   $this->load->library('session');
           
	  $this->load->view('blog/blog', $data);
            
            
         
	}
	
	
   
	
	
	
}
