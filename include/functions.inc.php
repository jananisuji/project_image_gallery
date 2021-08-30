<?php

function connect_db()
{
    $dbserver = 'localhost';
    $dbuser = 'album';
    $dbpassword = '12345';
    $dbname = 'test1';

    $con = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
    return $con;
}

//-------------------------------- FILE UPLOAD -----------------------------------

//Validating file type.
function not_image_file($imageFileType)
{
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        return true;
    } else {
        return false;
    }
}

//Validating image size
function is_large_image()
{
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        return true;
    } else {
        return false;
    }
}

//for uploading file.
function upload_file($target_file)
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        return true;
    } else {
        return false;
    }
}

//for saving upload info to database.
function save_upload_file_info_to_db($con, $imageFileType)
{
    $fileName = $_FILES["fileToUpload"]["name"];
    $size_in_byts = $_FILES["fileToUpload"]["size"];
    $size = ($size_in_byts / 1024) . 'KB';

    $sql = "insert into uploaded_images(file_name,file_size,type) values('" . $fileName . "','" . $size . "','" . $imageFileType . "')";

    $result = mysqli_query($con, $sql);

    return $result;
}

//Collect file info from database.
function fetch_file_info_db($con)
{
    $sql = 'select * from uploaded_images';
    $result = mysqli_query($con, $sql);
    //var_dump($result);

    $all_rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($all_rows, $row);
    }
    return $all_rows;
}

//Deleting image
function delete_image($con, $imgId, $filePath)
{
    $sql = "delete from uploaded_images where id=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../profile.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'i', $imgId);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);


    return $result;
}

//-------------- SIGNUP, LOGIN, PROFILE UPDATE --------------------------------------------


function check_login($con, $email, $password)
{
    //Checking login with some static info.
    $sql = "select * from user_reg where email=? and password=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../login.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    $result = false;
    if ($row = mysqli_fetch_assoc($result_data)) {
        $result = $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function empty_input_signup($firstName, $lastName, $email, $gender, $password, $confirmPassword)
{
    if (empty($firstName) || empty($lastName) || empty($email) || empty($gender) || empty($password) || empty($confirmPassword)) {
        return true;
    } else {
        return false;
    }
}

function invalid_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function password_match($password, $confirmPassword)
{
    if ($password !== $confirmPassword) {
        return true;
    } else {
        return false;
    }
}

function email_exists($con, $email)
{
    $sql = "select * from user_reg where email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../signup.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    $result = false;
    if ($row = mysqli_fetch_assoc($result_data)) {
        $result = $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function fetch_user_data($con, $email)
{
    $sql = "select * from user_reg where email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:profile.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    $result = false;
    if ($row = mysqli_fetch_assoc($result_data)) {
        $result = $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function update_profile($con, $firstName, $lastName, $email)
{
    $sql = "update user_reg set first_name=?,last_name=? where email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../profile.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'sss', $firstName, $lastName, $email);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function register_user($con, $firstName, $lastName, $email, $password, $gender)
{
    $sql = "insert into user_reg(first_name,last_name,email,password,gender) values(?,?,?,?,?)";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../signup.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $email, $password, $gender);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

//------------------------- MESSAGE DISPLAY RELATED FUNCTIONS -------------------------------

function showerror($errortype, $msg)
{
    $error = NULL;
    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $arr);
        if (isset($arr['error'])) {
            $error = $arr['error'];
        }
    }
    if ($error === $errortype) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}

function showsuccess($errortype, $msg)
{
    $success = NULL;
    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $arr);
        if (isset($arr['success'])) {
            $success = $arr['success'];
        }
    }
    if ($success === $errortype) {
        echo '
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}
