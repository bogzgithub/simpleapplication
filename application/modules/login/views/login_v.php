<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/login.css">
	<div class="container">
		<div class="row">
			<div class="col-xs-8 offset-2 col-md-4 col-sm-6 offset-3 offset-4">
				
				<form class="form-horizontal" action="" id="formLogin" method="post">
					<div class="card">
						<div class="card-header">
					    	Sign In Form <span class="fas fa-question float-right" data-toggle="popover" title="Login Info" data-content="If 3 attempts was made, accout will be automatically locked."></span>
					  	</div>
						<div class="card-body">
							<div class="col-12">
								<!-- for username -->
						  		<div class="form-group">
						  			<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									    <input type="text" class="form-control" name="login_email_address" placeholder="Email Address" required="required">
								    </div>
					  			</div>
					  			<!-- for password -->
					  			<div class="form-group" id="divPassword" style="display:none">
				  					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									    <input type="password" class="form-control" name="login_password" placeholder="Password" required="required">
								    </div>
					  			</div> 			
					  			<!-- for submit button -->
					  			<div class="form-group">
				  					<input type="submit" id="btnLogin" class="btn btn-success col-12" value="LOG IN">
				  				</div>
				  			</div> <!-- end of col-md-12 -->
				  			<div class="col-12">
					  			<div class="form-group">
				  					<div class="">
				  						No Account Yet?, click <button type="button" class="btn btn-primary btn-sm" id="btnRegister">Register</button>
			  						</div>
			  					</div>
			  				</div>
				  			<div class="col-xs-12" style="margin-bottom:-15px;">					  				
				  				<center>
		  							<p class="color-red" id="errorMsg"></p>
		  						</center>
		  					</div>
					  </div>	
					 
					</div>
				</form>
			</div>

		</div> <!-- end of row -->
	</div> <!-- end of container -->

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/login.js"></script>