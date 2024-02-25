<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include("Community-Head.php");
  ob_start();
  
  if(isset($_GET['delUser']))
  {
	  $updateJL="update tbl_joinlist set list_status=2 where user_id='".$_GET['delUser']."'";
	  if($con->query($updateJL))
	  {
      ?>
      <script>
       winsdow.Location="ShowMembers.php";
      </script>
     <?php
	  }
  }
  
  $selMembers="select * from tbl_joinlist l inner join tbl_user u on l.user_id=u.user_id where community_id='".$_SESSION['cid']."' and l.list_status=1";
  $res=$con->query($selMembers);

  $selCom="select * from tbl_community where community_id='".$_SESSION['cid']."'";
  $resCom=$con->query($selCom);
  $dataCom=$resCom->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Members</title>
</head>
<body>

<header class="text-center bg-dark text-white py-3">
  <?php
  if($dataCom['user_id'] == $_SESSION['uid'])  {
    ?>
    <a href="Requests.php" class="text-white">Requests</a>
    <?php
  }
  ?>
</header>

<?php
if($res->num_rows <= 0)
{
	?><h2 align="center">No Members Joined Yet</h2><?php
}
else
{
	?>
  <table class="table table-bordered table-hover mx-auto">
  <tr height="50">
    <th class="text-white text-align: center;">&nbsp;SL.No</th>
    <th class="text-white">&nbsp;Photo</th>
    <th class="text-white">&nbsp;Name</th>
    <th class="text-white">&nbsp;Action</th>
  </tr>
  <?php
  $i=0;
  while($data=$res->fetch_assoc())
  {
	  $i++;
	  ?>
      <tr>
        <th class="text-white text-align: center;"><?php echo $i; ?></th>
        <td><img src="../Assets/File/User/<?php echo $data['user_photo']?>" height="200" width="100"/></td>
    	  <td class="text-white">&nbsp;<?php echo ucfirst($data['user_name'])?></td>
        <?php
        if($data['user_id'] != $_SESSION['uid'])
        {
          ?>
          <td align="center">&nbsp;<a href="ShowMembers.php?delUser=<?php echo $data['user_id']; echo $data['user_id'];?>" class="btn btn-danger text-align: center;">Ban</a></td>
          <?php
        }
        ?>
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