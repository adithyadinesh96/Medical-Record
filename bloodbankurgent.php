<?php
require('connect.php');
	session_start();
$bg='';
$email='';
$location='';
$location=$_SESSION;
if(isset($_POST['bg'])){
	$bg=$_POST['bg'];
	$query="SELECT `email` FROM `pauthentication`,`patientpinfo` WHERE pnumber=pmnumber AND bloodgroup='$bg'";
	$result=mysqli_query($connection,$query);
	while($row=mysqli_fetch_object($result)){
		$email=$row->email;
	}
		$to = "$email";
$subject = "Urgent Blood Group Required"; 
$txt = "There is an urgent requirement of blood of your bloodgroup";
$headers = "From: medicaldatabase2016@gmail.com" . "\r\n";

mail($to,$subject,$txt,$headers);
		
			
}



?>
<!doctype html>
<html>	    
	<head>	        
	<title>MEDICAL RECORDS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bloodbank.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			 <script type="text/javascript" src="index.js"></script>
	</head>
	<body>


 <div class="container">
 <form   class="form-signin" method="POST">
      <br>
      <br>
      <br>
      <br>
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Enter The Required Blood Group</h2>
<input type="text" name="bg" id="bg" class="form-control" placeholder="Blood Group" value="<?php echo addslashes($bg); ?>" required autofocus>
<br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

</form>
</div>
</body>
</html>