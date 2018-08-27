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
class Course extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
		$this->load->library('pagination');
        $this->load->model('Index_model'); 
        $this->load->model('Blog_model'); 
        $this->load->model('Product_model'); 
        $this->load->model('Keranjang_model'); 
        $this->load->model('Course_model'); 
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
$config["base_url"] = base_url() . "course/index";
$total_row = $this->Course_model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 6;
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
$data["results"] = $this->Course_model->fetch_data($config['per_page'], $page);
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
		   $data['results_populer'] = $this->Course_model->getCoursePopuler()->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
		   $data['kategori_course'] = $this->Course_model->getKategoriCourse()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'course';
		   $this->load->library('session');
	  $this->load->view('course/course', $data);
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
		   $data['results'] = $this->Course_model->getCourseKategori($id)->result();
		    $data['results_populer'] = $this->Course_model->getCoursePopuler()->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
		   $data['kategori_produk2'] = $this->Course_model->getKategoriCourse()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'course';
		   $this->load->library('session');
           
	  $this->load->view('course/course', $data);
	 
	   
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
		   $data['blog'] = $this->Blog_model->getBlog()->result();
		   $data['course'] = $this->Course_model->getCourseID($id)->result();
		   $data['course_section'] = $this->Course_model->getCourseSectionID($id)->result();
		   if($this->session->userdata('email')!=''){
			   $data['course_access'] = $this->Course_model->getCourseAccessID($id,$this->session->userdata('email'))->result();
		   }else{
			   $data['course_access'] = $this->Course_model->getCourseAccessID($id,'a')->result();
		   }
		   
		   $data['results_populer'] = $this->Course_model->getCoursePopuler()->result();
		   $data['results_kategori'] = $this->Course_model->getCourseKategori($data['course'][0]->id_kategori)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlogID($id)->result();
		   $data['kategori_produk2'] = $this->Course_model->getKategoriCourse()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		   $data['course_comments'] = $this->Comment_model->getCommentCourse($id)->result();
           $data['error'] = '';
           $data['menu'] = 'course';
		   $this->load->library('session');
           
	  $this->load->view('course/coursedetail', $data);
        
    }
	
	
	
	function comment(){
		if($this->session->userdata('email')==''){
			echo "<script>alert('Silahkan Login Untuk Menambahkan Komentar Pada Produk/Course!');window.location.href='../index/login';</script>";
		}else{
		$isi = $this->input->post('isi');
		$id = $this->input->post('id');
		
        
			$datax = array(
                'isi' => $this->input->post('isi'),
                'id_course' => $this->input->post('id'),
                'email' => $this->session->userdata('email'),
                'date' => time()
               
            );
            $this->db->insert('course_comments', $datax);
           echo "<script>alert('Komentar Anda Berhasil Di Tambahkan!');window.location.href='id/$id';</script>";
		}
	}
	
	
	function hapus($id,$id_course) {
	
			$id = urldecode($id);
			$id_course = urldecode($id_course);
			if($this->session->userdata('akses')==9){
			$this->db->where("id", $id);	
			$this->db->delete(course_comments);
			echo "<script>alert('Komentar Berhasil Di Hapus!');window.location.href='".site_url()."course/id/$id_course';</script>";
			}else{
			echo "<script>alert('Terjadi Kesalahan!');window.location.href='".site_url()."course/id/$id_course';</script>";
			}
			
           
        
    }
    
    
    function search(){
		$text = urldecode($this->input->post('search'));
		
		
		    $hasil = $this->Course_model->getCourseSearch($text)->result();
		
		
        
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
		   $data['results'] = $hasil;
		   $data['results_populer'] = $this->Course_model->getCoursePopuler()->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
		   $data['kategori_course'] = $this->Course_model->getKategoriCourse()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'course';
		   $this->load->library('session');
	  $this->load->view('course/course', $data);
            
         
	}
	
	
	
   
	
	
	
}
