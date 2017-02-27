<?php
	require('connect.php');
	session_start();
	$id='';
	$email='';
	$username='';
	$password='';
	$navemail='';
	$navpassword='';
	$navpasswordagain='';
	$name='';
	$user='';
	$age='';
	$locality='';
	$gender='';$height='';
	$weight='';
	$bloodgroup='';
	$username=$_SESSION['username'];
	if(isset($_POST['name']) && isset($_POST['age'])  && isset($_POST['locality']) && isset($_POST['gender'])
&& isset($_POST['height'])
&& isset($_POST['weight'])
&& isset($_POST['bloodgroup'])){
	    $name=$_POST['name'];
		$age=$_POST['age'];
		$locality=$_POST['locality'];
		$gender=$_POST['gender'];
		$height=$_POST['height'];
		$weight=$_POST['weight'];
		$bloodgroup=$_POST['bloodgroup'];
		$query1="SELECT `pnumber` FROM `pauthentication` WHERE username='$username'";
		$result1 = mysqli_query($connection, $query1);
		while($row=mysqli_fetch_object($result1)){
		$id=$row->pnumber;
		}
		$query2 = "INSERT INTO `patientpinfo` (pnumber,pname, gender, age, locality,height, weight,bloodgroup) VALUES ('$id','$name', '$gender', '$age', '$locality','$height', '$weight', '$bloodgroup')";
$result2 = mysqli_query($connection, $query2);

if ($result2) {
	$smsg = "User Created Successfully.";


header("Location:home.php");
}
else
     $fmsg ="User Registration Failed";
        }


	?>
	<!doctype html>
<html>	    
	<head>	        
	<title>MEDICAL RECORDS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="index.css">
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
        
	  
        <h2 class="form-signin-heading">Please Enter the following details</h2>
        <br>
        
	  <!--span class="input-group-addon" id="basic-addon1">@</span-->
	  <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo addslashes($name); ?>" required autofocus>
		 <br>
       <!--  <label for="inputEmail" class="sr-only">Email address</label>-->
        <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" value="<?php echo addslashes($gender); ?>" required >
         <br>
       <!-- <label for="inputPassword" class="sr-only">Password</label>-->
        <input type="text" name="age" id="age" class="form-control" placeholder="Age" value="<?php echo addslashes($age); ?>" required>
         <br>
        <input type="text" name="locality" id="loaclity" class="form-control" placeholder="Locality" value="<?php echo addslashes($locality); ?>" required>
        <br>
          <input type="text" name="height" id="height" class="form-control" placeholder="Height" value="<?php echo addslashes($height); ?>" required>
           <br>
          <input type="text" name="weight" id="weight" class="form-control" placeholder="Weight" value="<?php echo addslashes($weight); ?>" required>
           <br>
          <input type="text" name="bloodgroup" id="bloodgroup" class="form-control" placeholder="Bloodgroup" value="<?php echo addslashes($bloodgroup); ?>" required>
                 <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

                	</form>
                	</div>

                </body>
                </html>
