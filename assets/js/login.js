// we will set the background of our login page
document.body.style.backgroundImage = "url("+base_url+"assets/img/background/login_background.jpg)"; 

$(document).ready(function(){
	console.log("Starting Log In JS ...");

	$('[data-toggle="popover"]').popover();

	//global variables
	var exist_email_address = false;
	var log_in_email_address = false;
	var attemp_login = 0;
	console.log(attemp_login);

	$("#btnRegister").on("click",function(){
		
		// we will do ajax and get the return success data and append to body
		var url = base_url + "register/getRegistrationForm";
		console.log(url);
		var datastring = "register=1";
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
	        		$("#infoModalTitle").html("Registration Form");
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

	$("#infoModalBody").on("click","#btnSubmitReg",function(){
		console.log("Registring ....");
		//console.log(regRequiredFields());
		var first_name = $("input[name='first_name']").val();
		var middle_name = $("input[name='middle_name']").val();
		var last_name = $("input[name='last_name']").val();
		var suffix = $("select[name='suffix']").val();
		var email_address = $("input[name='email_address']").val();
		var password = $("input[name='password']").val();
		var confirm_password = $("input[name='confirm_password']").val();

		$("#regMessage").html("");
		// validation
		if (!regRequiredFields()){
			$("#regMessage").attr("class","color-red");
			$("#regMessage").html("Please fill up all required fields first.");
		}

		else if (!isValidEmailAddress(email_address)){
			$("#regMessage").attr("class","color-red");
			$("#regMessage").html("Email Address is not a valid email address.");
		}

		else if (exist_email_address){
			$("#regMessage").attr("class","color-red");
			$("#regMessage").html("Email Address was already taken");
		}

		else if (password != confirm_password){
			$("#regMessage").attr("class","color-red");
			$("#regMessage").html("Password and Confirm Password Does not matched");
		}

		else if(!$('input[name="terms_and_conditions"]').is(':checked')){
			$("#regMessage").attr("class","color-red");
			$("#regMessage").html("Please check terms and condition first.");
		}

		else {
			console.log("Submitting ...");
			$("#regMessage").html("<div class='loader'></div>Please wait ...");
			var url = base_url + "register/registerScript";
			var datastring = "";
			datastring += "first_name="+first_name;
			datastring += "&middle_name="+middle_name;
			datastring += "&last_name="+last_name;
			datastring += "&suffix="+suffix;
			datastring += "&email_address="+email_address;
			datastring += "&password="+password;		
			console.log(datastring);		
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
		        		$("#regMessage").attr("class","color-red");
						$("#regMessage").html(data);
		        	}
		        	else {
		        		//console.log("Success!");
		        		// setting dynamic value to modal (title,body)
		        		$("#regMessage").attr("class","color-green");
						$("#regMessage").html("Information is suffessfully saved");

						// resetting values in the form
						$("#regForm").find("input[type=text],input[type=password], textarea, select").val("");
						
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
			        $("#regMessage").attr("class","color-red");
					$("#regMessage").html(msg);
			      
			    }
		    });

		}

	});


	$("#infoModalBody").on("input","input[name='email_address']",function() {
		//console.log("wew");
	   	var email_address = $("input[name='email_address']").val();

	   	var url = base_url + "register/checkExistEmailAddress";
	   	var datastring = "email_address="+email_address;
	   	//console.log(datastring + " " +url);
	   	$("#regMessage").html("");
	   	exist_email_address = false;
	   	$.ajax({
	        type: "POST",
	        url: url,
	        data: datastring,
	        cache: false,
	        //datatype: "JSON",
	        success: function (data) {
	        	//console.log(data);
	        	$("#regMessage").attr("class","color-red");
	        	if (data == "Not Authorized!"){ // it means inaccess ng wlang request
					$("#regMessage").html(data);
	        	}
	        	else {
	        		if (data != 0){        	
						$("#regMessage").html("Email Address was already taken");
						exist_email_address = true;
	        		}
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
		        $("#regMessage").attr("class","color-red");
				$("#regMessage").html(msg);
		      
		    }
	    });

	});



	// for log in
	$("#btnLogin").on("click",function(){
		//console.log("LOG IN ....");
		$("#formLogin").submit(function(event) {          
          event.preventDefault();
         
        });
		var email_address = $("input[name='login_email_address']").val();
		var password = $("input[name='login_password']").val();

		$("#errorMsg").html("");
		if (email_address != "" && !log_in_email_address){
					
  			var url = base_url + "login/checkExistEmailAddress";
		   	var datastring = "email_address="+email_address;
		   	//console.log(datastring + " " +url);
		   	$.ajax({
		        type: "POST",
		        url: url,
		        data: datastring,
		        cache: false,
		        datatype: "JSON",
		        success: function (data) {
		        	//console.log(data);
		        	$("#errorMsg").attr("class","color-red");
		        	if (data == "Not Authorized!"){ // it means inaccess ng wlang request
						$("#errorMsg").html(data);
		        	}
		        	else {
		        		data = JSON.parse(data);
		        		if (data.count == 0){        		        						
							$("#errorMsg").html("Invalid Email Address");
		        		}

		        		else {
		        			if (data.locked_status == 1){
		        				$("#errorMsg").html("Email Address is locked due to 3 attemps");
		        			}
		        			else {
			        			// proceed tayo sa pag show ng password
			        			$("input[name='login_email_address']").attr("disabled","disabled");      
			        			$("#divPassword").show();
			        			$("input[name='login_password']").focus();
			        			log_in_email_address = true;
		        			}
		        		}
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
			        $("#errorMsg").attr("class","color-red");
					$("#errorMsg").html(msg);
			      
			    }
		    });
		}

		// so it means na for password na
		else {
			var url = base_url + "login/loginScript";
		   	var datastring = "email_address="+email_address;
		   	datastring += "&password="+password;
		   	console.log(attemp_login);
		   	datastring += "&attempt="+attemp_login;
		   	console.log(datastring + " " +url);

		   	if (password != ""){

			   	$.ajax({
			        type: "POST",
			        url: url,
			        data: datastring,
			        cache: false,
			        //datatype: "JSON",
			        success: function (data) {
			        	console.log(data);
			        	if (data == 1){
			        		// punta na tayo sa 
			        		window.location.href = base_url +"home";
			        	}
			        	else {
			        		$("#errorMsg").html("Wrong Password");
			        		attemp_login++;
			        		if (attemp_login == 3){
			        			attemp_login = 2; // for every time the user will try to log in again
			        			$("#divPassword").hide();
			        			$("#errorMsg").html(email_address + " was locked due to 3 attemps");
			        		}
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
				        $("#errorMsg").attr("class","color-red");
						$("#errorMsg").html(msg);
				      
				    }
			    });
		    }
		}

	});


	// for security purspose functions
	function regRequiredFields(){
		var required_fields = ["first_name","last_name","email_address","password","confirm_password"];
		var is_all_fill_up = true;

		$(required_fields).each(function(i) {
			console.log(required_fields[i]);
			//console.log(required_fields[i].val());
			if ($("input[name='"+required_fields[i]+"']").val() == "" ||
				$("select[name='"+required_fields[i]+"']").val() == "" ||
				$("textarea[name='"+required_fields[i]+"']").val() == ""){
				console.log("Need to fill up " +required_fields[i]);
				//console.log($("input[name='"+required_fields[i]+"']").val());
				is_all_fill_up = false;
				return false;
			}
		});

		return is_all_fill_up;
	}

	function isValidEmailAddress(email_address) {
	    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	    return pattern.test(email_address);
	} 
});