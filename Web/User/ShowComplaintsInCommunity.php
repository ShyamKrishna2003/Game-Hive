<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Community-Head.php");
ob_start();

$selC = "SELECT * FROM tbl_complaintcommunity WHERE user_id='" . $_SESSION['uid'] . "' and community_id='".$_SESSION['cid']."'";
// echo $selC;
$resC = $con->query($selC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Complaints</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid white;
            padding: 8px;
        }
    </style>
</head>

<body>
<header class="text-center bg-dark text-white py-3">
        <h2>Reported Complaints</h2>
        <a href="ComplaintToCommunity.php" class="text-white">Complaint</a>
    </header>
    <table class="text-white">
        <tr>
            <th scope="row">SL.NO</th>
            <td>Title</td>
            <td>Details</td>
            <td>Date</td>
            <td>Status</td>
        </tr>
        <?php
        // if ($resC->num_rows <= 0) {
        //     echo "<h3 align='center'>No Complaints Registered</h3>";
        // } else {
            $i = 0;
            while ($dataC = $resC->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td>&nbsp;<?php echo $dataC['cc_title'] ?></td>
                    <td>&nbsp;<?php echo $dataC['cc_details'] ?></td>
                    <td>&nbsp;<?php echo $dataC['cc_date'] ?></td>
                    <td>
                        <?php
                        if ($dataC['cc_status'] == 0) {
                            echo "<p>Complaint not seen by the admin</p>";
                        } else {
                            ?><a href="ShowReplayInCommunity.php?cid=<?php echo $dataC['cc_id'];?>">Replayed</a><?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
        }
    // }
    ?>
    </table>

</body>

</html>
<?php
include("Foot.php");
ob_flush();
?>