<?php
	
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			EMPTY
		</div>
		
		<div class="col-md-4">
			<?php
				$pResult = getPlaces(1);
				if($pResult != null && (mysqli_num_rows($pResult) > 0)){
					echo "Results:<br>";
					    while($row = mysqli_fetch_assoc($pResult)) {
							//echo "id: " . $row["ID_Place"]. " - Name: " . $row["Title"]. " " . $row["Description"]. "<br>";
							echo "<a href='?page=place&place_id=".$row["ID_Place"]."'><b>". $row["Title"]."</b>: ".$row["Description"]."</a>";
						}
				}
			?>
		</div>
		
		<div class="col-md-4">
			EMPTY
		</div>
	<div>
</div>