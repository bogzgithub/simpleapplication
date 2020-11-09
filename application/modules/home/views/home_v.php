<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/plug_ins/data_table.css">
<?php
	if ($this->session->userdata('role') == 0){ // normal user
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-12">
			<span class="color-green"><?php echo $this->session->flashdata("success"); ?></span>
			 
			  <div class="card">
			    <div class="card-header"><span class="fas fa-user color-green"></span>&nbsp;Profile Information</div>
			    <div class="card-body">
			    	<form>
					  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="">Firstname</label>
					      <input type="text" readonly class="form-control" id="" placeholder="" value="<?php echo $this->session->userdata('first_name') ?>">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="">Middlename</label>
					      <input type="text" readonly class="form-control" id="" placeholder="" value="<?php echo $this->session->userdata('middle_name') ?>">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="">Lastname</label>
					      <input type="text" readonly class="form-control" id="" placeholder="" value="<?php echo $this->session->userdata('last_name') ?>">
					    </div>
				    	</div>
				    	<div class="form-row">
						
	  					    <div class="form-group col-md-3">
						      <label for="">Suffix</label>
						      <input type="text" readonly class="form-control" id="" placeholder="" value="<?php echo $this->session->userdata('suffix') ?>">
						    </div>
						    <div class="form-group col-md-3">
						      <label for="">Email Address</label>
						      <input type="text" readonly class="form-control" id="" placeholder="" value="<?php echo $this->session->userdata('email_address') ?>">
						    </div>
					    </div>

					    <div class="form-row">
					    	<div class="form-group col-md-12">
					    		<button type="button" class="btn btn-primary float-right" id="updateProfilePic">Update Profile Picture</button>
				    		</div>
				    	</div>

				    	<div class="form-row">
					    	<div class="form-group col-md-4">
					    		<span class="color-red" id="errorMsg"></span>
				    		</div>
			    		</div>
					  </div>
					  
					</form>
			    </div> 
			  </div>
			
	  </div>
  </div>
</div>
<?php
	}
	else if ($this->session->userdata('role') == 1){ // admin user
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered" id="userTable">
				<thead>
				  <tr>
				    <th>Fullname</th>
				    <th>Log In Date</th>
				    <th>Status</th>
				  </tr>
				</thead>
				<tbody>
					
				    
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
	}
?>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/home.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/plug_ins/data_table.js"></script>
<script>
	$(document).ready(function(){
		var json = [
		<?php
				$users_class = new UsersModel;
				foreach ($users_class->getAllUsers() as $row) {
					# code...
					$login_status = "Logged In";
					if ($row->login_status == 0){
						$login_status = "Not Logged In";
					}
			?>
					{
						"full_name" : "<?php echo $row->first_name . " " . $row->middle_name . " " . $row->last_name . " " . $row->suffix; ?>",
						"login_date" : "<?php echo $row->login_date; ?>",
						"login_status" : "<?php echo $login_status; ?>"
					},
			<?php
				}

			?>
		];
	    $('#userTable').DataTable({
	    	"data": json,
	    	"columns" :[
	    		{"data" : "full_name"},
	    		{"data" : "login_date"},
	    		{"data" : "login_status"},
	    	]

	    });
	});
</script>