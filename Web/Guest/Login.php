<?php 
  include("../Assets/Connection/Connection.php");

  session_start();
  ob_start();

  if(isset($_POST['login']))
  {
	  $email=$_POST['email'];
	  $pass=$_POST['password'];
	  
	  $selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$pass."'";
	  $selUser="select * from tbl_user where user_email='".$email."' and user_password='".$pass."'";
	  
	  $resAdmin=$con->query($selAdmin);
	  $resUser=$con->query($selUser);
	  
	  if($resAdmin->num_rows>0)
	  {
		  $row=$resAdmin->fetch_assoc();
		  $_SESSION['aid']=$row['admin_id'];
		  $_SESSION['aname']=$row['admin_name'];
		  header("Location:../Admin/AdminHomepage.php");
	  }
	  else if($resUser->num_rows>0)
	  {
		  $row=$resUser->fetch_assoc();
		  $_SESSION['uid']=$row['user_id'];
		  $_SESSION['uname']=$row['user_name'];
		  header("Location:../User/UserHomepage.php");
	  }
    else
    {
      ?>
      <script>
        alert("User Not Found!");
        window.location="Login.php";
      </script>
      <?php
    }
  }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Transparent Material Login Form</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css'><link rel="stylesheet" href="../Assets/Templates/Login/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form class="login-form" action="" method="post" action="javascript:void(0);">
  <h1>Login</h1>
  <div class="form-input-material">
    <input type="email" name="email" id="email" placeholder=" " autocomplete="off" class="form-control-material" required />
    <label for="username">Email</label>
  </div>
  <div class="form-input-material">
    <input type="password" name="password" id="password" placeholder=" " autocomplete="off" class="form-control-material" required  />
    <label for="password">Password</label>
  </div>
  <input type="submit" name="login"  class="btn btn-primary btn-ghost" value="Login">
  <p>Don't heve an account<a href="UserRegistration.php">Sign in</a></p>
</form>
<!-- partial -->
  
</body>
</html>
