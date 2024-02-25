<?php
 include("../Assets/Connection/Connection.php");
 ob_start();
 include('head.php');
 
 ?>

<html>
 <head>
  <title>Category form</title>
 </head>
 
 <body>
 <div class="container mt-5">
        <form method="post">
            <table class="table table-bordered" style="border-color: white;">
                <tr>
                    <td>Category</td>
                    <td><input type="text" name="category" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="cat" value="Save" class="btn btn-primary" />
                        <input type="reset" name="reset1" value="Cancel" class="btn btn-secondary" />
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST["cat"])) {
            $cats = $_POST["category"];
            $insqry = "INSERT INTO tbl_category (category_name) VALUES ('$cats')";
            if ($con->query($insqry)) {
                echo '<script>alert("Successfully assigned"); window.location="category.php";</script>';
            }
        }
        ?>
  </div>
 </body>
 <?php
include('foot.php');
ob_flush();
 ?>
</html>