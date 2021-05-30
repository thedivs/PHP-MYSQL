<?php
session_start();
if(isset($_SESSION['username']) && (!isset($_SESSION['key']))){
   header('location:account.php?q=1');
}
else if(isset($_SESSION['username']) && isset($_SESSION['key']) && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39'){
   header('location:dash.php?q=0');
} 
else{}
?>
<!DOCTYPE>
<html >
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> EduTech Future</title>
   
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/> 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
<script>
function validateForm() {
  var y = document.forms["form"]["name"].value; 
  if (y == null || y == "") {
    document.getElementById("errormsg").innerHTML="Name must be filled out.";
    return false;
  }
  if (m.length < 10) {
    document.getElementById("errormsg").innerHTML="Passwordr must be 12 digits long";
    return false;
  }
  var g = document.forms["form"]["gender"].value;
  if (g=="") {
    document.getElementById("errormsg").innerHTML="Please select your gender";
    return false;
  }
 
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 4) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  }
  var m = document.forms["form"]["phno"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
  var a = document.forms["form"]["password"].value;
  if(a == null || a == ""){
    document.getElementById("errormsg").innerHTML="Password must be filled out";
    return false;
  }
  if(a.length<4 || a.length>15){
    document.getElementById("errormsg").innerHTML="Passwords must be 4 to 15 characters long.";
    return false;
  }
  var b = document.forms["form"]["cpassword"].value;
  if (a!=b){
    document.getElementById("errormsg").innerHTML="Passwords must match.";
    return false;
  }
}
</script>
</head>
<body>
<div>
<nav class="navbar navbar-dark bg-primary" style="color: white;">
  <div class="container-md">
      <span class="navbar-brand" style="font-size: 25px; font-family: sans-serif;">EduTech Future</span>
      <span class="navbar-brand" style="float: right;">Contact us :<span style="color: white;">&nbsp;+91-9557963838</span></span>
      <span class="navbar-brand" style="float: right;"><a href="#" style="color: white; text-decoration: none;" class="btn btn-success" data-toggle="modal" data-target="#myModal">LOGIN</a></span>
   
  </div>
</nav>
<div class="panel">
  <div class="container-md">
    <center><h2><u>DEMO MOCK TESTS</u></h2></center>
    <?php
include 'dbConnection.php';
$result = mysqli_query($con, "SELECT * FROM demo WHERE status = 'enabled' ORDER BY date DESC") or die('Error');
    echo '<table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Correct Answer</b></td><td style="vertical-align:middle"><b>Wrong Answer</b></td><td style="vertical-align:middle"><b>Total Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
  $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $wrong   = $row['wrong'];
        $time    = $row['time'];
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td>  <td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a data-toggle="modal" data-target="#myModal" class="btn" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;padding-left:10px;padding-right:10px"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>Start</b></span></a></b></td></tr><br>';
                                                 }
    echo '</table></div><div class="panel" style="padding-top:1px;padding-left:15%;padding-right:15%;word-wrap:break-word">';
    ?>  
  </div>
</div>
</div>
<div class="col-lg-12">
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Login to your Account</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-3 control-label" for="username"></label>  
  <div class="col-md-6">
  <input id="username" name="username" placeholder="Username" class="form-control input-md" type="username">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Log in</button>
    </fieldset>
</form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- Welcome note -->
<div class="bg1">

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-6 panel" style="margin: 200px 0 0 0; background-color: black; opacity: 0.7;"> 
  <div class="form-group"> 
  <div class="col-md-12">
  <h2 align="center" style="color: white;"><b>Welcome to the EduTech Future</b></h2>
  <h4 align="center" style="font-family: sans-serif; color: white;">"An Online PLatform to Prepare yourself for different Exams."</h4><br>
  <h5 align="center" style="font-family: sans-serif; font-size: 30px; color: white;">Register Yourself to <b>GET STARTED</b></h5>
    
  <h4 align="center" style="font-family: sans-serif; color: white;">PAY for PREMIUM Account after Register to Get Chapter wise Quizess.</h4>
  </div>
</div>
</div>
<!-- End of Welcome note -->

<div class="col-md-2"></div>
<div class="col-md-4 panel"> 
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <h3 align="center">Registration Form</h3>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"><?php
if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
}
?></div>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text" required="" value="<?php
if (isset($_GET['name']))
{
echo $_GET['name'];
}?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Select your gender" class="form-control input-md" >
   <option value="" <?php
if (!isset($_GET['gender']))
    echo "selected";
?>>Select Gender</option>
  <option value="M" <?php
  if (isset($_GET['gender']))
  {
if ($_GET['gender'] == "M")
    echo "selected";
  }
?>>Male</option>
  <option value="F" <?php
  if (isset($_GET['gender']))
  {
if ($_GET['gender'] == "F")
    echo "selected";
  }
?>>Female</option> </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-1 2 control-label title1" for="username"></label>
  <div class="col-md-12">
    <input id="username" name="username" placeholder="Choose a username" class="form-control input-md" type="username" value="<?php
if (isset($_GET['username']))
{
echo $_GET['username'];
};
?>" style="<?php
if (isset($_GET['q7']))
    echo "border-color:red";
?>">

  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="phno"></label>  
  <div class="col-md-12">
  <input id="phno" name="phno" placeholder="Enter your mobile number" class="form-control md" value="<?php
if (isset($_GET['phno']))
{
echo $_GET['phno'];
}
?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control input-md" type="password" required="">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12" style="text-align: center"> 
    <input  type="submit" value=" Register Now " class="btn btn-primary" style="text-align:center" />
  </div>
</div>

</fieldset>
<span style="font-family: sans-serif; font-size: 25px;">Already have account ?</span>
<a href="#" class="btn btn-success logb" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b> Login </b> </span></a>
</form>
</div>
</div></div>
</div>
<div class="row footer">
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login" style="color:lightyellow;">Admin Login</a></div>
<div class="col-md-6 box"><a href="contact.php">
<span style="color:white; font-size: 15px;">EDUTECH FUTURE<br><br></span></a>
</div>


<div class="col-md-2 box">
<a href="feedback.php" style="color:lightyellow;" onmouseover="this.style('color:yellow')" target="new">Feedback</a>
</div>

   <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:darkblue;font-size:12px;font-weight: bold">ADMIN LOGIN</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Username" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="30" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-success" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
