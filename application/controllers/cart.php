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
class Cart extends CI_Controller {

    //put your code here
    public function __construct() {
		header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST, OPTIONS");
        parent::__construct();
		$this->load->library('pagination');
        $this->load->model('Index_model'); 
        $this->load->model('Blog_model'); 
        $this->load->model('Product_model'); 
        $this->load->model('Course_model'); 
        $this->load->model('Admin_model'); 
		$this->load->model('Keranjang_model');
		$this->load->library(array('session'));
		
		
		$params = array('server_key' => 'SB-Mid-server-1sHO2CW33hNNQwV1kIidSRFD', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
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
	if($this->session->userdata('email')==''){
			redirect('index/login');
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
		   $data['blog'] = $this->Blog_model->getBlog()->result();
		    $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		    $data['carts'] = $this->Keranjang_model->cekCartUser($this->session->userdata('email'))->result();
		     $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
			if(count($data['carts'])==0){
				//redirect('index');
			}
           $data['error'] = '';
           $data['menu'] = 'cart';
		   $this->load->library('session');
	  $this->load->view('cart/index', $data);
    }
	
	
	function tambah()
	{
		
		if($this->session->userdata('email')==''){
			redirect('index/login');
		}
		
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		
		$cek_cart = $this->Keranjang_model->cekCartProduk($id,$type,$this->session->userdata('email'));
		
        if ($cek_cart['id']!=0) {
			$qty = $this->input->post('qty')+$cek_cart['quantity'];
			if($type==2){
				$data_produk= array(
							 'quantity' => '1'
							);
			}else{
				$data_produk= array(
							 'quantity' => $qty
							);
			}
			 $this->db->where("id", $cek_cart['id']);	
            $this->db->update('cart', $data_produk);
		}else{
		
			$data_produk= array('email_user' => $this->session->userdata('email'),
							 'id_produk' => $this->input->post('id'),
							 'nama' => $this->input->post('nama'),
							 'harga' => $this->input->post('harga'),
							 'quantity' =>$this->input->post('qty'),
							 'gambar' => $this->input->post('gambar'),
							 'berat' => $this->input->post('berat'),
							 'tipe' => $this->input->post('type')
							);
            $this->db->insert('cart', $data_produk);
			
		}
		redirect('cart/index');
	}
	
	function perbarui()
	{
		
		if($this->session->userdata('email')==''){
			redirect('index/login');
		}
		
		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		
			
				$data_produk= array(
							 'quantity' => $qty
							);
			 $this->db->where("id", $id);	
            $this->db->update('cart', $data_produk);
		
		redirect('cart/index');
	}
	
	function hapus($id)
	{
		if($this->session->userdata('email')==''){
			redirect('index/login');
		}
		
			 $this->db->where("id", $id);	
            $this->db->delete('cart');
			
		
		redirect('cart/index');
	}
	
	
	public function alamat_pengiriman()
	{
		if($this->session->userdata('email')==''){
			redirect('index/login');
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
		   $data['blog'] = $this->Blog_model->getBlog()->result();
		    $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		    $data['carts'] = $this->Keranjang_model->cekCartUser($this->session->userdata('email'))->result();
		     $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
			if(count($data['carts'])==0){
				redirect('index');
			}
           $data['error'] = '';
           $data['menu'] = 'cart';
		   $this->load->library('session');
	  $this->load->view('cart/alamat-pengiriman', $data);
	}
	
	
	
	public function pembayaran1()
	{
		if($this->session->userdata('email')==''){
			redirect('index/login');
		}
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('tujuan_provinsi');
		$kota = $this->input->post('tujuan_kota');
		$kodepos = $this->input->post('kodepos');
		$pengiriman = $this->input->post('pengiriman');
		$catatan = $this->input->post('catatan');
		if($pengiriman==null){
			$pengiriman=0;
		}
		
		
		
		$datax = array(
                'tujuan_alamat' => $alamat,
                'tujuan_provinsi' => $provinsi,
                'tujuan_kota' => $kota,
                'tujuan_kodepos' => $kodepos,
                'tujuan_pengiriman' => $pengiriman,
                'tujuan_catatan' => $catatan
            );
            $this->session->set_userdata($datax);
			//$this->session->unset_userdata('tujuan_alamat');
		
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
		    $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		    $data['carts'] = $this->Keranjang_model->cekCartUser($this->session->userdata('email'))->result();
			 $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
			
			$data['cart_alamat'] = $alamat;
			$data['cart_provinsi'] = $provinsi;
			$data['cart_kota'] = $kota;
			$data['cart_kodepos'] = $kodepos;
			$data['cart_pengiriman'] = $pengiriman;
			$data['cart_catatan'] = $catatan;
			
			
			if(count($data['carts'])==0){
				redirect('index');
			}
			
			
           $data['error'] = '';
           $data['menu'] = 'cart';
		   $this->load->library('session');
	  $this->load->view('cart/metode-pembayaran', $data);
	}
	
	
	
	
	
	
	function getCity($province){		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 0eae42fce3bbdaaaae65207aa026821e"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
			$data = json_decode($response, true);
		  //echo json_encode($k['rajaongkir']['results']);

		  
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
		  

		    echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']."</option>";
		  
		  }
		}
	}

	function getCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array('origin' => $origin,
						'destination' => $destination, 
						'berat' => $berat, 
						'courier' => $courier 

		);
		
		$this->load->view('rajaongkir/getCost', $data);
	}
	
	
   
   
   public function token()
    {
		
		$datax = array(
                'tujuan_order_id' => rand()
            );
		$this->session->set_userdata($datax);
		$grand_totals = 0;
		$item_belanja = array();
		foreach($this->Keranjang_model->cekCartUser($this->session->userdata('email'))->result() as $items){
			$grand_totals = $grand_totals + ($items->harga * $items->quantity);
			$item_belanja[] = array(
		  'id' => $items->id_produk,
		  'price' => $items->harga,
		  'quantity' => $items->quantity,
		  'name' => "$items->nama"
		);
		
		}
		$item_belanja[] = array(
		  'id' => '0',
		  'price' => preg_replace('/[^0-9]/', '', $this->session->userdata('tujuan_pengiriman')),
		  'quantity' => 1,
		  'name' => 'Ongkos Kirim JNE'
		);
		
		
		$total_keseluruhan = $grand_totals+preg_replace('/[^0-9]/', '', $this->session->userdata('tujuan_pengiriman'));
		
		
		// Required
		$transaction_details = array(
		  'order_id' => $this->session->userdata('tujuan_order_id'),
		  'gross_amount' => $total_keseluruhan, // no decimal allowed for creditcard
		);
		
		//$item_details = array ($item1_details, $item2_details);
		// Optional
		$billing_address = array(
		  'first_name'    => $this->session->userdata('nama_lengkap'),
		  'last_name'     => '',
		  'address'       => $this->session->userdata('tujuan_alamat'),
		  'city'          => $this->session->userdata('tujuan_kota'),
		  'postal_code'   => $this->session->userdata('tujuan_kodepos'),
		  'phone'         => $this->session->userdata('nomor_handphone'),
		  'country_code'  => 'IDN'
		);
		// Optional
		$shipping_address = array(
		  'first_name'    => $this->session->userdata('nama_lengkap'),
		  'last_name'     => '',
		  'address'       => $this->session->userdata('tujuan_alamat'),
		  'city'          => $this->session->userdata('tujuan_kota'),
		  'postal_code'   => $this->session->userdata('tujuan_kodepos'),
		  'phone'         => $this->session->userdata('nomor_handphone'),
		  'country_code'  => 'IDN'
		);
		// Optional
		$customer_details = array(
		'first_name'    => $this->session->userdata('nama_lengkap'),
		  'last_name'     => '',
		  'email'         => $this->session->userdata('email'),
		  'phone'         => $this->session->userdata('nomor_handphone'),
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);
		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;
        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_belanja,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );
		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }
	
	public function finish()
    {
		
		if($this->session->userdata('email')==''){
			redirect('index/login');
		}
		
		  $data['carts'] = $this->Keranjang_model->cekCartUser($this->session->userdata('email'))->result();
			
		if(count($data['carts'])==0){
				redirect('index');
		}
		
		
		
		if(json_decode($this->input->post('result_data')))
		{
		    
		$result = json_decode($this->input->post('result_data'));
		$data['status'] = $result->status_code;
			
			if($result->status_code==200){
				$status_1 = 'Diproses'; 
				$status_2 = 1; 
			}else{
				$status_1 = 'Pending'; 
				$status_2 = 0; 
			}
			$cart_order_id = $result->order_id;
			$cart_transaction_status = $result->transaction_status;
			$cart_transaction_time = $result->transaction_time;
		}else{
		    $notif = $this->midtrans->status($this->session->userdata('tujuan_order_id'));
		  $data['status'] = $notif->status_code;
		    if($notif->status_code==200){
				$status_1 = 'Diproses'; 
				$status_2 = 1; 
			}else{
				$status_1 = 'Pending'; 
				$status_2 = 0; 
			}
			
			$cart_order_id = $this->session->userdata('tujuan_order_id');
			$cart_transaction_status = $notif->transaction_status;
			$cart_transaction_time = $notif->transaction_time;
		}
    
			
			$data_order = array(
					'midtrans_id' => $cart_order_id,
					'email' => $this->session->userdata('email'),
					'alamat' => $this->session->userdata('tujuan_alamat'),
					'provinsi' => $this->session->userdata('tujuan_provinsi'),
					'kota' => $this->session->userdata('tujuan_kota'),
					'kodepos' => $this->session->userdata('tujuan_kodepos'),
					'pengiriman' => $this->session->userdata('tujuan_pengiriman'),
					'note' => $this->session->userdata('tujuan_catatan'),
					'status_order' => $status_1,
					'status_pembayaran' => $cart_transaction_status,
					'tanggal_order' => $cart_transaction_time,
					'nomor_resi' => ''
				);
            $this->db->insert('orders', $data_order);
			$insert_id = $this->db->insert_id();
			
			
			foreach($this->Keranjang_model->cekCartUser($this->session->userdata('email'))->result() as $items){
				
			$data_order_details = array(
					'order_id' => $insert_id,
					'midtrans_id' => $cart_order_id,
					'email' => $this->session->userdata('email'),
					'id_produk' => $items->id_produk,
					'quantity' => $items->quantity,
					'harga' => $items->harga,
					'tipe' => $items->tipe,
					'status' => $status_2
				);
            $this->db->insert('orders_detail', $data_order_details);
			
			
			}
			
			
			
			$this->db->where("email_user", $this->session->userdata('email'));	
			$this->db->delete('cart');
			
			$datax = array(
                'tujuan_alamat' => '',
                'tujuan_provinsi' => '',
                'tujuan_kota' => '',
                'tujuan_kodepos' => '',
                'tujuan_pengiriman' => ''
            );
			$this->session->unset_userdata($datax);
		
		
		
		if ($cart_transaction_status == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		 
			
			$data_order = array(
					'status_pembayaran' => $cart_transaction_status
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders_detail', $data_order_details);
		  }
			else if ($cart_transaction_status == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  $data_order = array(
					'status_pembayaran' => $cart_transaction_status
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 1
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders_detail', $data_order_details);
		  
		  } 
		  else if($cart_transaction_status == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		   $data_order = array(
					'status_pembayaran' => $cart_transaction_status
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders_detail', $data_order_details);
		  } 
		  else if ($cart_transaction_status == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  $data_order = array(
					'status_pembayaran' => $cart_transaction_status
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders_detail', $data_order_details);
		  
		}
		 else if ($cart_transaction_status == 'cancel') {
		  // TODO set payment status in merchant's database to 'Denied'
		  $data_order = array(
					'status_pembayaran' => $cart_transaction_status
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $this->session->userdata('tujuan_order_id'));	
           $this->db->update('orders_detail', $data_order_details);
		  
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
		   $data['blog'] = $this->Blog_model->getBlog()->result();
		    $data['kategori_produk'] = $this->Product_model->getKategoriProduct()->result();
		   $data['kategori_blog'] = $this->Blog_model->getKategoriBlog()->result();
		     $data['user'] = $this->Index_model->getUserEmail($this->session->userdata('email'))->result();
			
           $data['error'] = '';
           $data['menu'] = 'cart';
		   $this->load->library('session');
	  $this->load->view('cart/selesai', $data);
    	
    }
	
	public function notification(){
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result);

		

		//notification handler sample

		$transaction = $result->transaction_status;
		$type = $result->payment_type;
		$order_id = $result->order_id;
		$fraud = $result->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
			
			$data_order = array(
					'status_pembayaran' => $transaction
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders_detail', $data_order_details);
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  
		  $data_order = array(
					'status_pembayaran' => $transaction
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 1
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders_detail', $data_order_details);
		  
		  
		  
		  
		  
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		   $data_order = array(
					'status_pembayaran' => $transaction
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders_detail', $data_order_details);
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		  $data_order = array(
					'status_pembayaran' => $transaction
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders_detail', $data_order_details);
		  
		}
		 else if ($transaction == 'cancel') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		  $data_order = array(
					'status_pembayaran' => $transaction
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders', $data_order);
		   
		   $data_order_details = array(
					'status' => 0
				);
		   $this->db->where("midtrans_id", $order_id);	
           $this->db->update('orders_detail', $data_order_details);
		  
		}
	
		
	}
	
	
	
}
