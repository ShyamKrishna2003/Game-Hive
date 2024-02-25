<?php  
  include("../Assets/Connection/Connection.php");
  session_start();
  include('Head.php');
  ob_start();
  
  $seluser="select * from tbl_category c inner join tbl_user u on c.category_id=u.category_id inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$_SESSION['uid']."'";
//   echo $seluser;
  $res=$con->query($seluser);
  $row=$res->fetch_assoc();  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>

</head>

<body> 

<div class="container mt-4">
        <h2 class="text-center text-white">My Profile</h2>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <img src="../Assets/File/User/<?php echo $row['user_photo'] ?>" class="img-fluid" alt="User Photo" />
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="text-white">Name</th>
                            <td class="text-white"><?php echo $row['user_name']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Favorite Game</th>
                            <td class="text-white"><?php echo $row['user_game']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Game Category</th>
                            <td class="text-white"><?php echo $row['category_name']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Gaming Experience Level</th>
                            <td class="text-white"><?php echo $row['user_experience']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Contact</th>
                            <td class="text-white"><?php echo $row['user_contact']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Email-id</th>
                            <td class="text-white"><?php echo $row['user_email']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Address</th>
                            <td class="text-white">
                                <?php echo $row['user_address']?><br />
                                <?php echo $row['district_name']?>,<?php echo $row['place_name']?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-white">Gender</th>
                            <td class="text-white"><?php echo $row['user_gender']?></td>
                        </tr>
                        <tr>
                            <th class="text-white">Date of Birth</th>
                            <td class="text-white"><?php echo $row['user_dob']?></td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
                        <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
                        <a href="SessionValidator.php" class="btn btn-danger">Log Out</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include('Foot.php');
ob_flush();

?>