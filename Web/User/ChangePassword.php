<?php 
  include("../Assets/Connection/Connection.php");
  session_start();
  include("Head.php");
  ob_start();
  
  $selPass="select * from tbl_user where user_id='".$_SESSION['uid']."'";
  $res=$con->query($selPass);
  $row=$res->fetch_assoc();
  
  if(isset($_POST['pass_submit']))
  {
    $old_p=$_POST['old_password'];
    $new_p=$_POST['new_password'];
    $confirm_p=$_POST['confirm_password'];

    if($row['user_password'] == $old_p)
    {
        if($new_p == $confirm_p)
        {
            $update="update tbl_user set user_password='".$new_p."' where user_id=".$_SESSION['uid'];
            $con->query($update);
            header("Location:../User/ChangePassword.php");
        }
    }
  }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Change Password</title>
    <!-- Include your CSS styles or link to an external stylesheet here -->
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        } */

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            
            color: #fff;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <th>Old Password</th>
                <td><input type="password" name="old_password" /></td>
            </tr>
            <tr>
                <th>New Password</th>
                <td><input type="password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off"/></td>
            </tr>
            <tr>
                <th>Confirm Password</th>
                <td><input type="password" name="confirm_password" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="pass_submit" value="Confirm" class="btn btn-primary"/>
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