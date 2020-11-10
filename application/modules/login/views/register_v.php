
<form action="" id="regForm" method="post">

  <div class="form-group row">
    <label class="col-sm-11 col-form-label offset-1"><i>All fields with (<span class="color-red">*</span>) are required.</i></label>
  </div>

  <div class="form-group row">
    <label for="inputFirstname" class="col-sm-4 col-form-label offset-1">Firstname <span class="color-red">*</span></label>
    <div class="col-sm-6">
      <input type="text" name="first_name" class="form-control" id="inputFirstname">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputMiddlename" class="col-sm-4 col-form-label offset-1">Middlename</label>
    <div class="col-sm-6">
      <input type="text" name="middle_name" class="form-control" id="inputMiddlename">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputLastname" class="col-sm-4 col-form-label offset-1">Lastname <span class="color-red">*</span></label>
    <div class="col-sm-6">
      <input type="text" name="last_name" class="form-control" id="inputLastname">
    </div>
  </div>
  <div class="form-group row">
    <label for="selectSuffix" class="col-sm-4 col-form-label offset-1">Suffix</label>
    <div class="col-sm-6">
      <select class="form-control" name="suffix" id="selectSuffix">
      	<option value="">Select Suffix</option>
      	<option value="Jr">Jr</option>
      	<option value="Sr">Sr</option>
      	<option value="I">I</option>
      	<option value="II">II</option>
      	<option value="II">III</option>
      	<option value="IV">IV</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmailAddress" class="col-sm-4 col-form-label offset-1">Email Address <span class="color-red">*</span></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmailAddress" name="email_address">
    </div>
  </div>

   <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label offset-1">Password <span class="color-red">*</span></label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword" name="password">
    </div>
  </div>

   <div class="form-group row">
    <label for="inputConfirmPassword" class="col-sm-4 col-form-label offset-1">Confirm Password <span class="color-red">*</span></label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputConfirmPassword" name="confirm_password">
    </div>
  </div>


  <div class="form-group row">
    	<div class="col-sm-10 offset-1">
	    	<div class="form-check form-check-inline">
		  		<input class="form-check-input" type="checkbox" id="optTermsAndConfitions" value="terms_and_conditions">
		  		<label class="form-check-label" for="optTermsAndConfitions">I have read Terms and Condtions</label>
			</div>	
		</div>
  	</div>
  
  <div class="form-group row">
    <div class="col-sm-10 offset-1">
      <button type="button" class="btn btn-primary float-right" id="btnSubmitReg">Submit</button>
    </div>
  </div>
  <div class="form-group row">
    	<div class="col-sm-10 offset-1">
    		<span id="regMessage"></span>
		</div>
	</div>
</form>