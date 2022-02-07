<?php
session_start();
include('server.php');

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM tbl_admin WHERE username = '$username' 
        AND password = '$password' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "Success";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "เข้าสู่ระบบสำเร็จ";
        header("location: index.php");
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Username / Password ไม่ถูกต้อง";
        header("location: login.php");
    }
}
