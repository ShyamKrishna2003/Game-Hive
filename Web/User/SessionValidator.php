<?php
if($_SESSION['uid']==""){
    session_destroy();
    header('location:../');
}
?>