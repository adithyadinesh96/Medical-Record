<?php
 require('connect.php');
    session_start();
    echo "<br><br><br><br><br>";
    




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
        	 <ul class="nav navbar-nav">     
             <li><a href="prescription.php"><strong>Prescription</strong></a></li>
        	 <ul class="navbar-nav nav pull-right">
        	 <li>
			<a href="logout.php"><strong>Log Out</strong></a>
        	 </li>
        	 	
        	 </ul>
        	 </ul>
        	 </div>
        	 </div>
        	 </div>
