<?php
 include("../Assets/Connection/Connection.php");
 session_start();
  include("Head.php");
 ob_start();

 
 $selComp="select * from tbl_complaint where user_id='".$_SESSION['uid']."'";
 $resComp=$con->query($selComp);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Complaints</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Change background color to dark -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="ComplaintToAdmin.php">Complaint</a> <!-- Set link text color to white -->
        </li>
      </ul>
    </div>
</nav>

<?php
if ($resComp->num_rows <= 0) {
    echo "<h2 class='text-center'>No Complaints Registered</h2>";
} else {
    ?>
    <div class="container mt-4">
        <table class="table table-bordered text-center text-white">
            <caption align="top"><h2 class="text-center">Show Complaints</h2></caption>
            <thead>
                <tr>
                    <th scope="col">SL.NO</th>
                    <th scope="col">Title</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($dataComp = $resComp->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $dataComp['complaint_title']; ?></td>
                        <td><?php echo $dataComp['complaint_details']; ?></td>
                        <td><?php echo $dataComp['complaint_date']; ?></td>
                        <td>
                          <?php
                          if($dataComp['complaint_status'] == 0)
                          {
                            echo "Complaint Not Viewed Yet";
                          }else {
                            ?><a href="ShowReplayFromAdmin.php?cid=<?php echo $dataComp['complaitnt_id']; ?>">Replayed</a><?php
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
<?php
}
?>

</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>