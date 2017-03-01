<?php
require('connect.php');
session_start();
$email=$_SESSION['email'];
$id='';
$dname='';
$specialization='';
$query="SELECT `dnumber` FROM `dauthentication` WHERE email='$email'";
$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_object($result)){
$id=$row->dnumber;

	}
	
	$query2="SELECT `dname`,`specialization` FROM `doctors` WHERE dnumber='$id'";
	$result2=mysqli_query($connection,$query2);
while($row2=mysqli_fetch_object($result2)){
$dname=$row2->dname;
$specialization=$row2->specialization;


	}
	
?>
<!doctype html>
<html>      
    <head>          
    <title>MEDICAL RECORDS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/prescription.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             <script type="text/javascript" src="../js/index.js"></script>
    </head>
    <body>

<div class="container">
 
<h2>Prescription</h2>
<h4>BY <?php echo "$dname		" ?></h4><h4>Specialization: <?php echo "$specialization" ?></h4>
 
 
 
 
<div class="form-group">
 
<label for=" Email1msg"></label>
 
<textarea class="form-control" rows="5"></textarea>
 
</div>
  
</div>

 <button class="btn btn-info" onClick="window.print()">Print</button>
 
 

 
 



</body>
</html>

