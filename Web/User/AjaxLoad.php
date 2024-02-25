<?php
include("../Assets/Connection/Connection.php");
session_start();

   $selQry = "select * from tbl_chat c inner join tbl_user u on c.user_id=u.user_id where  c.community_id='".$_GET["cid"]."' order by  chat_id";
   $result=$con->query($selQry);
   while ($row=$result->fetch_assoc()) {

    if($row["user_id"]==$_SESSION["uid"]){

        
?>

<div class="chat-message is-sent">
    <img src="../Assets/File/User/<?php echo $row["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $row["user_name"] ?></span>
        <div class="message-text"><?php echo $row["chat_content"] ?></div>
    </div>
    
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
   }
   else{
    ?>

<div class="chat-message is-received">
    <img src="../Assets/File/User/<?php echo $row["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $row["user_name"] ?></span>
        <div class="message-text"><?php echo $row["chat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
   }
   }
?>