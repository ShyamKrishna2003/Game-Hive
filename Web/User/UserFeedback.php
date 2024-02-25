<?php
 include("../Assets/Connection/Connection.php");
 session_start();
 include("Head.php");
 ob_start();
 
 
 if(isset($_POST['submit']))
 {
	 $content=$_POST['feedback'];
	 
	 $insFB="insert into tbl_feedback(feedback_content,feedback_date,user_id)values('".$content."',curdate(),'".$_SESSION['uid']."')";
	 if($con->query($insFB))
	 {
		 ?>
         <script>
		 alert("FeedBack Send");
		 window.location="UserFeedBack.php";
		 </script>
         <?php
	 }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>

<form method="post">
<table class="table table-bordered table-hover mx-auto">
  <caption align="top"><h3 align="center">FeedBack</h3></caption>
  <tr>
    <th scope="row" class="text-white">Feedback</th>
    <td><textarea name="feedback" class="form-control" placeholder="Enter your feedback" autocomplete="off" required></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="Send" class="btn btn-primary"/>
      <input type="reset" name="cancel" value="Cancel" class="btn btn-secondary"/>
     </td>
  </tr>
</table>
</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>