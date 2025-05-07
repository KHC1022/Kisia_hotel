<?php
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/session.php';

$user_id = $_SESSION['user_id'];

$user_sql="select * from users where user_id='$user_id'";
$user_result = mysqli_query($conn, $user_sql);
$users = mysqli_fetch_assoc($user_result);

$GLOBALS['users'] = $users;