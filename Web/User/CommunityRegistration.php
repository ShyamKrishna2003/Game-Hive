<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  include('Head.php');
  ob_start();
  
  
  $selCat="select * from tbl_category";
  $resCat=$con->query($selCat);

  if(isset($_POST['submit']))
  {
	  $cname=$_POST['name'];
	  $cdetails=$_POST['details'];
	  $game=$_POST['game'];
	  $category=$_POST['sel-cat'];
	  $status=$_POST['status'];
	  
	  $photo=$_FILES["photo"]["name"];
	  $temp=$_FILES["photo"]["tmp_name"];
	  move_uploaded_file($temp,'../Assets/File/Community/'.$photo);
	  
	  $insc="insert into tbl_community (user_id,community_name,community_photo,community_details,community_game,category_id,community_doj,community_status) values('".$_SESSION['uid']."','".$cname."','".$photo."','".$cdetails."','".$game."','".$category."',curdate(),'".$status."')";
	  
	 if($con->query($insc))
	 {
		 ?>
         <script>
		 alert("Community Created");
		 window.location="MyCommunitys.php";
		 </script>
         <?php
	 }  
  }
?>

<html>
  <head>
    <title>Community Registration</title>
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
  <form method="post" enctype="multipart/form-data">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center text-dark">Create Community</h2>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Community Name</label>
              <input type="text" class="form-control" name="name" required autocomplete="off">
            </div>
            <div class="form-group">
              <label for="game">Game Name</label>
              <input type="text" class="form-control" name="game" required>
            </div>
            <div class="form-group">
              <label for="sel-cat">Game Category</label>
              <select class="form-control" name="sel-cat" required>
                <option value="">---Select---</option>
                <?php
                while ($catData = $resCat->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $catData['category_id']; ?>"><?php echo $catData['category_name']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="photo">Photo</label>
              <input type="file" class="form-control-file" name="photo" required>
            </div>
            <div class="form-group">
              <label for="details">Details</label>
              <textarea class="form-control" name="details" placeholder="Enter a Description About The Community" required></textarea>
            </div>
            <div class="form-group">
              <label for="status">Community Status</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="0" id="openCommunity" required>
                <label class="form-check-label" for="openCommunity">Open Community</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="1" id="closedCommunity">
                <label class="form-check-label" for="closedCommunity">Closed Community</label>
              </div>
            </div>
            <div class="text-center">
              <input type="submit" class="btn btn-primary" name="submit" value="Create">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

  </body>
</html>
<?php
include('Foot.php');
ob_flush();
?>