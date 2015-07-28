<?php
	$place = new myPlace();
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
		</div>
		
		<div class="col-md-4">
			<?php
				echo "<b>" . $place->title . "</b><br>";
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