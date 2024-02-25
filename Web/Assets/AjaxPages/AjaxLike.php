
<?php 
session_start();
 include("../Connection/Connection.php");

    $selLike="select * from tbl_like where user_id='".$_SESSION['uid']."' and post_id='".$_GET['like']."'";
    $resLike=$con->query($selLike);
	 if($resLike->num_rows>0)
	 {
		 $delLike="delete from tbl_like where post_id='".$_GET['like']."' and community_id='".$_SESSION['cid']."' and user_id='".$_SESSION['uid']."'";
		 $con->query($delLike);
	 }
	 else
	 {
		 $insLike="insert into tbl_like(post_id,community_id,user_id) values('".$_GET['like']."','".$_SESSION['cid']."','".$_SESSION['uid']."')";
		 $con->query($insLike);
	 }

?>