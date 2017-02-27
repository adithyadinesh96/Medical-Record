<?php
    require('connect.php');
    session_start();
    echo "<br><br><br><br><br>";
    $id='';
    $email='';
    $username='';
    $password='';
    $passwordagain='';
     if (isset($_POST['email']) && isset($_POST['password'])) {
    echo "<br><br><br><br>";

    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT `password` FROM `dauthentication` WHERE email='$email'";
    $result= mysqli_query($connection, $query);
    while($row=mysqli_fetch_object($result)){
        $passwordagain=$row->password;
        # code...
    }
    if($password==$passwordagain){
        $smsg="YAAY u logged in";
        $_SESSION["email"]=$email;
        header("Location:doctordetails.php");
    }
    else $fmsg="LOGIN FAILED";
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
      <br>
      <br>
      <br>
      <h1>Doctor Sign In</h1>
      
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo addslashes($email); ?>" required >
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