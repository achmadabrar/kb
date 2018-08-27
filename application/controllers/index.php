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
class Index extends CI_Controller {

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
			$this->tawk();
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
		   $data['slider'] = $this->Admin_model->getSlider()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		   
		   
		   
		   $config = array();
$config["base_url"] = base_url() . "product/index";
$total_row = $this->Product_model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 4;
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
$data["results"] = $this->Product_model->fetch_data($config['per_page'], $page);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );



$data["resultscourse"] = $this->Course_model->fetch_data(4, 1);
		   $data['toast'] = '';
		   
           $data['error'] = '';
           $data['menu'] = 'beranda';
		   $this->load->library('session');
            $this->load->view('index/index',$data);
        
    }
	
	function login() {
		$this->tawk();
		 if (($this->session->userdata('email') == "")) {
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
		   $data['error'] = '';
		   $data['toast'] = '';
           $data['menu'] = 'login';
           
           $this->load->view('index/login', $data);
		 }else{
           
		   redirect('index');
		}

    }
	
	function registrasi() {
		$this->tawk();
			 if (($this->session->userdata('email') == "")) {
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
           $data['menu'] = 'registrasi';
           $this->load->view('index/registrasi', $data);
		   }
		else{
			  redirect('index');
		}
    }
	
	function login_masuk(){
		$email = $this->input->post('email');
        $password = $this->input->post('password');

        $cek_login = $this->Index_model->cekLogin($email, $password);
        if ($cek_login == 1) {
			if($this->session->userdata('akses')==1){
				$this->tawk();
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
		   $data['slider'] = $this->Admin_model->getSlider()->result();
		   $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		   
		   
		   
		   $config = array();
$config["base_url"] = base_url() . "product/index";
$total_row = $this->Product_model->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 4;
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
$data["results"] = $this->Product_model->fetch_data($config['per_page'], $page);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );



$data["resultscourse"] = $this->Course_model->fetch_data(4, 1);
		   
		   
           $data['toast'] = 'berhasil';
           $data['error'] = '';
           $data['menu'] = 'beranda';
		   $this->load->library('session');
            $this->load->view('index/index',$data);
        
			}else{
				redirect('admin');
			}
            
        } 
        else if($cek_login==0) { // email belum dikonfirmasi
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
		   $data['error'] = '';
		   $data['toast'] = 'belumdikonfirmasi';
           $data['menu'] = 'login';
           $this->load->view('index/login', $data);
        }
        else if($cek_login==9) { // email atau password salah
	//	echo "<script>alert('Email atau Password Salah, Silahkan Ulangi Kembali');window.location.href='login';</script>";
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
		   $data['error'] = '';
		   $data['toast'] = 'error';
           $data['menu'] = 'login';
           $this->load->view('index/login', $data);
        }
	}
	
	function registrasi_masuk(){
		
		$email = $this->input->post('email');

        $cek_registrasi = $this->Index_model->cekRegistrasi($email);
        if ($cek_registrasi == true) {
			$datax = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nomor_handphone' => $this->input->post('telepon'),
                'foto' => 'avatar.jpg',
                'akses' => 1,
                'status' => 0
            );
            $this->db->insert('users', $datax);
           //echo "<script>alert('Selamat, anda berhasil melakukan registrasi anggota Kitong Bisa, silahkan login!');window.location.href='login';</script>";
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
		   $data['error'] = $this->input->post('email');
		   $data['toast'] = 'berhasilregistrasi';
           $data['menu'] = 'login';
           $this->load->view('index/login', $data);
        } else { // email atau password salah
	//	echo "<script>alert('Email yang anda masukan tidak tersedia, Silahkan gunakan email lain');window.location.href='registrasi';</script>";
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
		
		 $data['error'] = 10;
		   $data['toast'] = 'emailterdaftar';
           $data['menu'] = 'login';
           $this->load->view('index/login', $data);
        }
	}
	
	function lupa_password(){
		$this->tawk();
			 if (($this->session->userdata('email') == "")) {
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
           $data['menu'] = 'lupa-password';
           $this->load->view('index/lupa-password', $data);
		   }
		else{
			  redirect('index');
		}
	}
	
	function lupa_password_masuk(){
		
		$email = $this->input->post('email');

        $cek_registrasi = $this->Index_model->getUserEmail($email)->result();
        if (count($cek_registrasi) != 0) {
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
		   $data['toast'] = 'berhasilreset';
           $data['menu'] = 'login';
           $this->load->view('index/login', $data);
        } else { // email atau password salah
		
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
		   $data['error'] = '';
		   $data['toast'] = 'error';
           $data['menu'] = 'login';
           $this->load->view('index/lupa-password', $data);
        }
	}
	
	function hubungi_kami() {
			$this->tawk();
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['email'] = $this->Index_model->getInformasi('email');
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
           $data['error'] = '';
           $data['menu'] = 'hubungi-kami';
		   $this->load->library('session');
            $this->load->view('index/hubungi-kami',$data);
        
    }
	
	function daftar_pembelian() {
		$this->tawk();
		 if (($this->session->userdata('email') != "")) {
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
		   $data['order'] = $this->Index_model->getOrderEmail($this->session->userdata('email'))->result();
		   $data['order_details'] = $this->Index_model->getOrderDetailsEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = '';
           $data['menu'] = 'daftar-pemesanan';
           $this->load->view('index/daftar-pemesanan', $data);
		 }else{
           
		   redirect('index');
		}

    }
	
	function invoice_pembelian($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['order'] = $this->Admin_model->getOrderID($id)->result();
           $data['order_details'] = $this->Admin_model->getOrderDetailsID($id)->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		    $tes = $this->Admin_model->getOrderID($id)->result();
		   if ($tes[0]->email!=$this->session->userdata('email') OR count($tes)==0) {
            redirect('index');
			} 
			
           $data['error'] = '';
           $data['menu'] = 'invoice-pembelian';
		   $this->load->library('session');
            $this->load->view('index/invoice',$data);
    }
	
	function daftar_course() {
		$this->tawk();
		 if (($this->session->userdata('email') != "")) {
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
		   $data['course'] = $this->Course_model->getCourseAccessEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = '';
           $data['menu'] = 'daftar-course';
           $this->load->view('index/daftar-course', $data);
		 }else{
           
		   redirect('index');
		}

    }

	function halaman_profil() {
		$this->tawk();
		 if (($this->session->userdata('email') != "")) {
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = '';
           $data['menu'] = 'halaman-profil';
           $this->load->view('index/halaman-profil', $data);
		 }else{
           
		   redirect('index');
		}

    }
	
	function update_profil(){
		if($this->input->post('nama')==null){
		     redirect('index/halaman_profil');
		
		}
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');

			$datax = array(
                'nama_lengkap' => $this->input->post('nama'),
                'nomor_handphone' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            );
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('users', $datax);
            
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = 1;
           $data['menu'] = 'halaman-profil';
           $this->load->view('index/halaman-profil', $data);
           //echo "<script>alert('Data Anda Berhasil Diperbarui!');window.location.href='halaman_profil';</script>";
       
	}
	
	function ubah_password() {
		$this->tawk();
		 if (($this->session->userdata('email') != "")) {
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = '';
           $data['menu'] = 'halaman-profil';
           $this->load->view('index/ubah-password', $data);
		 }else{
           
		   redirect('index');
		}

    }
    
    function update_password(){
		
		$password = $this->input->post('password');
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');
		
		if($password1!=$password2){
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = 2;
           $data['menu'] = 'halaman-profil';
           $this->load->view('index/ubah-password', $data);
//           $this->load->view('index/halaman-profil', $data);
		    
		}
		
		else if($this->Index_model->cekPassword($this->session->userdata('email'),md5($password))==false){
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = 1;
           $data['menu'] = 'halaman-profil';
         
           $this->load->view('index/ubah-password', $data);
//           $this->load->view('index/halaman-profil', $data);
		}
		else if($this->Index_model->cekPassword($this->session->userdata('email'),md5($password1))==true){
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = 4;
           $data['menu'] = 'halaman-profil';
           
           $this->load->view('index/ubah-password', $data);
          // $this->load->view('index/halaman-profil', $data);
		
		}
		else{
		    $datax = array(
                'password' => md5($password1)
            );
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('users', $datax);
            
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
		   $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
		  
		   $data['error'] = 33;
           $data['menu'] = 'halaman-profil';
          
//           $this->load->view('index/ubah-password', $data);
           $this->load->view('index/halaman-profil', $data);
		}

			
       
	}
	
	
	function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata();
        redirect(base_url(), 'refresh');
    }
}
