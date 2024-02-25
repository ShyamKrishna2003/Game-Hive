<?php
 include("../Assets/Connection/Connection.php");
 ob_start();
 include('head.php');
 //session_start();
 
 $selUser="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$_GET['showP']."'";
 $resUser=$con->query($selUser);
 $userData=$resUser->fetch_assoc();
 
 $selCom="Select * from tbl_joinlist l inner join tbl_community c on l.community_id=c.community_id where l.user_id='".$_GET['showP']."'";
 $resCom=$con->query($selCom);
 
 $selCC="select * from tbl_community c inner join tbl_user u on c.user_id=u.user_id where c.user_id='".$_GET['showP']."'";
 $resCC=$con->query($selCC);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show User Profile</title>
</head>

<body>
<header>
<h2 align="center">User Profile</h2>
</header>

<div class="container mt-5">
        <table class="table table-bordered" width="700" height="400" align="center">
            <tr>
                <td colspan="2" align="center">
                    <img src="../Assets/File/User/<?php echo $userData['user_photo'];?>" width="200" height="150">
                </td>
            </tr>
            <tr>
                <th scope="row">Name</th>
                <td>&nbsp;<?php echo ucfirst($userData['user_name'])?></td>
            </tr>
            <tr>
                <th scope="row">Email-id</th>
                <td>&nbsp;<?php echo $userData['user_email'];?></td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td>&nbsp;<?php echo $userData['user_contact'];?></td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td>
                    &nbsp;<?php echo $userData['user_address'];?><br />
                    <?php echo $userData['district_name'];?>, <?php echo $userData['place_name'];?>
                </td>
            </tr>
            <tr>
                <th scope="row">Gender</th>
                <td>&nbsp;<?php echo ucfirst($userData['user_gender'])?></td>
            </tr>
            <tr>
                <th scope="row">Date Of Birth</th>
                <td>&nbsp;<?php echo $userData['user_dob'];?></td>
            </tr>
            <tr>
                <th scope="row">Communities Joined</th>
                <td>
                    <?php
                    if($resCom->num_rows > 0) {
                        while($dataCom = $resCom->fetch_assoc()) {
                            echo $dataCom['community_name'];
                            echo "<br>";
                        }
                    } else {
                        echo "No Communities Joined";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="row">Communities Created</th>
                <td>
                    <?php 
                    if($resCC->num_rows > 0) {
                        while($dataCC = $resCC->fetch_assoc()) {
                            echo $dataCC['community_name'];
                            echo "<br>";
                        }
                    } else {
                        echo "No Communities Created";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href="UsersList.php?delUser=<?php echo $userData['user_id'];?>" class="btn btn-danger">Ban</a></td>
            </tr>
        </table>
</div>
</body>
<?php
include('foot.php');
ob_flush();
?>
</html>