<?php
 include("../Assets/Connection/Connection.php");
 session_start();
 include("Head.php");
 ob_start();

 
 //$selCC="select * from tbl_complaintcommunity cc inner join tbl_user u on cc.user_id=u.user_id where community_id='".$_SESSION['cid']."'";
 $selCC="SELECT
    cc.cc_id,
    cc.cc_title,
    cc.cc_details,
    cc.cc_date,
    cc.cc_status,
	cc.community_id,
    u1.user_name AS user_name_complainant,
    u2.user_name AS user_name_complaint_target
FROM
    tbl_complaintcommunity cc
INNER JOIN
    tbl_user u1 ON cc.user_id = u1.user_id -- Joins for the user making the complaint
INNER JOIN
    tbl_user u2 ON cc.cc_user = u2.user_id where cc.community_id='".$_SESSION['cid']."'";
    // echo $selCC;
 $resCC=$con->query($selCC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Complaints In Community</title>
</head>

<body>
<?php
if ($resCC->num_rows <= 0) {
    echo "<h2 class='text-center'>No Complaints</h2>";
} else {
    ?>
    <div class="container mt-4">
        <h2 class="text-center text-white">Complaints</h2>
        <table class="table table-bordered text-center text-white">
            <thead>
                <tr>
                    <th scope="col">SL.NO</th>
                    <th scope="col">Complaint From</th>
                    <th scope="col">Title</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date</th>
                    <th scope="col">Complaint Against</th>
                    <th socpr="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($dataCC = $resCC->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $dataCC['user_name_complainant'] ?></td>
                        <td><?php echo $dataCC['cc_title']; ?></td>
                        <td><?php echo $dataCC['cc_details']; ?></td>
                        <td><?php echo $dataCC['cc_date']; ?></td>
                        <td><?php echo $dataCC['user_name_complaint_target']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>

</body>
</html>
<?php
include("Foot.php")
?>