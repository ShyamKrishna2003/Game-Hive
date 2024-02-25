<?php
session_start();
include("../Connection/Connection.php");

                        $selLikeCount = "select count(*) as count from tbl_like where post_id='" . $_GET['like'] . "'";
                        $resLikeCount = $con->query($selLikeCount);
                        $dataCount = $resLikeCount->fetch_assoc();

                        $selLike = "select * from tbl_like where post_id='" . $_GET['like'] . "' and user_id=" . $_SESSION['uid'];
                        $resLike = $con->query($selLike);
                        if ($resLike->fetch_assoc()) {
                            ?>
                            <i class="fa fa-heart" id="like-color" style="color:red" onclick="updateLike(<?php echo $_GET['like'] ?>,'black')"></i>
                            <?php
                        } else {
                            ?>
                            <i class="fa fa-heart" id="like-color" style="color:black" onclick="updateLike(<?php echo $_GET['like'] ?>,'red')"></i>
                            <?php
                        }
                        echo $dataCount['count'];
                        ?>
                
                    <a href="Comment.php?com=<?php echo $_GET['like']; ?>" class="comment-button">Comment</a>
                    <span class="post-date">
                        <?php

                        // echo $data['post_date'];
                        ?>
                    </span>