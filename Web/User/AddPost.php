<?php
ob_start();
  include("../Assets/Connection/Connection.php");
  session_start();
  include("Community-Head.php");
  ob_start();
  
  if(isset($_POST['submit']))
  {
	  $content=$_POST['post_content'];
	  $photo=$_FILES["post"]["name"];
	  $temp=$_FILES["post"]["tmp_name"];
	  move_uploaded_file($temp,'../Assets/File/User/Post/'.$photo);

	  $ins="insert into tbl_post(post_content,post_file,user_id,post_date,community_id) values('".$content."','".$photo."','".$_SESSION['uid']."',curdate(),'".$_SESSION['cid']."')";
	  if($res=$con->query($ins)) {
		  header("Location:ViewPost.php");
	  }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add post</title>
</head>

<body>
    <header class="text-center bg-dark text-white py-3">
        <h2>Add Post</h2>
        <a href="ViewPost.php" class="text-white">View Posts</a>
    </header>

    <div class="container mt-4">
        <form method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th scope="row" class="text-white">Content</th>
                    <td><textarea class="form-control" name="post_content" required autocomplete="off"></textarea></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">Photo</th>
                    <td><input type="file" class="form-control-file text-white" name="post" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Post" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>