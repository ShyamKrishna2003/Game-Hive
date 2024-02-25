<!-- 
//  include("../Assets/Connection/Connection.php");
//  ob_start();
//  include('head.php');
//  session_start();

// $complaintId = $_GET['complaint_id'];

// $selComp="SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id=u.user_id WHERE complaitnt_id='".$complaintId."'";
// $resComp=$con->query($selComp);
// $dataComp=$resComp->fetch_assoc();

// if(isset($_POST['btn_submit']))
// {
//    $replay=$_POST['reply'];
//    $updateCom="update tbl_complaint set complaint_replay='".$replay."' complaint_status=1";
//    If($con->query($updateCom))
//    {
    
       <script>
           alert("Replayed");
           window.location="AdminShowComplaints.php";
       </script>
       
   }
} -->

<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');

// Check if 'complaint_id' is set in the $_GET array
$complaintId = isset($_GET['complaint_id']) ? $_GET['complaint_id'] : null;

if ($complaintId) {
    $selComp = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id=u.user_id WHERE complaitnt_id='" . $complaintId . "'";
    $resComp = $con->query($selComp);
    $dataComp = $resComp->fetch_assoc();

    if (isset($_POST['btn_submit'])) {
        $replay = $_POST['reply'];
        $updateCom = "UPDATE tbl_complaint SET complaint_replay='" . $replay . "', complaint_status=1 WHERE complaitnt_id='" . $complaintId . "'";

        if ($con->query($updateCom)) {
            ?>
            <script>
                alert("Replayed");
                window.location = "AdminShowComplaints.php";
            </script>
            <?php
        }
    }
} else {
    // Handle the case when 'complaint_id' is not set
    echo "Complaint ID is not set.";
}
?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Replay Complaints</title>
</head>

<body>
<div class="container mt-5">
    <form>
        <table class="table table-bordered" align="center" style="border-color: white;">
            <tr>
                <th scope="row">User Name</th>
                <td><?php echo $dataComp['user_name']?></td>
            </tr>
            <tr>
                <th scope="row">Complaint Title</th>
                <td><?php echo $dataComp['complaint_title']?></td>
            </tr>
            <tr>
                <th scope="row">Complaint Content</th>
                <td><?php echo $dataComp['complaint_details']?></td>
            </tr>
            <tr>
                <th scope="row">Date</th>
                <td><?php echo $dataComp['complaint_date']?></td>
            </tr>
            <tr>
                <th scope="row">Reply</th>
                <td><textarea name="reply" class="form-control" placeholder="Enter Reply" required="required"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="btn btn-primary" name="btn_submit" value="Send" />
                    <input type="reset" class="btn btn-secondary" name="btn_cancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>

<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");
ob_start();

$selComplaints = "SELECT * FROM tbl_complaint";
$resComplaints = $con->query($selComplaints);

// Add any additional logic or queries specific to your page

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Complaints</title>

    <!-- Include your styles and scripts here -->
</head>

<body>
    <div class="container mt-5">
        <!-- Add your page content structure here -->
        <h2>View Complaints</h2>

        <table class="table table-bordered" align="center" style="border-color: white;">
            <!-- Add your table headers here -->
            <tr>
                <th scope="col">Complaint Title</th>
                <th scope="col">Complaint Content</th>
                <!-- Add more columns as needed -->
            </tr>

            <!-- Loop through the complaints and display them in the table -->
            <?php
            while ($complaint = $resComplaints->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $complaint['complaint_title']; ?></td>
                    <td><?php echo $complaint['complaint_details']; ?></td>
                    <!-- Add more cells as needed -->
                </tr>
                <?php
            }
            ?>
        </table>

    </div>
</body>
</html>

<?php
ob_flush();
include("Foot.php");
?>