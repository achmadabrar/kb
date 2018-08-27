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
class Admin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Index_model'); 
        $this->load->model('Admin_model'); 
		$this->load->library(array('session'));
		
		if($this->session->userdata('akses')==1){
			redirect('index', 'refresh');
		}
		
		if($this->session->userdata('email')==''){
			redirect('index', 'refresh');
		}
    }

    function index() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
		   $data['total_user'] = count($this->Admin_model->getAnggota()->result());
		   $data['total_produk'] = count($this->Admin_model->getProduct()->result());
		   $data['total_course'] = count($this->Admin_model->getCourse()->result());
           $data['error'] = '';
           $data['menu'] = 'beranda';
		   $this->load->library('session');
            $this->load->view('admin/index',$data);
        
    }
	
	function daftar_anggota() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['anggota'] = $this->Admin_model->getAnggota()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-anggota';
		   $this->load->library('session');
            $this->load->view('admin/daftar-anggota',$data);
        
    }
	
	function edit_anggota($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['anggota'] = $this->Admin_model->getAnggotaID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-anggota';
		   $this->load->library('session');
            $this->load->view('admin/edit-anggota',$data);
    }
	
	function update_anggota() {
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nomor_handphone = $this->input->post('nomor_handphone');
		$password = $this->input->post('password');
		$akses = $this->input->post('akses');
		$id = $this->input->post('id');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		if ($nama_foto == null) {
			//$data = array('upload_data' => $this->upload->data());
				
			if($password==null){
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nomor_handphone' => $this->input->post('nomor_handphone'),
					'akses' => $this->input->post('akses')
				);
			}else{
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nomor_handphone' => $this->input->post('nomor_handphone'),
					'password' => md5($this->input->post('password')),
					'akses' => $this->input->post('akses')
				);
			}	
             $this->db->where("id", $id);	
            $this->db->update('users', $data);
            echo "<script>alert('Berhasil memperbarui profil anggota!');window.location.href='edit_anggota/$id';</script>";
		}else{
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				if($password==null){
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nomor_handphone' => $this->input->post('nomor_handphone'),
					'akses' => $this->input->post('akses'),
					'foto' => $new_name
				);
			}else{
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nomor_handphone' => $this->input->post('nomor_handphone'),
					'password' => md5($this->input->post('password')),
					'akses' => $this->input->post('akses'),
					'foto' => $new_name
				);
			}	
            
            $this->db->where("id", $id);	
            $this->db->update('users', $data);
            echo "<script>alert('Berhasil memperbarui profil anggota!');window.location.href='edit_anggota/$id';</script>";
		}
		
		
		
		
    }
	
	function hapus_anggota($id) {
		$id = urldecode($id);
        $datax = array(
                'status' => 0
            );
		 $this->db->where("id", $id);	
        $this->db->delete('users');
		echo "<script>alert('Berhasil menghapus anggota!');window.location.href='../daftar_anggota';</script>";
    }
	
	function tambah_anggota() {
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['error'] = '';
           $data['menu'] = 'tambah-anggota';
		   $this->load->library('session');
            $this->load->view('admin/tambah-anggota',$data);
    }
	
	function insert_anggota() {
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nomor_handphone = $this->input->post('nomor_handphone');
		$password = $this->input->post('password');
		$akses = $this->input->post('akses');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
		$cek_email = $this->Index_model->cekRegistrasi($email);
        if ($cek_email == false) {
           echo "<script>alert('Email tersebut sudah dipakai, silahkan gunakan email lain!');window.location.href='tambah_anggota';</script>";
        } else { // email tersedia
		if ($nama_foto == null) {
				$data = array(
					'email' => $this->input->post('email'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nomor_handphone' => $this->input->post('nomor_handphone'),
					'password' => md5($this->input->post('password')),
					'foto' => 'avatar.jpg',
					'akses' => $this->input->post('akses'),
					'status' => 1
				);	
            $this->db->insert('users', $data);
            echo "<script>alert('Berhasil menambahkan anggota!');window.location.href='tambah_anggota';</script>";
		}else{
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				$data = array(
					'email' => $this->input->post('email'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nomor_handphone' => $this->input->post('nomor_handphone'),
					'password' => md5($this->input->post('password')),
					'foto' => $new_name,
					'akses' => $this->input->post('akses'),
					'status' => 1
				);
			
            	
            $this->db->insert('users', $data);
            echo "<script>alert('Berhasil menambahkan anggota!');window.location.href='daftar_anggota';</script>";
		}
        }
	}


	function konfigurasi() {
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['email'] = $this->Index_model->getInformasi('email');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['error'] = '';
           $data['menu'] = 'konfigurasi';
		   $this->load->library('session');
           $this->load->view('admin/konfigurasi',$data);
    }	
		
	function update_konfigurasi() {
		$email = $this->input->post('email');
		$deskripsi = $this->input->post('deskripsi');
		$telepon = $this->input->post('telepon');
		$title = $this->input->post('akses');
		$alamat = $this->input->post('akses');
		$facebook = $this->input->post('akses');
		$twitter = $this->input->post('akses');
		$instagram = $this->input->post('akses');
		
		
		
		$data1 = array(
					'isi' => $this->input->post('title')
			);
            $this->db->where("id", 1);	
            $this->db->update('site_settings', $data1);
			$data2 = array(
					'isi' => $this->input->post('alamat')
			);
            $this->db->where("id", 3);	
            $this->db->update('site_settings', $data2);
			$data3 = array(
					'isi' => $this->input->post('email')
			);
            $this->db->where("id", 4);	
            $this->db->update('site_settings', $data3);
			$data4 = array(
					'isi' => $this->input->post('facebook')
			);
            $this->db->where("id", 5);	
            $this->db->update('site_settings', $data4);
			$data5 = array(
					'isi' => $this->input->post('twitter')
			);
            $this->db->where("id", 6);	
            $this->db->update('site_settings', $data5);
			$data6 = array(
					'isi' => $this->input->post('instagram')
			);
            $this->db->where("id", 7);	
            $this->db->update('site_settings', $data6);
			$data7 = array(
					'isi' => $this->input->post('deskripsi')
			);
            $this->db->where("id", 8);	
            $this->db->update('site_settings', $data7);
		
		
		
		
		
		
		$nama_foto = $_FILES['logo']['name'];
		$new_name = time().$_FILES["logo"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		if ($nama_foto != null) {
			$this->upload->do_upload('logo');
			$this->upload->data();
			
            $data7 = array(
					'isi' => $new_name
			);
            $this->db->where("id", 2);	
            $this->db->update('site_settings', $data7);

			
		}
		
		
		
		            echo "<script>alert('Berhasil memperbarui konfigurasi sistem!');window.location.href='konfigurasi';</script>";
    }	
		
		
    function daftar_halaman() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['halaman'] = $this->Admin_model->getHalaman()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-halaman';
		   $this->load->library('session');
            $this->load->view('admin/daftar-halaman',$data);
        
    }
	
	
	
	function tambah_halaman() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['halaman'] = $this->Admin_model->getHalaman()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-halaman';
		   $this->load->library('session');
            $this->load->view('admin/tambah-halaman',$data);
        
    }
	
	function insert_halaman() {
		$title = $this->input->post('title');
		$konten = $this->input->post('konten');
		$author = $this->session->userdata('email');
		$timestamp = date('d-m-Y');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('konten'),
					'timestamp' => $timestamp,
					'author_email' => $author,
					'gambar' => $new_name
				);
			
            	
            $this->db->insert('pages', $data);
            echo "<script>alert('Berhasil menambahkan halaman!');window.location.href='daftar_halaman';</script>";
	}
	
	function edit_halaman($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['halaman'] = $this->Admin_model->getHalamanID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-halaman';
		   $this->load->library('session');
            $this->load->view('admin/edit-halaman',$data);
    }
	
	function update_halaman() {
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$konten = $this->input->post('konten');
		
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		if ($nama_foto == null) {
				
			
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('konten')
				);	
             $this->db->where("id", $id);	
            $this->db->update('pages', $data);
            echo "<script>alert('Berhasil memperbarui halaman!');window.location.href='edit_halaman/$id';</script>";
		}else{
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('konten'),
					'gambar' => $new_name
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('pages', $data);
            echo "<script>alert('Berhasil memperbarui halaman!');window.location.href='edit_halaman/$id';</script>";
		}
		
    }
	
	function hapus_halaman($id) {
		$id = urldecode($id);
		$this->db->where("id", $id);	
        $this->db->delete('pages');
		echo "<script>alert('Berhasil menghapus halaman!');window.location.href='../daftar_halaman';</script>";
    }
	
	
	
	function daftar_kategori_blog() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-kategori-blog';
		   $this->load->library('session');
            $this->load->view('admin/daftar-kategori-blog',$data);
        
    }
	
	
	
	function tambah_kategori_blog() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-kategori-blog';
		   $this->load->library('session');
            $this->load->view('admin/tambah-kategori-blog',$data);
        
    }
	
	function insert_kategori_blog() {
		$nama = $this->input->post('nama');
		
			
			
				$data = array(
					'nama' => $this->input->post('nama')
				);
			
            	
            $this->db->insert('blog_kategori', $data);
            echo "<script>alert('Berhasil menambahkan kategori blog!');window.location.href='daftar_kategori_blog';</script>";
	}
	
	function edit_kategori_blog($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriBlogID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-kategori-blog';
		   $this->load->library('session');
            $this->load->view('admin/edit-kategori-blog',$data);
    }
	
	function update_kategori_blog() {
		$id = $this->input->post('id');
		$namna = $this->input->post('nama');
		
				
				$data = array(
					'nama' => $this->input->post('nama')
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('blog_kategori', $data);
            echo "<script>alert('Berhasil memperbarui kategori blog!');window.location.href='edit_kategori_blog/$id';</script>";
		
    }
	
	function hapus_kategori_blog($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('blog_kategori');
		echo "<script>alert('Berhasil menghapus kategori blog!');window.location.href='../daftar_kategori_blog';</script>";
    }
	
	
	function daftar_blog() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['blog'] = $this->Admin_model->getBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-blog';
		   $this->load->library('session');
            $this->load->view('admin/daftar-blog',$data);
        
    }
	
	
	
	function tambah_blog() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['blog'] = $this->Admin_model->getBlog()->result();
           $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-blog';
		   $this->load->library('session');
            $this->load->view('admin/tambah-blog',$data);
        
    }
	
	function insert_blog() {
		$title = $this->input->post('title');
		$kategori = $this->input->post('kategori');
		$konten = $this->input->post('konten');
		$author = $this->session->userdata('email');
		$timestamp = date('d-m-Y');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'content' => $this->input->post('konten'),
					'timestamp' => $timestamp,
					'author_email' => $author,
					'gambar' => $new_name
				);
			
            	
            $this->db->insert('blog', $data);
            echo "<script>alert('Berhasil menambahkan blog!');window.location.href='daftar_blog';</script>";
	}
	
	function edit_blog($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['blog'] = $this->Admin_model->getBlogID($id)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'edit-blog';
		   $this->load->library('session');
            $this->load->view('admin/edit-blog',$data);
    }
	
	function update_blog() {
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
		$title = $this->input->post('title');
		$konten = $this->input->post('konten');
		
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		if ($nama_foto == null) {
				
			
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'content' => $this->input->post('konten')
				);	
             $this->db->where("id", $id);	
            $this->db->update('blog', $data);
            echo "<script>alert('Berhasil memperbarui blog!');window.location.href='edit_blog/$id';</script>";
		}else{
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'content' => $this->input->post('konten'),
					'gambar' => $new_name
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('blog', $data);
            echo "<script>alert('Berhasil memperbarui blog!');window.location.href='edit_blog/$id';</script>";
		}
		
    }
	
	function hapus_blog($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('blog');
		echo "<script>alert('Berhasil menghapus blog!');window.location.href='../daftar_blog';</script>";
    }
	
	
	function daftar_slider() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['slider'] = $this->Admin_model->getSlider()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-slider';
		   $this->load->library('session');
            $this->load->view('admin/daftar-slide',$data);
        
    }
	
	
	
	function tambah_slide() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['slider'] = $this->Admin_model->getSlider()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-slide';
		   $this->load->library('session');
            $this->load->view('admin/tambah-slide',$data);
        
    }
	
	function insert_slide() {
		$title = $this->input->post('title');
		$nama_button = $this->input->post('nama_button');
		$link_button = $this->input->post('link_button');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				$data = array(
					'title' => $this->input->post('title'),
					'nama_button' => $this->input->post('nama_button'),
					'link_button' => $this->input->post('link_button'),
					'gambar' => $new_name
				);
			
            	
            $this->db->insert('slide', $data);
            echo "<script>alert('Berhasil menambahkan slide!');window.location.href='daftar_slider';</script>";
	}
	
	function edit_slider($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['slider'] = $this->Admin_model->getSliderID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-slide';
		   $this->load->library('session');
            $this->load->view('admin/edit-slide',$data);
    }
	
	function update_slide() {
		$id = $this->input->post('id');
		$nama_button = $this->input->post('nama_button');
		$title = $this->input->post('title');
		$link_button = $this->input->post('link_button');
		
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		if ($nama_foto == null) {
				
			
				$data = array(
					'title' => $this->input->post('title'),
					'nama_button' => $this->input->post('nama_button'),
					'link_button' => $this->input->post('link_button')
				);	
             $this->db->where("id", $id);	
            $this->db->update('slide', $data);
            echo "<script>alert('Berhasil memperbarui slide!');window.location.href='edit_slider/$id';</script>";
		}else{
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				
				$data = array(
					'title' => $this->input->post('title'),
					'nama_button' => $this->input->post('nama_button'),
					'link_button' => $this->input->post('link_button'),
					'gambar' => $new_name
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('slide', $data);
            echo "<script>alert('Berhasil memperbarui slide!');window.location.href='edit_slide/$id';</script>";
		}
		
    }
	
	function hapus_slider($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('slide');
		echo "<script>alert('Berhasil menghapus slide!');window.location.href='../daftar_slider';</script>";
    }
	
	
	
	function daftar_kategori_product() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriProduct()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-kategori-product';
		   $this->load->library('session');
            $this->load->view('admin/daftar-kategori-product',$data);
        
    }
	
	
	
	function tambah_kategori_product() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriProduct()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-kategori-product';
		   $this->load->library('session');
            $this->load->view('admin/tambah-kategori-product',$data);
        
    }
	
	function insert_kategori_product() {
		$nama = $this->input->post('nama');
		
			
			
				$data = array(
					'nama' => $this->input->post('nama')
				);
			
            	
            $this->db->insert('product_kategori', $data);
            echo "<script>alert('Berhasil menambahkan kategori produk!');window.location.href='daftar_kategori_product';</script>";
	}
	
	function edit_kategori_product($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriProductID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-kategori-product';
		   $this->load->library('session');
            $this->load->view('admin/edit-kategori-product',$data);
    }
	
	function update_kategori_product() {
		$id = $this->input->post('id');
		$namna = $this->input->post('nama');
		
				
				$data = array(
					'nama' => $this->input->post('nama')
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('product_kategori', $data);
            echo "<script>alert('Berhasil memperbarui kategori product!');window.location.href='edit_kategori_product/$id';</script>";
		
    }
	
	function hapus_kategori_product($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('product_kategori');
		echo "<script>alert('Berhasil menghapus kategori product!');window.location.href='../daftar_kategori_product';</script>";
    }
	
	
	function daftar_product() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['product'] = $this->Admin_model->getProduct()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-product';
		   $this->load->library('session');
            $this->load->view('admin/daftar-product',$data);
        
    }
	
	
	
	function tambah_product() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['product'] = $this->Admin_model->getProduct()->result();
           $data['kategori'] = $this->Admin_model->getKategoriProduct()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-product';
		   $this->load->library('session');
            $this->load->view('admin/tambah-product',$data);
        
    }
	
	function insert_product() {
		$title = $this->input->post('title');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$deskripsi_tambahan = $this->input->post('deskripsi_tambahan');
		$harga = $this->input->post('harga');
		$berat = $this->input->post('berat');
		$stock = $this->input->post('stock');
		$populer = $this->input->post('populer');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().".".pathinfo($nama_foto, PATHINFO_EXTENSION); 
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto');
			$this->upload->data();
			
		$nama_foto2 = $_FILES['foto2']['name'];
		$new_name2 = time()."2.".pathinfo($nama_foto2, PATHINFO_EXTENSION); 
		$config['file_name'] = $new_name2;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto2');
			$this->upload->data();	
			
		$nama_foto3 = $_FILES['foto3']['name'];
		$new_name3 = time()."3.".pathinfo($nama_foto3, PATHINFO_EXTENSION); 
		$config['file_name'] = $new_name3;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto3');
			$this->upload->data();		
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'description' => $this->input->post('deskripsi'),
					'additional_description' => $this->input->post('deskripsi_tambahan'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'stock' => $this->input->post('stock'),
					'populer' => $this->input->post('populer'),
					'gambar' => $new_name,
					'gambar2' => $new_name2,
					'gambar3' => $new_name3
				);
			
            	
            $this->db->insert('product', $data);
            echo "<script>alert('Berhasil menambahkan product!');window.location.href='daftar_product';</script>";
	}
	
	function edit_product($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['product'] = $this->Admin_model->getProductID($id)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriProduct()->result();
           $data['error'] = '';
           $data['menu'] = 'edit-product';
		   $this->load->library('session');
            $this->load->view('admin/edit-product',$data);
    }
	
	function update_product() {
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
		$title = $this->input->post('title');
		$deskripsi = $this->input->post('deskripsi');
		
		$nama_foto = $_FILES['foto']['name'];
		$nama_foto2 = $_FILES['foto2']['name'];
		$nama_foto3 = $_FILES['foto3']['name'];
		
		
		
       
	
		    $data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'description' => $this->input->post('deskripsi'),
					'additional_description' => $this->input->post('deskripsi_tambahan'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'stock' => $this->input->post('stock'),
					'populer' => $this->input->post('populer')
				);	
             $this->db->where("id", $id);	
            $this->db->update('product', $data);
            
		    if($nama_foto != null){
		        $nama_foto = $_FILES['foto']['name'];
		$new_name = time().".".pathinfo($nama_foto, PATHINFO_EXTENSION); 
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto');
			$this->upload->data();	
				$data = array(
					'gambar' => $new_name
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('product', $data);
		    }
		    if($nama_foto2 != null){
		        $nama_foto2 = $_FILES['foto2']['name'];
		$new_name2 = time()."2.".pathinfo($nama_foto2, PATHINFO_EXTENSION); 
		$config['file_name'] = $new_name2;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto2');
			$this->upload->data();	
				$data = array(
					'gambar2' => $new_name2
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('product', $data);
		    }
		    if($nama_foto3 != null){
		        $nama_foto3 = $_FILES['foto3']['name'];
		$new_name3 = time()."3.".pathinfo($nama_foto3, PATHINFO_EXTENSION); 
		$config['file_name'] = $new_name3;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto3');
			$this->upload->data();	
				$data = array(
					'gambar3' => $new_name3
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('product', $data);
		    }
			
			//echo $new_name3;
            echo "<script>alert('Berhasil memperbarui product!');window.location.href='edit_product/$id';</script>";
	
		
		
		
    }
	
	function hapus_product($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('product');
		echo "<script>alert('Berhasil menghapus product!');window.location.href='../daftar_product';</script>";
    }
	
	
	function daftar_kategori_course() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriCourse()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-kategori-course';
		   $this->load->library('session');
            $this->load->view('admin/daftar-kategori-course',$data);
        
    }
	
	
	
	function tambah_kategori_course() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriCourse()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-kategori-course';
		   $this->load->library('session');
            $this->load->view('admin/tambah-kategori-course',$data);
        
    }
	
	function insert_kategori_course() {
		$nama = $this->input->post('nama');
		
			
			
				$data = array(
					'nama' => $this->input->post('nama')
				);
			
            	
            $this->db->insert('course_kategori', $data);
            echo "<script>alert('Berhasil menambahkan kategori course!');window.location.href='daftar_kategori_course';</script>";
	}
	
	function edit_kategori_course($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['kategori'] = $this->Admin_model->getKategoriCourseID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-kategori-course';
		   $this->load->library('session');
            $this->load->view('admin/edit-kategori-course',$data);
    }
	
	function update_kategori_course() {
		$id = $this->input->post('id');
		$namna = $this->input->post('nama');
		
				
				$data = array(
					'nama' => $this->input->post('nama')
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('course_kategori', $data);
            echo "<script>alert('Berhasil memperbarui kategori course!');window.location.href='edit_kategori_course/$id';</script>";
		
    }
	
	function hapus_kategori_course($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('course_kategori');
		echo "<script>alert('Berhasil menghapus kategori course!');window.location.href='../daftar_kategori_course';</script>";
    }
	
	
	function daftar_course() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['course'] = $this->Admin_model->getCourse()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-course';
		   $this->load->library('session');
            $this->load->view('admin/daftar-course',$data);
        
    }
	
	
	
	function tambah_course() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['product'] = $this->Admin_model->getProduct()->result();
           $data['kategori'] = $this->Admin_model->getKategoriCourse()->result();
           $data['error'] = '';
           $data['menu'] = 'tambah-course';
		   $this->load->library('session');
            $this->load->view('admin/tambah-course',$data);
        
    }
	
	function insert_course() {
		$title = $this->input->post('title');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$durasi = $this->input->post('durasi');
		$harga = $this->input->post('harga');
		$populer = $this->input->post('populer');
		$author = $this->session->userdata('email');
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'description' => $this->input->post('deskripsi'),
					'durasi' => $this->input->post('durasi'),
					'harga' => $this->input->post('harga'),
					'populer' => $this->input->post('populer'),
					'author' => $author,
					'gambar' => $new_name
				);
			
            	
            $this->db->insert('course', $data);
            echo "<script>alert('Berhasil menambahkan course!');window.location.href='daftar_course';</script>";
	}
	
	function edit_course($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['course'] = $this->Admin_model->getCourseID($id)->result();
		   $data['kategori'] = $this->Admin_model->getKategoriCourse()->result();
           $data['error'] = '';
           $data['menu'] = 'edit-course';
		   $this->load->library('session');
            $this->load->view('admin/edit-course',$data);
    }
	
	function update_course() {
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
		$title = $this->input->post('title');
		$deskripsi = $this->input->post('deskripsi');
		$durasi = $this->input->post('durasi');
		$harga = $this->input->post('harga');
		$author = $this->session->userdata('email');
		
		$nama_foto = $_FILES['foto']['name'];
		$new_name = time().$_FILES["foto"]['name'];
		$config['file_name'] = $new_name;
        $config['upload_path'] = "./upload/images";
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);       
        $this->upload->do_upload();
		if ($nama_foto == null) {
				
			
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'description' => $this->input->post('deskripsi'),
					'durasi' => $this->input->post('durasi'),
					'harga' => $this->input->post('harga'),
					'author' => $author,
					'populer' => $this->input->post('populer')
				);	
             $this->db->where("id", $id);	
            $this->db->update('course', $data);
            echo "<script>alert('Berhasil memperbarui course!');window.location.href='edit_course/$id';</script>";
		}else{
			$this->upload->do_upload('foto');
			$this->upload->data();
			
			
				
				$data = array(
					'title' => $this->input->post('title'),
					'id_kategori' => $this->input->post('kategori'),
					'description' => $this->input->post('deskripsi'),
					'durasi' => $this->input->post('durasi'),
					'author' => $author,
					'harga' => $this->input->post('harga'),
					'populer' => $this->input->post('populer'),
					'gambar' => $new_name
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('course', $data);
            echo "<script>alert('Berhasil memperbarui course!');window.location.href='edit_course/$id';</script>";
		}
		
    }
	
	function hapus_course($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('course');
		echo "<script>alert('Berhasil menghapus course!');window.location.href='../daftar_course';</script>";
    }
	
	
	function daftar_section($course) {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['section'] = $this->Admin_model->getSectionCourse($course)->result();
           $data['course_id'] = $course;
           $data['error'] = '';
           $data['menu'] = 'daftar-section';
		   $this->load->library('session');
            $this->load->view('admin/daftar-section',$data);
        
    }
	
	
	
	function tambah_section($course) {
			$data['course_id'] = $course;
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['error'] = '';
           $data['menu'] = 'tambah-section';
		   $this->load->library('session');
            $this->load->view('admin/tambah-section',$data);
        
    }
	
	function insert_section() {
		$title = $this->input->post('title');
		$id_course = $this->input->post('course_id');
		$konten = $this->input->post('konten');
		
			
				$data = array(
					'title' => $this->input->post('title'),
					'id_course' => $this->input->post('course_id'),
					'konten' => $this->input->post('konten'),
					'video' => $this->input->post('video')
				);
			
            	
            $this->db->insert('course_section', $data);
            echo "<script>alert('Berhasil menambahkan section!');window.location.href='daftar_section/$id_course';</script>";
	}
	
	function edit_section($id) {
		$id = urldecode($id);
			$data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['section'] = $this->Admin_model->getSectionID($id)->result();
           $data['error'] = '';
           $data['menu'] = 'edit-section';
		   $this->load->library('session');
            $this->load->view('admin/edit-section',$data);
    }
	
	function update_section() {
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$konten = $this->input->post('konten');
		$video = $this->input->post('video');
	
				
			
				$data = array(
					'title' => $this->input->post('title'),
					'konten' => $this->input->post('konten'),
					'video' => $this->input->post('video')
				);	
             $this->db->where("id", $id);	
            $this->db->update('course_section', $data);
            echo "<script>alert('Berhasil memperbarui section!');window.location.href='edit_section/$id';</script>";
		
		
    }
	
	function hapus_section($id,$course_id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('course_section');
		echo "<script>alert('Berhasil menghapus section!');window.location.href='".base_url()."admin/daftar_section/$course_id';</script>";
    }
	
	
	function daftar_order() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['order'] = $this->Admin_model->getOrder()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-order';
		   $this->load->library('session');
            $this->load->view('admin/daftar-order',$data);
        
    }
	
	
	
	function detail_order($id) {
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
           $data['error'] = '';
           $data['menu'] = 'detail-order';
		   $this->load->library('session');
            $this->load->view('admin/detail-order',$data);
    }
	
	function update_order() {
		$id = $this->input->post('id');
		$note = $this->input->post('note');
		$nomor_resi = $this->input->post('nomor_resi');
		$status_order = $this->input->post('status_order');
		
				$data = array(
					'note' => $this->input->post('note'),
					'nomor_resi' => $this->input->post('nomor_resi'),
					'status_order' => $this->input->post('status_order')
				);	
            
            $this->db->where("id", $id);	
            $this->db->update('orders', $data);
            echo "<script>alert('Berhasil perbarui order!');window.location.href='detail_order/$id';</script>";
		
    }
	
	function daftar_komentar_blog() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['komentar'] = $this->Admin_model->getKomentarBlog()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-blog';
		   $this->load->library('session');
            $this->load->view('admin/daftar-komentar-blog',$data);
        
    }
    
    function hapus_komentar_blog($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('blog_comments');
		echo "<script>alert('Berhasil menghapus komentar!');window.location.href='".base_url()."admin/daftar_komentar_blog/';</script>";
    }
    
    function daftar_komentar_product() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['komentar'] = $this->Admin_model->getKomentarProduk()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-produk';
		   $this->load->library('session');
            $this->load->view('admin/daftar-komentar-produk',$data);
        
    }
    
    function hapus_komentar_produk($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('product_comments');
		echo "<script>alert('Berhasil menghapus komentar!');window.location.href='".base_url()."admin/daftar_komentar_product/';</script>";
    }
    
    function daftar_komentar_course() {
			
           $data['title'] = $this->Index_model->getInformasi('title');
           $data['deskripsi'] = $this->Index_model->getInformasi('deskripsi');
           $data['alamat'] = $this->Index_model->getInformasi('alamat');
           $data['telepon'] = $this->Index_model->getInformasi('telepon');
           $data['logo'] = $this->Index_model->getInformasi('logo');
           $data['twitter'] = $this->Index_model->getInformasi('twitter');
           $data['facebook'] = $this->Index_model->getInformasi('facebook');
           $data['instagram'] = $this->Index_model->getInformasi('instagram');
           $data['komentar'] = $this->Admin_model->getKomentarCourse()->result();
           $data['error'] = '';
           $data['menu'] = 'daftar-course';
		   $this->load->library('session');
            $this->load->view('admin/daftar-komentar-course',$data);
        
    }
    
    function hapus_komentar_course($id) {
		$id = urldecode($id);
		 $this->db->where("id", $id);	
        $this->db->delete('course_comments');
		echo "<script>alert('Berhasil menghapus komentar!');window.location.href='".base_url()."admin/daftar_komentar_course/';</script>";
    }
    
		
	
	function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata();
        redirect(base_url(), 'refresh');
    }
}
