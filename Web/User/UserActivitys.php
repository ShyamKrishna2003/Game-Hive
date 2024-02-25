<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Community-Head.php");
ob_start();

$selPost = "SELECT * FROM tbl_post WHERE community_id='" . $_SESSION['cid'] . "' AND user_id='" . $_SESSION['uid'] . "'";
$resPost = $con->query($selPost);

if (isset($_GET['delpost'])) {
    $del = "DELETE FROM tbl_post WHERE post_id='" . $_GET['delpost'] . "'";
    if ($con->query($del)) {
        ?>
        <script>
            alert("Post Deleted");
            window.location = "UserActivitys.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Activities</title>

    <style>
.community {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    margin: 20px;
    border-radius: 5px;
}

.community-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    background-color: #e0f5f3d4;
    padding: 25px
}

.community-info h1 {
    font-size: 50px;
    color: black;
}

.community-info h5 {
    font-size: 20px;
    color: #888;
}

.community-info h6{
    color: #88d8c9;
}

.add-post-button a {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.add-post-button a:hover {
    background-color: #0056b3;
}

.post {
    background-color: #e0f5f3d4;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.user-info img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-name {
    font-size: 18px;
    font-weight: bold;
}

.post-content {
    font-size: 16px;
    margin-top: 10px;
}

.post-image img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
}

.post-actions {
    margin-top: 10px;
}

.like-button,
.comment-button {
    text-decoration: none;
    color: #007bff;
    margin-right: 20px;
    font-size: 16px;
}

.like-button:hover,
.comment-button:hover {
    text-decoration: underline;
}

.delete-button {
    color: #ff0000;
    font-size: 16px;
    margin-left: auto;
}

.post-date {
    color: #888;
    font-size: 14px;
}

.community-photo {
    width: 100px; /* Adjust the width to your desired size */
    height: 100px; /* Adjust the height to your desired size */
    border-radius: 50%;
}

/* Style for the container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Style for the 3-dot icon */
.dropdown-toggle {
  cursor: pointer;
  font-size: 20px;
}

/* Style for the dropdown menu */
.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  display: none;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  z-index: 1;
}

/* Style for dropdown menu items */
.dropdown-item {
  padding: 8px 16px;
  text-decoration: none;
  display: block;
  color: #333;
  font-size: 16px;
}

/* Hover effect for dropdown items */
.dropdown-item:hover {
  background-color: #f8f8f8;
}


</style>

    <!-- Include your styles and scripts here -->
</head>

<body>
    <div class="container mt-4">
        <?php
        if ($resPost->num_rows <= 0) {
            echo "<h2 class='text-center'>No Activities</h2>";
        } else {
        ?>
        <table class="table table-bordered table-hover">
            <caption align="top"><h1 class="text-center">My Activities</h1></caption>
            <?php
            while ($dataPost = $resPost->fetch_assoc()) {
                ?>
                <tr>
                    <td colspan="2" class="text-center text-white"><?php echo $dataPost['post_content']; ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <!-- <img src="../Assets/File/User/Post/<?php echo $dataPost['post_file']; ?>" class="img-fluid" alt="Activity Image"> -->
                        <?php
    $file_extension = pathinfo($dataPost['post_file'], PATHINFO_EXTENSION);
    
    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        // Display as an image
        echo '<img src="../Assets/File/User/Post/' . $dataPost['post_file'] . '" width="700" height="400" alt="Post Image">';
    } elseif (in_array($file_extension, ['mp4', 'mkv', 'avi'])) {
        // Display as a video
        echo '<video width="700" height="400" controls>
                    <source src="../Assets/File/User/Post/' . $dataPost['post_file'] . '" type="video/' . $file_extension . '">
                    Your browser does not support the video tag.
                </video>';
    } else {
        // Unsupported format, or handle other formats here
        echo 'Unsupported file format';
    }
    ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-left">
                        <a href="UserActivitys.php?delpost=<?php echo $dataPost['post_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                    <td class="text-right text-white"><?php echo $dataPost['post_date']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>