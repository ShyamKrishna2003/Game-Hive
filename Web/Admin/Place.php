<?php
  include("../Assets/Connection/Connection.php");
  ob_start();
  include('head.php');
  $pname="";
  $pid=0;
?>

<html>
<head>
  <title>Place form</title>
</head>

<body>
	<header><h2>Place Management</h2></header>

    <div class="container mt-5">
        <?php
        if (isset($_POST["submit"])) {
            $district = $_POST["sel_district"];
            $place = $_POST["place"];
            if ($pid == 0) {
                $insquery = "INSERT INTO tbl_place (district_id, place_name) VALUES ('$district', '$place')";
                if ($con->query($insquery)) {
                    header("Location: Place.php");
                }
            } else {
                $upquery = "UPDATE tbl_place SET place_name = '$place' WHERE place_id = '$pid'";
                if ($con->query($upquery)) {
                    header("Location: Place.php");
                }
            }
        }

        if (isset($_GET["del"])) {
            $delq = "DELETE FROM tbl_place WHERE place_id = '" . $_GET["del"] . "'";
            if ($con->query($delq)) {
                echo '<script>alert("Data Deleted"); window.location="Place.php";</script>';
            }
        }

        if (isset($_GET["update"])) {
            $select = "SELECT * FROM tbl_place WHERE place_id = '" . $_GET["update"] . "'";
            $udatar = $con->query($select);
            $udata = $udatar->fetch_assoc();

            $pid = $udata["place_id"];
            $pname = $udata["place_name"];
        }
        ?>
        <form method="post">
            <input type="hidden" name="txtid" value="<?php echo $pid ?>" />
            <table class="table table-bordered" style="border-color: white;">
                <tr>
                    <td>District</td>
                    <td>
                        <select name="sel_district" class="form-select">
                            <option value="">--Select--</option>
                            <?php
                            $sel = "SELECT * FROM tbl_district";
                            $result = $con->query($sel);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><input type="text" name="place" class="form-control" value="<?php echo $pname ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                    </td>
                </tr>
            </table>
            
            <table class="table table-bordered" style="border-color: white;">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>District</th>
                        <th>Place</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sel_place = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
                    $rowd = $con->query($sel_place);
                    $i = 0;
                    while ($data = $rowd->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data["district_name"] ?></td>
                            <td><?php echo $data["place_name"] ?></td>
                            <td><a href="Place.php?del=<?php echo $data["place_id"] ?>" class="btn btn-danger">Delete</a></td>
                            <td><a href="Place.php?update=<?php echo $data["place_id"] ?>" class="btn btn-warning">Update</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
<?php
include('foot.php');
ob_flush();
?>
</html>