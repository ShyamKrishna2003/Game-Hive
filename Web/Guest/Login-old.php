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
  }
		  
?>

<html>
<head>
 <title>Login form</title>
</head>
<?php
include('Head.php');
?>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center text-dark">Login</h2>
                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email-id</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <p class="text-center">Don't have an account? <a href="UserRegistration.php">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>