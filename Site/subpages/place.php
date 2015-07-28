<?php
	$place = new myPlace();
	$_SESSION['PHP_PLACE_ID'] = $_GET['place_id'];
	$_SESSION['PHP_CURRENT_PAGE'] = "place&place_id=" .  $_GET['place_id'];
	/*
		$place->picture <---picture urldecode
		$place->title <---title
		$place->description <---description
		$place->address <---address
		$place->category <---category
	*/
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php
				echo "<img src='". $place->picture . "' width=100%>";
			?>
			<br>
			<form action="subpages/submitrating.php" method="post" role="form">
			<div class="form-group">
				<label for="rating">Rate:</label>
				<select class="form-control" id="ratingID" name="rating">
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
				</select>
			</div>
			<?php
				if(isLoggedIn()){
					echo "<input type='submit' class='btn btn-default' value='Submit'>";
				}
				else {
					echo "Must be logged in to rate";
				}
			
			?>
			</form>
		</div>
		
		<div class="col-md-4">
			<?php
				echo "<b>" . $place->title . "</b><br>";
				echo "Rating: " . $place->rating . "<br>";
				echo $place->description . "<br><br>";
				echo $place->address . "<br>";
				//echo $place->category . "<br>";
			?>
		</div>
		
		<div class="col-md-4">
			<?php
				echo $place->comments;
			?>
		</div>
</div>