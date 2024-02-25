<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include('Head.php');
  ob_start();
  
  $sel="select * from tbl_community where user_id='".$_SESSION['uid']."'";
  $row=$con->query($sel);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Community List</title>
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
if ($row->num_rows <= 0) {
    ?>
    <div class="container text-center">
        <h1 class="text-white">No Communities Created Yet</h1>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <table class="table table-bordered table-hover mx-auto">
            <?php
            while ($data = $row->fetch_assoc()) {
                ?>
                <tr>
                    <td style="width: 150px; text-align: center;">
                        <img src="../Assets/File/Community/<?php echo $data['community_photo'] ?>" width="100" height="60" alt="Community Photo">
                        <a href="CommunityHomepage.php?c_id=<?php echo $data['community_id']; ?>" class="text-white"><?php echo ucfirst($data['community_name']) ?></a>
                        <br />
                        <?php
                        if ($data['community_status'] == 0) {
                            echo "<sub class='text-white'>Open Community</sub><br />";
                        } else {
                            echo "<sup class='text-white'>Closed Community</sup><br />";
                        }
                        ?>
                    </td>
                    <td class="text-white text-align: center"><?php echo $data['community_details']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
}
?>


</body>
</html>
<?php
ob_flush();
include('Foot.php');
?>