
<?php
 include("../Assets/Connection/Connection.php");
 ob_start();
//  session_start();
//  include('SessionValidator.php');
 include('head.php');
?>

<html>
<head>
<title>District</title>

</head>

<body>
<div class="container mt-5">
        <h1>District Management</h1>
        <form method="post">
            <?php
            if (isset($_POST["submit"])) {
                $dis = $_POST["district"];
                $insQury = "INSERT INTO tbl_district (district_name) VALUES ('$dis')";

                if ($con->query($insQury)) {
                    echo '<script>alert("Data Inserted"); window.location="District.php";</script>';
                }
            }
            if (isset($_GET["del"])) {
                $delquery = "DELETE FROM tbl_district WHERE district_id = '" . $_GET["del"] . "'";
                if ($con->query($delquery)) {
                    header("Location: District.php");
                }
            }
            ?>
            <table class="table table-bordered" style="border-color: white;">
                <tr>
                    <td>District</td>
                    <td><input type="text" name="district" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary" />
                        <input type="reset" name="reset" value="Cancel" class="btn btn-secondary" />
                    </td>
                </tr>
            </table>
        </form>

        <table class="table table-bordered" style="border-color: white;">
            <thead>
                <tr>
                    <th>Si.no</th>
                    <th>District</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $s = "SELECT * FROM tbl_district";
                $result = $con->query($s);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data["district_name"] ?></td>
                        <td><a href="District.php?del=<?php echo $data["district_id"] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>