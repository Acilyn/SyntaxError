<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-3">
		<?php
			if($_GET["passed"] == "false"){
				echo "The information you submitted was incorrect. Please verify and try again<br>";
			}
		?>
		<form action="subpages/passwordreset.php" method="post" role="form">
		  <div class="form-group">
			<label for="regUserName">Username*</label>
			<input type="text" class="form-control" id="recUserNameID" name="recUserName" placeholder="" required>
		  </div>
		  <div class="form-group">
			<label for="regPWCode">Password Recovery Code*</label>
			<input type="text" class="form-control" id="recPWCodeID" name="recPWCode" placeholder="" required>
		  </div>
		  <div class="form-group">
			<label for="regPassword">New Password*</label>
			<input type="password" class="form-control" id="recPasswordID" name="recPassword" placeholder="" required>
		  </div>
		  <input type="submit" class="btn btn-default" value="Submit">
		</form>
		*Are required fields
	</div>
</div>

<br><br>