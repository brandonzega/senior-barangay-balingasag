<?php include "../connection.php";


?>

<script>
	Morris.Bar({
		element: 'morris-bar-chart2',
		data: [
			<?php

				$start = 0;
				while($start!=101){
					$qry = mysqli_query($con," SELECT * from Senior_citizen where age like '$start'");
					$cnt = mysqli_num_rows($qry);
					echo "{y:'$start',a:$cnt},";
					$start = $start+1;
				}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Age'],
		hideHover: 'auto'
	});

	Morris.Bar({
		element: 'morris-bar-chart3',
		data: [
			<?php

					$qry = mysqli_query($con,"SELECT *,count(*) as cnt FROM senior_citizen  group by address ");
					while($row=mysqli_fetch_array($qry)){
					echo "{y:'".$row['address']."',a:'".$row['cnt']."'},";
					}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Resident per purok'],
		hideHover: 'auto'
	});

	Morris.Bar({
		element: 'morris-bar-chart4',
		data: [
			<?php

					$qry = mysqli_query($con,"SELECT count(*) as cnt, round(monthlyPension,-1) as pension  FROM pension group by monthlyPension");
					while($row=mysqli_fetch_array($qry)){
					echo "{y:'".$row['pension']."',a:'".$row['cnt']."'},";
					}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['senior citizen with this pension'],
		hideHover: 'auto'
	});
</script>