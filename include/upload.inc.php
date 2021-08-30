<?php
include_once('functions.inc.php');

if (isset($_POST['submit'])) {
    if (empty($_FILES["fileToUpload"]["name"])) {
        header('location:../profile.php?p=uploadpics&error=emptyfile');
        exit();
    } 
    //session_start();
    //$login_email=$_SESSION[''];

    $target_dir = "../uploads/";

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (not_image_file($imageFileType) !== false) {
        header('location:../profile.php?p=uploadpics&error=notimage');
        exit();
    }

    if (is_large_image()) {
        header('location:../profile.php?p=uploadpics&error=largeimage');
        exit();
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $con = connect_db();
        $result = save_upload_file_info_to_db($con, $imageFileType);
        if ($result === true) {
            header('location:../profile.php?p=uploadpics&success=uploadsuccess');
            exit();
        } else {
            //when failed to update database we need to remove the remove uploaded file.
            header('location:../profile.php?p=uploadpics&error=uploadsavefailed');
            exit();
        }
    } else {
        header('location:../profile.php?p=uploadpics&error=uploadfailed');
        exit();
    }
    
}
