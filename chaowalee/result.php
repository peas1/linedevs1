<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0," charset="utf-8">
<title>PQ PEAS1</title>
<!-- css -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="tagsinput.css" rel="stylesheet" type="text/css">
<script src="tagsinput.js"></script>
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
    font-family: 'Mali', cursive;
   }
	#container-fluid{
						margin-bottom: 10px;
					}
</style>
</head>
<body>
<?php
	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b21e535520af4b";
    $password = "402bbf1f";
    $db = "heroku_821969a41e3a17e";
    $conn = new mysqli($server, $username, $password, $db);//ประกาศตัวแปร conn เพื่อเชื่อมไปยังฐานข้อมูล เป็นมาตรฐานการเขียนเชื่อมต่อ
	mysqli_query($conn, "SET NAMES utf-8");
	$keyword = $_GET["keyword"];
if(isset($keyword))
{
    $sql_search ="SELECT * FROM librarypq WHERE keyword LIKE '%".$keyword."%'";
    $query_search = mysqli_query($conn,$sql_search);
}
?>
    <div class="w3-container w3-lime">
        <div class="w3-row">
            <div class="w3-col w3-container l12 w3-center">  
                <h4>PEAS1 : PQ Library</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h3>All results</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="list-group">
                    <?php
                    $a=1;
                    while($objsearch = mysqli_fetch_array($query_search))
                    {
                        echo '<a href="pdf.php?doc_no='.$objsearch["doc_no"].'" class="list-group-item list-group-item-action">';
                        echo $a.".<br>";
                        echo "Category : ".$objsearch["keyword"]."<br>";
                        echo "Type : " .$objsearch["type"]."<br>";
                        echo "Link : " .$objsearch["link"];
                        echo '</a>';
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
