<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include('Community-Head.php');
  ob_start();
  

  if(isset($_GET['c_id']))
  {
	  $_SESSION['cid']=$_GET['c_id'];
  }
  else if(isset($_GET['jid']))
  {
	  $insJL="insert into tbl_joinlist(user_id,community_id,list_status)values('".$_SESSION['uid']."','".$_GET['jid']."',1)";
	  if($con->query($insJL))
	  {
		  $_SESSION['cid']=$_GET['jid'];
		  ?>
        <script>
		      alert("Joined In Community");
		    </script>
      <?php
	  }
  }
  $sel="select * from tbl_community where community_id='".$_SESSION['cid']."'";
  $res=$con->query($sel);
  $data=$res->fetch_assoc();
  

  if(isset($_GET['exit']))
  {
    $exit="delete from tbl_joinlist where community_id='".$_SESSION['cid']."' and user_id='".$_GET['exit']."'";
    if($con->query($exit))
    {
      ?>
      <script>
        alert("Your No Longer A Member Of <?php echo $data['community_name']?>");
        window.location="JoinedCommunityies.php";
      </script>
      <?php
    }
  }

  if(isset($_GET['del']))
  {
    $delCom="delete from tbl_community where community_id='".$_SESSION['cid']."'";
    if($con->query($delCom))
    {
      ?>
      <script>
        alert("<?php echo $data['community_name']?> Community Has Been Deleted");
        window.location="JoinedCommunityies.php";
      </script>
      <?php
    }
  }
	  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Community Homepage</title>
</head>
  <h1 align="center"><u><?php echo $data['community_name'];?></u></h1>
  <br><br>
  <ol>
    <li><a href="ShowMembers.php">Show Members</a></li>
    <?php
	  if($data['user_id'] == $_SESSION['uid'])
	  {
		  ?>
		  <li><a href="Requests.php">Show Requests</a></li>
          <?php
	  }
	  ?>
    <li><a href="AddPost.php">Add Post</a></li>
    <li><a href="ViewPost.php">View Post</a></li>
    <li><a href="ChatRoom.php?id=<?php echo $_SESSION['cid'] ?>">Chat Room</a></li>
    <li><a href="UserActivitys.php">My Activitys</a></li>
     <?php
	  if($data['user_id'] != $_SESSION['uid'])
	  {
		  ?>
		    <li><a href="ComplaintToCommunity.php">Complaint</a></li>
        <li><a href="CommunityHomepage.php?exit=<?php echo $_SESSION['uid']?>" class="text-danger">Exit</a></li>
        <?php
	  }
	  else
	  {
		  ?>
        <li><a href="ShowComplaintCommunity.php">Show Complaints</a></li>
        <li><a href="CommunityHomePage.php?del=<?php echo $_SESSION['uid']?>" class="text-danger">Delete</a></li>
        <?php
	  }
	  ?>
  </ol>
<body>
</body>
</html>
<?php
ob_flush();
include('Foot.php');
?>