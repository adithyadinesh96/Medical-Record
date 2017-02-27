<?php
require('connect.php');
	session_start();
	$username='';



	if (isset($_POST['username']) && isset($_POST['password'])) {
	echo "<br><br><br><br>";

	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="SELECT `password` FROM `bloodbank` WHERE username='$username'";
	$result= mysqli_query($connection, $query);
	while($row=mysqli_fetch_object($result)){
		$passwordagain=$row->password;
		# code...
	}
	if($password==$passwordagain){
		$smsg="YAAY u logged in";
		$_SESSION["username"]=$username;
		header("Location:bloodbankurgent.php");

	}
	else $fmsg="LOGIN FAILED";

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
 <br>
      <br>
      <br>
      <br>
      <form   class="form-signin" method="POST">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <h1 class="whitec"><center>Bloodbank Sign In</center></h1>
      
        <br>
        <label for="inputusername" class="sr-only">Username</label>
        <input type="username" name="username" id="inputusername" class="form-control" placeholder="Username" value="<?php echo addslashes($username); ?>" required >
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
               <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                </form>
                </div>
                </body>
                </html>