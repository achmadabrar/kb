/*=========================================================================================
[Custom Summernote Javascript]

Project	     : Seipkon - Responsive Admin Template
Author       : Hassan Rasu
Author URL   : https://themeforest.net/user/themescare
Version      : 1.0
Primary use  : Seipkon - Responsive Admin Template

Only Use For Demo Purposes.

==========================================================================================*/


(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {


		/* 
		=================================================================
		Summernote JS
		=================================================================	
		*/
   
        $('#summernote').summernote();
    
            
        /* 
		=================================================================
		Page Editor JS
		=================================================================	
		*/
   
        $('#page-editor').summernote({
            callbacks: {
                    onImageUpload: function(files) {
                        uploadFile(files[0]);
                    }
                }
		});
		
		function uploadFile(file) {
            data = new FormData();
            data.append("file", file);

            $.ajax({
                data: data,
                type: "POST",
                url: "<?php echo base_url();?>admin/upload_image",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {                                 
                 console.log(url);                                        
                 $('#page-editor').summernote("insertImage", url);
                }
            });
        }
        



	});


}(jQuery));