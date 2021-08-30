<?php
require_once('functions.inc.php');

if (isset($_POST['submit'])) {
    $imgId = $_POST['imgid'];
    $filePath = '../'.$_POST['filePath'];

    $con = connect_db();
    //Delete file from uploads folder.
    $delSuccess = unlink($filePath);
    if (true) {
        $result = delete_image($con, $imgId, $filePath);
        if ($result === true) {
            header('location:../profile.php?p=myphotos&success=delsuccess');
            exit();
        } else {
            header('location:../profile.php?p=myphotos&error=delfailed');
            exit();
        }
    } else {
        header('location:../profile.php?p=myphotos&error=delfilefailed');
        exit();
    }
}
