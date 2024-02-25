<?php
if($_SESSION['aid']==""){
    session_destroy();
    header('location:../');
}
?>