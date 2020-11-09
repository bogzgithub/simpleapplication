
$(document).ready(function(){
	console.log("Starting homepage JS ...");

	$("#spanLogout").on("click",function(){
		$("#confirmModalTitle").html("Logout Confirmation");
		$("#confirmModalBody").html("Are you sure you want to logout?");
		$("#confirmModal").modal("show");
	});

	$("#confirmBtnYes").on("click",function(){
		var url = base_url + "home/logout?confirm_logout=Yes";
		window.location.href = url;

	});

	$("#updateProfilePic").on("click",function(){
		var url = base_url + "home/updateProfileForm";
		console.log(url);
		var datastring = "update=1";
		$.ajax({
	        type: "POST",
	        url: url,
	        data: datastring,
	        cache: false,
	       //datatype: "JSON",
	        success: function (data) {
	        	//console.log(data);
	        	//console.log(data);
	        	if (data == "Not Authorized!"){ // it means inaccess ng wlang request
	        		$("#errorMsg").html(data);
	        	}
	        	else {
	        		//console.log("Success!");
	        		// setting dynamic value to modal (title,body)
	        		$("#infoModalTitle").html("Update Profile Picture Form");
	        		$("#infoModalDialog").addClass("modal-lg");
	        		$("#infoModalBody").html(data);
	        		$("#infoModal").modal("show");
	        	}

	        },
	        error: function (jqXHR, exception) {
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        $('#errorMsg').html(msg);
		      
		    }
	    });
	});


	$("#infoModalBody").change("input[name='profile_pic_file']",function(evt){
     	

        var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
              //  document.getElementById("profile_img").src = fr.result;

                 var valid_extensions = /(\.jpg|\.jpeg|\.png)$/i;
                 // if success
                
                 if (valid_extensions.test($("input[name='profile_pic_file']").val())){
                     // first append
                  $("#img_append").append('<img src="" class="" id="profile_img"/>');


                  $("#profile_img").attr("src", fr.result);
                  $("#profile_img").attr("class","img-temp-view ");
                  //document.getElementById("profile_img").
                 }
                 else {
                    $("#img_append").html(""); // sa image
                 }
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }

  	}); 

  	$("#infoModalBody").on("click","#btnSubmit",function(){
  		$.ajax({
	        type: "POST",
          	url: "home/changeProfilePicScript",
          	data: new FormData($('#change_profile_form')[0]),
          	processData: false,
          	contentType: false,
          	success: function (data) {

          		console.log(data);

          		data = JSON.parse(data);

          		

          		if (data.error != ""){
          			$('#errorMsgProfile').html(data.error);
          		}
          		if (data.success == "success")
          		{
            	 	location.reload();
            	 }
               
          	},
	        error: function (jqXHR, exception) {
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        $('#errorMsgProfile').html(msg);
		      
		    }
	    });
  	});

});