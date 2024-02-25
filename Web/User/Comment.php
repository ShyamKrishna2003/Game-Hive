<?php
 ob_start();
 include("../Assets/Connection/Connection.php");
 session_start();
 include("Community-Head.php");

 
 
 $selComment="select * from tbl_comment cm inner join tbl_user u on cm.user_id=u.user_id where post_id='".$_GET['com']."'";
 $res=$con->query($selComment);

 $selP="select * from tbl_post p inner join tbl_user u on p.user_id=u.user_id where post_id='".$_GET['com']."'";
 $resP=$con->query($selP);
 $dataP=$resP->fetch_assoc();
 
 if(isset($_POST['comment']))
 {
	 $comment=$_POST['content'];
	 
	 $ins="INSERT INTO tbl_comment(comment_content,comment_date,post_id,community_id,user_id) VALUES ('".$comment."',curdate(),'".$_GET['com']."','".$_SESSION['cid']."','".$_SESSION['uid']."')";
	 if($con->query($ins))
	 {
		header("location:ViewPost.php");
	 } 
 }

if(isset($_GET['delCom']))
{
	$delCom="delete from tbl_comment where comment_id='".$_GET['delCom']."'";
	if($con->query($delCom))
	{
		header("Location:ViewPost.php");
	}
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comment</title>
</head>

<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                <table class="table table-bordered">
                    <tr>
                        <td><textarea class="form-control" name="content" placeholder="Comment" autocomplete="off" required></textarea></td>
                        <td><input type="submit" class="btn btn-primary" name="comment" value="Comment" /></td>
                    </tr>
                </table>
                </form>
                <br />
                <?php
                if ($res->num_rows <= 0) {
                    echo "<h2 class='text-center'>No Comments</h2>";
                } else {
                    ?>
                    <table class="table table-bordered text-white">
                        <?php
                        while ($data = $res->fetch_assoc()) {
                            ?>
                            <tr>
                                <td width="40" height="50"><img src="../Assets/File/User/<?php echo $data['user_photo']; ?>" alt="User Photo" class="img-fluid" /></td>
                                <td colspan="3"><?php echo ucfirst($data['user_name']) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><?php echo $data['comment_content']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" height="10"><?php echo $data['comment_date']; ?>
                                    <?php
                                    if ($data['user_id'] == $_SESSION['uid']) {
                                        ?>
                                        <div align="left"><a href="Comment.php?delCom=<?php echo $data['comment_id']; ?>" class="btn btn-danger">Delete</a></div>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                <?php
                }
                ?>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered text-white">
                    <tr>
                        <td width="40" height="50"><img src="../Assets/File/User/<?php echo $dataP['user_photo']; ?>" alt="User Photo" class="img-fluid" /></td>
                        <td colspan="2"><?php echo $dataP['user_name'] ?></td>
                    </tr>
                    <tr>
                        <!-- <td colspan="3"><img src="../Assets/File/User/Post/<?php echo $dataP['post_file'] ?>" alt="Post Image" class="img-fluid" /></td> -->
                        <?php
    $file_extension = pathinfo($dataP['post_file'], PATHINFO_EXTENSION);
    
    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        // Display as an image
        echo '<img src="../Assets/File/User/Post/' . $dataP['post_file'] . '" width="700" height="400" alt="Post Image">';
    } elseif (in_array($file_extension, ['mp4', 'mkv', 'avi'])) {
        // Display as a video
        echo '<video width="700" height="400" controls>
                    <source src="../Assets/File/User/Post/' . $dataP['post_file'] . '" type="video/' . $file_extension . '">
                    Your browser does not support the video tag.
                </video>';
    } else {
        // Unsupported format, or handle other formats here
        echo 'Unsupported file format';
    }
    ?>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $dataP['post_date'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
 include("Foot.php");
 ob_flush();
?>