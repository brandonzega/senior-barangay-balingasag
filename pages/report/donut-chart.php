<?php include "../connection.php";?>
<script>
	Morris.Donut({
		element: 'morris-donut-chart',
		data: [{
			label: "male",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from senior_citizen where gender = 'male' and status='active'");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
		
			label: " female",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from senior_citizen where gender = 'female' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}],
		resize: true
	});
</script>