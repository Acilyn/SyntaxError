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
			EMPTY
		</div>
		
		<div class="col-md-4">
			<?php
				echo $place->picture . "<br>";
				echo $place->title . "<br>";
				echo $place->description . "<br>";
				echo $place->address . "<br>";
				echo $place->category . "<br>";
			?>
		</div>
		
		<div class="col-md-4">
			EMPTY
		</div>
	<div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			EMPTY
		</div>
		
		<div class="col-md-4">
			<?php
				
			?>
		</div>
		
		<div class="col-md-4">
			EMPTY
		</div>
	<div>
</div>