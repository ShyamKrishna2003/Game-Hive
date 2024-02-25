<?php 
 include("../Assets/Connection/Connection.php");
 ob_start();
 include('Head.php');
//  session_start();
 
 $sel="select * from tbl_community c inner join tbl_user u on c.user_id=u.user_id";
 $res=$con->query($sel);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Communitys Lists</title>
</head>

<body>
<header>
<h2 align="center">Communities List</h2>
</header>

<div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL.NO</th>
                        <th scope="col">Community Photo</th>
                        <th scope="col">Community Details</th>
                        <th scope="col">Creator</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($data = $res->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><img src="../Assets/File/Community/<?php echo $data['community_photo']; ?>" width="200px" alt="Community Photo" /></td>
                            <td>
                                <h5><?php echo ucfirst($data['community_name']); ?></h5><br />
                                <?php
                                if($data['community_status'] == 0)
                                {
                                      echo "<sub>Open Community</sub>";
                                }
                                else
                                {
                                      echo "<sup>Closed Community</sub>";
                                }?>
                                <hr />
                                <p><?php echo $data['community_details']; ?></p>
                                <hr />
                                <p><?php echo $data['community_doj']; ?></p>
                            </td>
                            <td><?php echo ucfirst($data['user_name']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>