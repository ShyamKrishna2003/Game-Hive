<?php
  include("../Assets/Connection/Connection.php");
  ob_start();
  include('head.php');
?>

<html>
<head>
  <title>Registration</title>
</head>

<body>
 <form method="post">
   <table border="4">
     <tr>
       <td>Name</td>
       <td><input type="text" name="name" />
     </tr>
     <tr>
       <td>Contact</td>
       <td><input type="number" name="contact" />
     </tr>
     <tr>
        <td>Email</td>
        <td><input type="text" name="email" />
     </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" />
      </tr>
      <tr>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="cancel" value="Cancel"></td>
      </tr>
   </table>
   <table width="200" border="1">
     <tr>
       <td>Sl.NO</td>
       <td>Name</td>
       <td>Contact</td>
       <td>Email</td>
       <td>Password</td>
       <td>Action</td>
     </tr>
     <?php 
	   $sel_admin="select * from tbl_admin";
	   $row=$con->query($sel_admin);
	   $i=0;
	   while($data=$row->fetch_assoc())
	   {
		   $i++;
		   ?>
     <tr>
       <td>&nbsp;<?php echo $i ?></td>
       <td>&nbsp;<?php echo $data["admin_name"]?></td>
       <td>&nbsp;<?php echo $data["admin_contact"]?></td>
       <td>&nbsp;<?php echo $data["admin_email"]?></td>
       <td>&nbsp;<?php echo $data["admin_password"]?></td>
       <td>&nbsp;<a href="AdminRegistration.php ?del=<?php echo $data["admin_id"]?>">Delete</a></td>
     </tr>
           <?php
	   }
	   ?>
   </table>
<?php 
     if(isset($_POST["submit"]))
	 {
		// echo "Button Clicked";
		$name=$_POST["name"];
		$contact=$_POST["contact"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		
		$insquery="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)value('".$name."','".$contact."','".$email."','".$password."')";
		if($con->query($insquery))
		{
			header("Location:AdminRegistration.php");
		}
	 }
	 
	 if(isset($_GET["del"]))
	 {
		 $delquery="delete from tbl_admin where admin_id='".$_GET["del"]."'";
		 if($con->query($delquery))
		 {
			 header("Location:AdminRegistration.php");
		 }
	 }
   ?>
   
 </form>
</body>
<?php
include('foot.php');
ob_flush();
?>
</html>