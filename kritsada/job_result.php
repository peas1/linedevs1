<html>
	<head>
		<title>ข้อมูลงานก่อสร้าง</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0," charset="utf-8">
		<title>BOT TRAIN PEA S.1</title>
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
		<style type="text/css">
			.row-center
			{
				text-align:center;
			}
			body
			{
				font-family: 'Kanit', sans-serif;
			}
		</style>
	</head>
	<body>
		<?php
			$server = "us-cdbr-iron-east-01.cleardb.net";
			$username = "bb638a0b9e5724";
			$password = "3556cc19";
			$db = "heroku_5663ecc9ac15f3e";
			$conn = new mysqli($server, $username, $password, $db);
			mysqli_query($conn, "SET NAMES utf8");
			$keyword = $_POST["keyword"];
			if(isset($keyword))
			{
				$sql_search ="SELECT * FROM tbl_improve WHERE name LIKE '%".$keyword."%'";
				$query_search = mysqli_query($conn,$sql_search);
			}
		?>
		<div class="container" style="background-color:#4285F4;">
			<div class="row row-center">
				<div class="col-md-12">
					<h4>ผลการค้นหา</h4>
				</div>
			</div>
		</div>
		<div class="mt-2 container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="list-group">
						<?php
						$a=1;
						while($objsearch = mysqli_fetch_array($query_search))
						{
							echo '<li class="list-group-item">';
							echo $a.".<br>";
							echo "กฟฟ.  : ".$objsearch["pea"]."<br>";
							echo "WBS : ".$objsearch["wbs"]."<br>";
							echo "ชื่องาน :".$objsearch["detail"];
							echo '</li>';
							$a=$a+1;
						}
						$a=0;
						?>  
					</div>
				</div>
			</div>
		</div>
	</body>
</html>