<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include('Head.php');
  ob_start();
  
  $selCom="select * from tbl_joinlist l inner join tbl_community c on l.community_id=c.community_id where c.user_id='".$_SESSION['uid']."' or l.list_status=1 and l.user_id='5' GROUP by l.community_id";
  // echo $selCom;
  $res=$con->query($selCom);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joined Communities</title>
</head>

<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Change background color to dark -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="JoinedCommunityies.php">Joined Communities</a> <!-- Set link text color to white -->
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="ActiveCommunity.php">Active Community List</a> <!-- Set link text color to white -->
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="MyCommunitys.php">My Community List</a> <!-- Set link text color to white -->
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="CommunityRegistration.php">Create Community</a> <!-- Set link text color to white -->
        </li>
      </ul>
    </div>
  </nav>

  <?php
  if ($res->num_rows <= 0) {
    ?>
    <h1 class="text-center">No Communities Joined Yet</h1>
  <?php
  } else {
  ?>
    <table class="table table-bordered table-hover mx-auto">
      <?php
      while ($data = $res->fetch_assoc()) {
      ?>
        <tr>
          <td style="width: 150px; text-align: center;"> <!-- Center contents within the <td> -->
            <img src="../Assets/File/Community/<?php echo $data['community_photo']; ?>" class="img-fluid" alt="<?php echo $data['community_name']; ?>" />
          </td>
          <th scope="row" style="width: 150px; text-align: center;">
            <a href="ViewPost.php?c_id=<?php echo $data['community_id']; ?>" class="text-white"> <!-- Set link text color to white -->
              <?php echo $data['community_name']; ?><br />
              <?php
              if($data['community_status'] == 0)
	            {
		              echo "<sub>Open Community</sub>";
	            }
	            else
            	{
		              echo "<sup>Closed Community</sub>";
            	}
              ?>
            </a>
          </th>
          <td class="text-white"><?php echo $data['community_details']; ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
  <?php
  }
  ?>
</div>


</body>
</html>
<?php
ob_flush();
include('Foot.php');
?>