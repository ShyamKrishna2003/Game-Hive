<?php
include("../Assets/Connection/Connection.php");
session_start();

    $insQry="insert into tbl_chat (community_id,user_id,chat_date,chat_content) 
    values('".$_GET["id"]."','".$_SESSION["uid"]."',curdate(),'".$_GET["chat"]."')";
    if($con->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
        echo $insQry;
    }
    
?>