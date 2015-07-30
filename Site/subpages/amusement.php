<?php
	
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			
		</div>
		
		<div class="col-md-6">
			<?php
				$pResult = getPlaces(2);
				if($pResult != null && (mysqli_num_rows($pResult) > 0)){
					echo "Results:<br>";
					    while($row = mysqli_fetch_assoc($pResult)) {
							//echo "id: " . $row["ID_Place"]. " - Name: " . $row["Title"]. " " . $row["Description"]. "<br>";
							echo "<a href='?page=place&place_id=".$row["ID_Place"]."'><b>". $row["Title"]."</b>: ".$row["Description"]."</a><br><br><br>";
						}
				}
			?>
		</div>
		
		<div class="col-md-3">
			
		</div>
	<div>
</div>