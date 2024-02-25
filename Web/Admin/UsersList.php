<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';


 include("../Assets/Connection/Connection.php");
 ob_start();
 include('head.php');

//  session_start();
 
$selUser="select * from tbl_user";
 $resSel=$con->query($selUser);
 
 if(isset($_GET['delUser']))
 {




    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gamehive188@gmail.com'; // Your gmail
    $mail->Password = 'bhuacyepzieyslel'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('gamehive188@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Banned from GameHive";
    $mail->Body = "We are sorry to inform that you have been banned from our website";
  if($mail->send())
  {
    
	 $delUser="delete from tbl_user where user_id='".$_GET['delUser']."'";
	 if($con->query($delUser))
	 {
		 header("Location:UsersList.php");
	 }
  }
  else
  {
    
  }




 }
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
</head>

<body>
<header>
<h2 align="center">Users List</h2>
</header>

<table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th scope="col">SL.No</th>
                <th scope="col">User Photo</th>
                <th scope="col">User Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($userData = $resSel->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><img src="../Assets/File/User/<?php echo $userData['user_photo']; ?>" height="50" width="50" /></td>
                    <td>&nbsp;<a href="ShowUserProfile.php?showP=<?php echo $userData['user_id']; ?>"><?php echo ucfirst($userData['user_name']) ?></a></td>
                    <td>&nbsp;<a href="UsersList.php?delUser=<?php echo $userData['user_id']; ?>&email=<?php echo $userData['user_email']; ?>" class="btn btn-danger">Ban</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</body>
<?php
include('foot.php');
ob_flush();
?>
</html>