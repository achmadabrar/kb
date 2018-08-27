<?php

class Summer extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
}

    


  public function saveGambar()
  {
         if(isset($_FILES["file"]["name"]))  
     {  
          $config['upload_path'] = './upload/images/';  
          $config['allowed_types'] = 'jpg|jpeg|png|gif';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('file'))  
          {  
               $this->upload->display_errors();  
               return FALSE;
          }  
          else  
          {  
               $data = $this->upload->data();                 
                echo base_url().'upload/images/'.$_FILES['file']['name'];                                     
          }  
     }	 

  }

   





}