<?php 
 include("../Assets/Connection/Connection.php");
 session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>

<body>
<header>
  <h1 align="center">Welcome</h1>
  <h4 align="center"><?php echo $_SESSION['aname']; ?></h4><br />
</header>
<ol>
  <li><a href="ChangPassword.php">Change Password</a></li>
  <li><a href="CommunityList.php">List Communitys</a></li>
  <li><a href="UsersList.php">List Users</a></li>
  <li><a href="AdminShowComplaints.php">Show Complaints</a></li>
</ol>
</body>
</html>