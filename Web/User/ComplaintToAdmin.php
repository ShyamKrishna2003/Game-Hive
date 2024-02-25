<?php
 include("../Assets/Connection/Connection.php");
 session_start();
 include("Head.php");
 ob_start();
 
 if(isset($_POST['submit']))
 {
	 $title=$_POST['title'];
	 $details=$_POST['content'];
	 
	 $insComp="insert into tbl_complaint(complaint_title,complaint_details,complaint_date,user_id) values ('".$title."','".$details."',curdate(),'".$_SESSION['uid']."')";
	 if($con->query($insComp))
	 {
		 ?>
         <script>
		   alert("Complaint Registered")
		   Window.location="ComplaintToAdmin.php";
		 </script>
         <?php
	 }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ComplaintToAdmin</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Change background color to dark -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="UserShowComplaints.php">Show Complaints</a> <!-- Set link text color to white -->
        </li>
      </ul>
    </div>
</nav>
<br>
<form method="post">
<table class="table table-bordered table-hover mx-auto">
  <capyion><h2 align="center">Complaint</h2></capyion>
  <tr>
    <th scope="row" class="text-white">Title</th>
    <td><input type="text" name="title" class="form-control" placeholder="Title" autocomplete="off" required/></td>
  </tr>
  <tr>
    <th scope="row" class="text-white">Content</th>
    <td><textarea name="content" class="form-control" placeholder="Enter complaint" autocomplete="off" required></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="Send" class="btn btn-danger" />
      <input type="reset" name="cancel" value="Cancel" class="btn btn-primary" />
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