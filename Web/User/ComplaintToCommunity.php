<?php
 include("../Assets/Connection/Connection.php");
 session_start();
 include("Community-Head.php");
 ob_start();
 
 $selUser="select * from tbl_joinlist l inner join tbl_user u on l.user_id=u.user_id where l.community_id='".$_SESSION['cid']."' and list_status=1 GROUP BY l.user_id";
 $resUser=$con->query($selUser);
 
 if(isset($_POST['submit']))
 {
	 $title=$_POST['title'];
	 $user=$_POST['sel-user'];
	 $content=$_POST['content'];
	 
	 $insCC="insert into tbl_complaintcommunity(cc_title,cc_details,cc_date,cc_user,user_id,community_id) values('".$title."','".$content."',curdate(),'".$user."','".$_SESSION['uid']."','".$_SESSION['cid']."')";
	 if($con->query($insCC))
	 {
		 ?>
         <script>
		  alert("Complaint Registered");
		  Window.location="ComplaintToCommunity.php";
		 </script>
         <?php
	 }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint To Community</title>
</head>

<body>
    <header class="text-center bg-dark text-white py-3">
        <h2>Complaint To Community</h2>
        <a href="ShowComplaintsInCommunity.php" class="text-white">Reported Complaints</a>
    </header>
    <div class="container mt-4">
        <form method="post">
            <table class="table table-bordered">
                <tr>
                    <th scope="row" class="text-white">Title</th>
                    <td><input type="text" class="form-control" name="title" placeholder="Complaint Title" /></td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">Community Members</th>
                    <td>
                        <select class="form-control" name="sel-user">
                            <option value="">---Select---</option>
                            <?php
                            while ($userData = $resUser->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $userData['user_id']; ?>"><?php echo $userData['user_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-white">Content</th>
                    <td><textarea class="form-control" name="content" placeholder="Enter Complaint"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Send" />
                        <input type="reset" class="btn btn-secondary" name="cancel" value="Cancel" />
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