<?php
  include("../Connection/Connection.php");
  session_start();
?>

<div class="container mt-4">
  <div class="row">
    <?php
  $key=$_GET['key'];
 $sel="select * from tbl_community where community_name LIKE '%$key%' ";
    $row = $con->query($sel);
    $i = 0;
    while ($data = $row->fetch_assoc()) {
      $i++;
    ?>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../Assets/File/Community/<?php echo $data['community_photo']; ?>" class="card-img-top" alt="Community Photo">
          <div class="card-body">
            <h5 class="card-title text-success"><?php echo ucfirst($data['community_name']); ?></h5>
            <p class="card-text"><?php echo $data['community_details']; ?></p>
            <p class="card-text">
              <?php if ($data['community_status'] == 0) {
                echo "<small class='text-muted'>Open Community</small>";
              } else {
                echo "<small class='text-muted'>Closed Community</small>";
              } ?>
            </p>
            <?php
            $selList = "select * from tbl_joinlist where user_id='" . $_SESSION['uid'] . "' and community_id='" . $data['community_id'] . "'";
            $rowList = $con->query($selList);
            if ($dataList = $rowList->fetch_assoc()) {
              if ($dataList['list_status'] == 0) {
                echo "<h6 class='text-success'>Request Send</h6>";
              } else if ($dataList['list_status'] == 1) {
                ?>
                <a href="CommunityHomepage.php?c_id=<?php echo $data['community_id']; ?>" class="btn btn-primary">View</a>
              <?php
              } else {
                echo "<h6 class='text-danger'Banned</h6>";
              }
            } else if ($data['user_id'] == $_SESSION['uid']) {
              ?>
              <a href="CommunityHomepage.php?c_id=<?php echo $data['community_id']; ?>" class="btn btn-primary">View</a>
            <?php
            } else {
              if ($data['community_status'] == 1) {
                ?>
                <a href="ActiveCommunity.php?cid=<?php echo $data['community_id']; ?>" class="btn btn-primary">Request to Join</a>
              <?php
              } else {
                ?>
                <a href="CommunityHomepage.php?jid=<?php echo $data['community_id']; ?>" class="btn btn-dark">Join</a>
              <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    <?php
      if ($i == 4) {
        echo "</div><div class='row'>";
        $i = 0;
      }
    }
    ?>
  </div>