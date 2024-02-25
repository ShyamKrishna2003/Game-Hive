<?php
 include("../Assets/Connection/Connection.php");
 session_start();
 include("Community-Head.php");
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

 $selPost="select * from tbl_post p inner join tbl_user u on p.user_id=u.user_id where community_id='".$_SESSION['cid']."'";
 $resPost=$con->query($selPost);
 
 $selCom="select * from tbl_community c inner join tbl_user u on c.user_id=u.user_id where community_id='".$_SESSION['cid']."'";
 $resCom=$con->query($selCom);
 $row=$resCom->fetch_assoc();

 $selCountM="SELECT COUNT(*) AS m_count FROM tbl_joinlist l WHERE l.list_status=1 AND l.community_id='".$_SESSION['cid']."'";
 $resCountM=$con->query($selCountM);
 $dataCountM=$resCountM->fetch_assoc();
 
 if(isset($_GET['delAdmin']))
 {
	$delPost="delete from tbl_post where post_id='".$_GET['delAdmin']."'";
	if($con->query($delPost))
	{
	    ?>
        <script>
		  alert("Post Deleted");
		  window.location="ViewPost.php";
		</script>
        <?php
	}
 }
 

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Post</title>

<style>
.community {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    margin: 20px;
    border-radius: 5px;
}

.community-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    background-color: #e0f5f3d4;
    padding: 25px
}

.community-info h1 {
    font-size: 50px;
    color: black;
}

.community-info h5 {
    font-size: 20px;
    color: #888;
}

.community-info h6{
    color: #88d8c9;
}

.add-post-button a {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.add-post-button a:hover {
    background-color: #0056b3;
}

.post {
    background-color: #e0f5f3d4;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.user-info img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-name {
    font-size: 18px;
    font-weight: bold;
}

.post-content {
    font-size: 16px;
    margin-top: 10px;
}

.post-image img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
}

.post-actions {
    margin-top: 10px;
}

.like-button,
.comment-button {
    text-decoration: none;
    color: #007bff;
    margin-right: 20px;
    font-size: 16px;
}

.like-button:hover,
.comment-button:hover {
    text-decoration: underline;
}

.delete-button {
    color: #ff0000;
    font-size: 16px;
    margin-left: auto;
}

.post-date {
    color: #888;
    font-size: 14px;
}

.community-photo {
    width: 100px; /* Adjust the width to your desired size */
    height: 100px; /* Adjust the height to your desired size */
    border-radius: 50%;
}

/* Style for the container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Style for the 3-dot icon */
.dropdown-toggle {
  cursor: pointer;
  font-size: 20px;
}

/* Style for the dropdown menu */
.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  display: none;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  z-index: 1;
}

/* Style for dropdown menu items */
.dropdown-item {
  padding: 8px 16px;
  text-decoration: none;
  display: block;
  color: #333;
  font-size: 16px;
}

/* Hover effect for dropdown items */
.dropdown-item:hover {
  background-color: #f8f8f8;
}


</style>
</head>

<body>
<div class="community">
<div class="community-header">
    <img src="../Assets/File/Community/<?php echo $row['community_photo']; ?>" class="community-photo" alt="Community Photo">
    <div class="community-info">
        <h1><?php echo $row['community_name']; ?></h1>
        <h5><?php echo $row['community_details']; ?></h5>
        <h6>Created By <?php echo $row['user_name']?></h6>
        <h6><a href="ShowMembers.php"><?php echo $dataCountM['m_count']+1?> Active Members</a></h6>
    </div>
    <div class="add-post-button">
        <a href="AddPost.php">Add Post</a>
    </div>
</div>


    <section class="post-section">
        <?php
        while ($data = $resPost->fetch_assoc()) {
            ?>
            <div class="post">
                <div class="user-info">
                    <img src="../Assets/File/User/<?php echo $data['user_photo']; ?>" alt="User Photo">
                    <span class="user-name"><?php echo ucfirst($data['user_name']); ?></span>
                    <?php
                    if($row['user_id'] == $_SESSION['uid'])
                    {
                        ?>
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- 3-dot icon (you can use an appropriate Unicode character) -->
                                &#x22EE;
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="ViewPost.php?delAdmin=<?php echo $data['post_id']; ?>" class="fas fa-trash"> Delete</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="post-content">
                    <?php echo $data['post_content']; ?>
                </div>
                <div class="post-image">
    <?php
    $file_extension = pathinfo($data['post_file'], PATHINFO_EXTENSION);
    
    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        // Display as an image
        echo '<img src="../Assets/File/User/Post/' . $data['post_file'] . '" width="700" height="400" alt="Post Image">';
    } elseif (in_array($file_extension, ['mp4', 'mkv', 'avi'])) {
        // Display as a video
        echo '<video width="700" height="400" controls>
                    <source src="../Assets/File/User/Post/' . $data['post_file'] . '" type="video/' . $file_extension . '">
                    Your browser does not support the video tag.
                </video>';
    } else {
        // Unsupported format, or handle other formats here
        echo 'Unsupported file format';
    }
    ?>
</div>

                <div class="post-actions" id="intract-section-<?php echo $data['post_id'] ?>">
                    
                    <?php
                        $selLikeCount = "select count(*) as count from tbl_like where post_id='" . $data['post_id'] . "'";
                        $resLikeCount = $con->query($selLikeCount);
                        $dataCount = $resLikeCount->fetch_assoc();

                        $selLike = "select * from tbl_like where post_id='" . $data['post_id'] . "' and user_id=" . $_SESSION['uid'];
                        $resLike = $con->query($selLike);
                        if ($resLike->fetch_assoc()) {
                            ?>
                            <i class="fa fa-heart" id="like-color" style="color:red" onclick="updateLike(<?php echo $data['post_id'] ?>,'black')"></i>
                            <?php
                        } else {
                            ?>
                            <i class="fa fa-heart" id="like-color" style="color:black" onclick="updateLike(<?php echo $data['post_id'] ?>,'red')"></i>
                            <?php
                        }
                        echo $dataCount['count'];
                        ?>
                
                    <a href="Comment.php?com=<?php echo $data['post_id']; ?>" class="comment-button">Comment</a>
                    <span class="post-date">
                        <?php
                        if ($_SESSION['uid'] == $row['user_id']) {
                            ?>
                            
                            <?php
                        }
                        echo $data['post_date'];
                        ?>
                    </span>
                </div>
            </div>
            <?php
        }
        ?>
    </section>
</div>

</body>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
   <script>
    function updateLike(pid, color) {
    $.ajax({
        url: "../Assets/AjaxPages/AjaxLike.php?like=" + pid,
        success: function (html) {
            document.getElementById("like-color").style = "color:" + color;
            loadIntractSection(pid); // Call a function to reload the content
        }
    });
}

function loadIntractSection(pid) {
    $.ajax({
        url: "../Assets/AjaxPages/AjaxReload.php?like=" + pid, // Create a separate PHP file to load the content
        success: function (html) {
            document.getElementById("intract-section-"+pid).innerHTML = html
            // $("#intract-section").html(html); // Update the content of the div
        }
    });
}


  document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownToggle.addEventListener("click", function () {
      dropdownMenu.classList.toggle("show");
    });

    // Close the dropdown menu if you click outside of it
    window.addEventListener("click", function (event) {
      if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove("show");
      }
    });
  });
</script>

<?php
ob_flush();
include("Foot.php");
?>