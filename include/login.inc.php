<?php
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        include_once('functions.inc.php');
        $con=connect_db();

        if($rec=check_login($con,$email,$password)){
            //Store the email to SESSION.
            session_start();
            $_SESSION['login_email']=$email;

            header('location:../profile.php');
        }else{
            header('location:../login.php?error=invalidlogin');
        }
    }