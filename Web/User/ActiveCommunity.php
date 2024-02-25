<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include('Head.php');
  ob_start();
  
  if(isset($_GET['cid']))
  {
	  $insr="insert into tbl_joinlist(user_id,community_id,list_status)values('".$_SESSION['uid']."','".$_GET['cid']."',0)";
	  if($con->query($insr)){
		  ?>
        <script>
		      window.location="ActiveCommunity.php";
		    </script>
      <?php
	  }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Community</title>
</head>

<body>
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
  <br>
<div class="container">
	<table width="200" border="1" align="center" style="border: hidden;">
  	<tr style="cellpadding=10px">
 			<td class="text-white">Search</td>
   		<td colspan="2" align="center">
    		<input type="search" name="search" id="search" onKeyUp="getSearch()" />
  		</td>
		</tr>
 	</table>
  	<div id="csearch">
  	<form method="post">
   	<br />
	<div class="container mt-4">
  <div class="row">
    <?php
    $sel = "select * from tbl_community";
    $row = $con->query($sel);
    $i = 0;
    while ($data = $row->fetch_assoc()) {
      $i++;
    ?>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../Assets/File/Community/<?php echo $data['community_photo']; ?>" class="card-img-top" alt="Community Photo">
          <div class="card-body">
            <h5 class="card-title text-success"><?php echo ucfirst($data['community_name']); ?></h5>
            <p class="card-text"><?php echo $data['community_details']; ?></p>
            <p class="card-text">
              <?php if ($data['community_status'] == 0) {
                echo "<small class='text-muted'>Open Community</small>";
              } else {
                echo "<small class='text-muted'>Closed Community</small>";
              } ?>
            </p>
            <?php
            $selList = "select * from tbl_joinlist where user_id='" . $_SESSION['uid'] . "' and community_id='" . $data['community_id'] . "'";
            $rowList = $con->query($selList);
            if ($dataList = $rowList->fetch_assoc()) {
              if ($dataList['list_status'] == 0) {
                echo "<h6 class='text-success'>Request Send</h6>";
              } else if ($dataList['list_status'] == 1) {
                ?>
                <a href="CommunityHomepage.php?c_id=<?php echo $data['community_id']; ?>" class="btn btn-primary">View</a>
              <?php
              } else {
                echo "<h6 class='text-danger'Banned</h6>";
              }
            } else if ($data['user_id'] == $_SESSION['uid']) {
              ?>
              <a href="CommunityHomepage.php?c_id=<?php echo $data['community_id']; ?>" class="btn btn-primary">View</a>
            <?php
            } else {
              if ($data['community_status'] == 1) {
                ?>
                <a href="ActiveCommunity.php?cid=<?php echo $data['community_id']; ?>" class="btn btn-primary">Request to Join</a>
              <?php
              } else {
                ?>
                <a href="CommunityHomepage.php?jid=<?php echo $data['community_id']; ?>" class="btn btn-dark">Join</a>
              <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    <?php
      if ($i == 4) {
        echo "</div><div class='row'>";
        $i = 0;
      }
    }
    ?>
  </div>
</div>

</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
   <script>
     function getSearch()
	 {
		 var search=document.getElementById("search").value;
		 $.ajax({
			 url:"../Assets/AjaxPages/AjaxSearch.php?key="+search,
			 success: function(html){
						 $("#csearch").html(html)
			 }
		 });
	 }
   </script>
</html>
<?php
ob_flush();
include('Foot.php');
?>