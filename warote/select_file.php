<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0," charset="utf-8">
		<title>UPLOAD XLS FILE</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="./assets/bootstrap/js/bootstrap.js"></script>
        <script src="./assets/blockUI/jquery.blockUI.js"></script>
        <script src="./assets/jqueryScrollTableBody/jqueryScrollTableBody.js"></script>   
		<style type="text/css">
			.row-center
			{
				text-align:center;
			}
			container-fluid 
			{
				font-family: 'Kanit', sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid" style="background-color:pink;">
			<div class="row row-center">
				<div class="col-lg-4 offset-lg-4" style="background-color:pink;">
					<h4>UPLOAD XLS FILE</h4>
				</div>
			</div>
		</div>
		<div class="mt-2 container"> 
			<div class="row">
				<div class="col-lg-2" >
					<form name="voc-form" id="voc-form" method="POST" enctype="multipart/form-data">
						<div class="row">
							<label for="vocfile">ไฟล์ xls</label>
							<input type="file" required name="vocfile" class="form-control-file btn btn-dark" id="vocfile" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
						</div>
						<div class="mt-2 row">
							<input class="btn btn-success btn-block" type="submit" value="Upload" >
						</div>
					</form>
				</div>
				<div class="col-lg-10">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>การไฟฟ้า</th>
									<th>ชื่องาน</th>
									<th>เลขที่อนุมัติ</th>
									<th>ลงวันที่</th>
									<th>WBS</th>
								</tr>
							</thead>
							<tbody>
								<?php
									require('connect-db.php');
									$sql = "SELECT * FROM tbl_job_cn";
									$query = mysqli_query($conn,$sql);
									while($obj = mysqli_fetch_array($query))
									{
										echo "<tr>";
										echo "<td>".$obj["office"]."</td>";
										echo "<td>".$obj["job_name"]."</td>";
										echo "<td>".$obj["doc_no"]."</td>";
										echo "<td>".$obj["doc_date"]."</td>";
										echo "<td>".$obj["wbs"]."</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
        $(function(){
            $('[id="voc-form"]').submit(function(event){
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: 'upload-xls.php',
                    method: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    beforeSend: function(){
                        $.blockUI({ message:'<h3>Uploading xlsx file...</h3>' });
                    },
                    success: function(response) {
                        alert(response);
                    },
                    error: function(response){
                        console.log('[error]', response);
                    },
                    complete: function() {
                        $.unblockUI();
                        location.reload();
                    }
                });
                return false;
            });
        });
</script>
</html>