<?php
 include("../Assets/Connection/Connection.php");
 ob_start();
 include('head.php');
//  session_start();

 $selComp="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id";
 $resComp=$con->query($selComp);
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Complaints</title>
</head>

<body>
<header>
  <h2 align="center">Complaints</h2><br />
</header>
<div class="container mt-5">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">SL.NO</th>
                <th scope="col">User Name</th>
                <th scope="col">Title</th>
                <th scope="col">Details</th>
                <th scope="col">Date</th>
                <th colspan="2">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($dataComp = $resComp->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo ucfirst($dataComp['user_name'])?></td>
                    <td><?php echo $dataComp['complaint_title'];?></td>
                    <td><?php echo $dataComp['complaint_details'];?></td>
                    <td><?php echo $dataComp['complaint_date'];?></td>
                    <td>
                        <?php
                        if($dataComp['complaint_status']==0) {
                            ?><a href="ReplayComplaint.php?complaint_id=<?php echo $dataComp['complaitnt_id']?>" class="btn btn-info">Replay</a><?php
                        } else {
                            echo "<p>Replayed</p>";
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
<?php
include('foot.php');
ob_flush();
?>
</html>