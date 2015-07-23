<?php
	
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			EMPTY
		</div>
		
		<div class="col-md-4">
			<?php
				$pResult = getPlace($_GET['place_id']);
				if($pResult != null && (mysqli_num_rows($pResult) > 0)){
					$row = mysqli_fetch_assoc($pResult);
					echo $row["Title"]."<br>";
					echo "<img src='subpages/pictures/places/". $row["picture"] ."'>";
				}
			?>
		</div>
		
		<div class="col-md-4">
			EMPTY
		</div>
	<div>
</div>