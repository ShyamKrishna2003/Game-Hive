<?php 
  include("../Assets/Connection/Connection.php");
  session_start();
  include("Head.php");
  ob_start();
  
  $seluser="select * from tbl_user where user_id='".$_SESSION['uid']."'";
  $res=$con->query($seluser);
  $row=$res->fetch_assoc();
  
  $selplace="select * from tbl_user u inner join tbl_place p on u.user_id=p.place_id";
  $place=$con->query($selplace);
  $pdata=$place->fetch_assoc();
  
  $seldistrict="select * from tbl_place p inner join tbl_district d on p.place_id=d.district_id";
  $district=$con->query($seldistrict);
  $ddata=$district->fetch_assoc();
  
  if(isset($_POST["update"]))
  {
	  $name=$_POST["name"];
	  $contact=$_POST["contact"];
	  $email=$_POST["email"];
	  $address=$_POST["address"];
	 
	  $update="update tbl_user set user_name='".$name."', user_contact='".$contact."', user_email='".$email."', user_address='".$address."' where user_id=".$_SESSION['uid']."";
	  $con->query($update);
	  ?>
      <script>
	    alert("Values updated");
		window.location="../User/MyProfile.php";
	  </script>
      <?php
  }
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>
<body style="background-color: #000000; color: #FFFFFF;">
    <div class="container mt-4">
        <h4 class="text-center">Edit Profile</h4>
        <form method="post">
            <table class="table table-bordered text-white">
                <tr>
                    <td colspan="2">Photo</td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td><input type="text" class="form-control" name="name" value="<?php echo ucfirst($row['user_name']) ?>" /></td>
                </tr>
                <tr>
                    <th scope="row">Contact</th>
                    <td><input type="text" class="form-control" name="contact" value="<?php echo $row['user_contact']; ?>"</td>
                </tr>
                <tr>
                    <th scope="row">Email-id</th>
                    <td><input type="text" class="form-control" name="email" value="<?php echo $row['user_email']; ?>"</td>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <td><textarea class="form-control" name="address"><?php echo $row['user_address']; ?></textarea></td>
                </tr> 		
                <tr>
                    <th scope="row">District</th>
                    <td>&nbsp;<?php echo $ddata['district_name']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Place</th>
                    <td>&nbsp;<?php echo $pdata['place_name']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                    <td>&nbsp;<?php echo $row['user_gender']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Date of Birth</th>
                    <td>&nbsp;<?php echo $row['user_dob']; ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="update" value="Edit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>