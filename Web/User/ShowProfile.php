<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include("Community-Head.php");
  ob_start();
  
  $selUser="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_category c on u.category_id=c.category_id where user_id='".$_GET['showP']."'";
  $resUser=$con->query($selUser);
  $data=$resUser->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Profile</title>
</head>

<body>
<table class="table table-bordered table-hover mx-auto text-white">
  <caption align="top">
    <h3 align="center"><?php echo $data['user_name'];?> Profile</h3>
  </caption>
  <tr>
    <td colspan="2"><img src="../Assets/File/User/<?php echo $data['user_photo']?>" /></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">&nbsp;Name</th>
    <td>&nbsp;<?php echo ucfirst($data['user_name'])?></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">Favorite Game</th>
    <td>&nbsp;<?php echo $data['user_game']?></td>
  </tr>
    <tr height="50">
    <th scope="row" class="text-white">Game Category</th>
    <td>&nbsp;<?php echo $data['category_name']?></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">Gaming Experience Level</th>
    <td>&nbsp;<?php echo $data['user_experience']?>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">&nbsp;Email-id</th>
    <td>&nbsp;<?php echo $data['user_email'];?></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">&nbsp;Phone</th>
    <td>&nbsp;<?php echo $data['user_contact'];?></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">&nbsp;Address</th>
    <td>&nbsp;<?php echo $data['user_address'];?><br /><?php echo $data['district_name'];?>,<?php echo $data['place_name'];?></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">&nbsp;Gender</th>
    <td>&nbsp;<?php echo $data['user_gender'];?></td>
  </tr>
  <tr height="50">
    <th scope="row" class="text-white">&nbsp;Date Of Birth</th>
    <td>&nbsp;<?php echo $data['user_dob'];?></td>
  </tr>
  <tr height="50" align="center">
  	<th scope="row" colspan="2">
    <a href="Requests.php?accept=<?php echo $data['user_id'];?>" class="btn btn-primary">Accept</a>
    <a href="Requests.php?reject=<?php echo $data['user_id'];?>" class="btn btn-danger">Reject</a>
    </th>
  </tr>
</table>

</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>