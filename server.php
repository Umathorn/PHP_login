<?php

$conn = mysqli_connect("localhost", "root", "", "test")
    or die("Connection failed" . mysqli_error($conn));
//set utf8
mysqli_query($conn, "SET NAMES 'utf8");
// set time zone
date_default_timezone_set('Asia/Bangkok');
