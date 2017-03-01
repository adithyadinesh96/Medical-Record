<?php
    require('connect.php');
    session_start();
    echo "<br><br><br><br><br>";
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
    // If the values are posted, insert them into the database.
    if(isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['password_again'])){


         $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_again = $_POST['password_again'];

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))$fmsg ="Please Enter Valid Email Address";
        else if($password!=$password_again)$fmsg ="Passwords do not match";
        else{
        $password_hash=md5(md5($_POST['email']).$_POST['password']);
        $check="SELECT * FROM `pauthentication` WHERE email='$email'";
        $res=mysqli_query($connection,$check);
        $res1=mysqli_num_rows($res);
        if($res1)  $fmsg ="Account already exists";
        else{
        $query = "INSERT INTO `pauthentication` (username, password, email) VALUES ('$username', '$password_hash', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $_SESSION['username']=$username;
         header("Location:php/register.php");
        }
        else{
                      $fmsg ="User Registration Failed";
                }
            }
        
    }

}
    
    

    if (isset($_POST['navemail']) && isset($_POST['navpassword'])) {
    echo "<br><br><br><br>";

    $navemail=$_POST['navemail'];
    $navpassword=md5(md5($_POST['navemail']).$_POST['navpassword']);
    $query="SELECT `password` FROM `pauthentication` WHERE email='$navemail'";
    $result= mysqli_query($connection, $query);
    while($row=mysqli_fetch_object($result)){
        $navpasswordagain=$row->password;
      
    }
    if($navpassword==$navpasswordagain){
        $smsg="YAAY u logged in";
        $_SESSION["email"]=$navemail;
        header("Location:php/home.php");
    }
    else $fmsg="LOGIN FAILED";
}
?>


<!doctype html>
<html>      
    <head>          
    <title>MEDICAL RECORDS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             <script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>
        <!-- Latest compiled and minified CSS -->
        <!--navbar star-->
       <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">     
                                                <li><a href="#" class="visible-lg "><strong>Medical Records</strong></a></li>
                                                <li><a href="#" class="w"><strong>Home</strong></a></li>
                                                <li class=" dropdown">
                                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Doctor</strong><span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="php/doctorsview.php">View Doctors</a></li>
                                                        <li><a href="php/doctorsign.php">Doctor Sign In</a></li>
                                                    </ul>
                                                </li>
                                              
                                                <li class= "dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Blood Bank</strong><span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                       
                                                        <li><a href="php/bloodbank.php">Blood Bank Sign In</a></li>
                                                    </ul>
                                                </li>
                                               
                                            </ul>

                <form class="navbar-form navbar-right" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="navemail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="navpassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
                </form>
            </div>
        </center>
    </div>
</div>
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
        <h2 class="form-signin-heading">Please Sign UP</h2>
        
      <!--span class="input-group-addon" id="basic-addon1">@</span-->
      <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo addslashes($username); ?>" required autofocus>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo addslashes($email); ?>" required >
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
        <input type="password" name="password_again" id="inputPassword1" class="form-control" placeholder="Re-Enter Password" required>
               <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

        
        
        
      <!--<a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>-->
      </form>
</div>

                        </div> 
                        </body>
                        </html>

   


  