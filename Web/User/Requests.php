<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include("Community-Head.php");
  ob_start();
  
  if(isset($_GET['accept'])) {
	  $update="UPDATE `tbl_joinlist` SET `list_status` = '1' WHERE user_id='".$_GET['accept']."' and community_id='".$_SESSION['cid']."'";
	  if($con->query($update)) {
		  ?>
      <script>
        window.location="Requests.php"
      </script>
      <?php
	  }
  }
  if(isset($_GET['reject'])) {
	  $reject="delete from tbl_joinlist where user_id='".$_GET['reject']."' and community_id='".$_SESSION['cid']."'";
	  if($con->query($reject)) {
		  ?>
      <script>
        window.location="Requests.php"
      </script>
      <?php
	  }
  }

  $selMembers="select * from tbl_joinlist l inner join tbl_user u on l.user_id=u.user_id where community_id='".$_SESSION['cid']."' and list_status=0";
  $res=$con->query($selMembers);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Requests</title>
</head>
<?php
if($res->num_rows <= 0)
{
  echo "<h2 align='center'>No Requests</h2>";
}
else
{
  ?>
<table class="table table-bordered table-hover mx-auto">
  <caption align="top"><h2 align="center">Show Requests</h2></caption>
  <tr>
    <th scope="row" class="text-white">&nbsp;SL.NO</th>
    <th scope="row" class="text-white">&nbsp;Photo</th>
    <th scope="row" class="text-white">&nbsp;Name</th>
    <th scope="row" colspan="2" class="text-white">&nbsp;Action</th>
  </tr>
  <?php

  $i=0;
  while($data=$res->fetch_assoc())
  {
	  $i++;
	  ?>
      <tr class="text-white">
        <th class="text-white" align="center"><?php echo $i ?></th>
        <td><img src="../Assets/File/User/<?php echo $data['user_photo']?>" height="200" width="100"/></td>
    	<td>&nbsp;<a href="ShowProfile.php?showP=<?php echo $data['user_id'];?>"><?php echo ucfirst($data['user_name'])?></a></td>
        <th scope="row">&nbsp;<a href="Requests.php?accept=<?php echo $data['user_id'];?>" class="btn btn-primary">Accept</th>
   	    <th scope="row">&nbsp;<a href="Requests.php?reject=<?php echo $data['user_id'];?>" class="btn btn-danger">Reject</th>
       </tr>
    <?php
  }  
  ?>
  </table>
  <?php
}
?>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>