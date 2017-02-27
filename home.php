<?php
require('connect.php');
	session_start();
	$username=$_SESSION['username'];
	$id='';
	$pname='';
	$gender='';
	$age='';
	$weight='';
	$locality='';
	$height='';
	$bloodgroup='';
	$query="SELECT `pnumber` FROM `pauthentication` WHERE username='$username'";
	$result=mysqli_query($connection,$query);
	while ($row=mysqli_fetch_object($result)) {
		$id=$row->pnumber;
	}

	$query2="SELECT `pname`, `gender`, `age`, `locality`,`height`, `weight`,`bloodgroup` FROM `patientpinfo` WHERE pnumber='$id'";
	$result2=mysqli_query($connection,$query2);
	while ($row=mysqli_fetch_object($result2)) {
		$pname=$row->pname;
		$gender=$row->gender;
		$age=$row->age;
		$locality=$row->locality;
		$height=$row->height;
		$weight=$row->weight;
		$bloodgroup=$row->bloodgroup;
	}
    
	?>
<!doctype html>
<html>      
    <head>          
    <title>MEDICAL RECORDS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             <script type="text/javascript" src="index.js"></script>
    </head>
    <body>
    	<div class="navbar navbar-default navbar-fixed-top">
    	<div class="container">
    		<div class="navbar-header pull-left">
        	 <a href="indexdb.php" class="navbar-brand">Medical Records</a>
        	 </div>
        	 <div class="pull-right">
        	 <ul class="navbar-nav nav pull-right">
        	 <li>
        	 	<a href="logout.php"><strong>Log Out</strong></a>
        	 </li>
        	 	

        	 </ul>
        	 </div>
        	 </div>
        	 </div>





    		<dl class=" vertical-center-row dl-horizontal size">
  <dt>First Name</dt>
  <dd><?php echo $pname ?></dd>
  <dt>Gender</dt>
  <dd><?php echo $gender ?></dd>
  <dt>Age</dt>
  <dd><?php echo $age ?></dd>
  <dt>Locality</dt>
  <dd><?php echo $locality ?></dd>
  <dt>Height</dt>
  <dd><?php echo $height ?></dd>
  <dt>Weight</dt>
  <dd><?php echo $weight ?></dd>

  <dt>Blood Group</dt>
  <dd><?php echo $bloodgroup ?></dd>
  </dl>
    </body>
    </html>

