<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  $sel="select * from tbl_community where user_id='".$_SESSION['uid']."'";
  $row=$con->query($sel);
  $data=$row->fetch_assoc()
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Community Profile</title>
</head>

<body>;
   <form method="post">
    
  <table width="200" border="1">
  <tr>
    <th scope="row">&nbsp;Photo</th>
    <td></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Name</th>
    <td><input type="text" name="com_name" value="<?php echo $data['community_name'];?>" /></td>
      </tr>
      <tr>
        <th scope="row">&nbsp; Details</th>
        <td><textarea name="detais">
        <?php echo $data['community_details'];?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Edit"></td>
      </tr>
  </table>
</body>
</html>