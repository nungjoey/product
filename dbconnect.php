<?php
$server = "localhost";
$username = "demo";
$password = "a123";
$dbname = "demo";

$conn = new mysqli($server, $username, $password, $dbname);
$conn->set_charset("utf8");//เเสดงข้อความภาษาไทยจาก db
