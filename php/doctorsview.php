<?php
 require('connect.php');
    session_start();
    //$a=array();
    //$b=array();
    echo "<br><br><br><br><br>";
    $query="SELECT  `dname`,`specialization` FROM `doctors`";
  
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_object($result)){
    	$a[]=$row->dname;
    	$b[]=$row->specialization;
		}
		$c=sizeof($a);
		
?>

<!doctype html>
<html>      
    <head>          
    <title>MEDICAL RECORDS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/doctorview.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             <script type="text/javascript" src="../js/index.js"></script>
    </head>
    <body>
<div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header pull-left">
             <a href="../indexdb.php" class="navbar-brand">Medical Records</a>
             </div>
             <div class="pull-right">
             <ul class="navbar-nav nav pull-right">
             </ul>
             </div>
             </div>
             </div>

<?php for ($i=0; $i<$c; $i++) { ?>
	
	<div class="container">
    <div class="vertical-center-row">
        <dl class=" vertical-center-row dl-horizontal">
         <dt>Doctor Name</dt><dd><?php echo $a[$i]."  ";?></dd>  <dt>Specialization</dt><dd><?php echo $b[$i]."  ";?></dd></dl>
    </div>
</div>
	<?php } ?>



</body>
</html>