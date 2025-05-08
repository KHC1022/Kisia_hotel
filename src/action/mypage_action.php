<?php
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/session.php';

$user_id = $_SESSION['user_id'];

$user_sql="select * from users where user_id='$user_id'";
$user_result = mysqli_query($conn, $user_sql);
$users = mysqli_fetch_assoc($user_result);

$GLOBALS['users'] = $users;

$user_id = $_SESSION['user_id'];
$wishlist_query = "
    SELECT w.hotel_id, h.name
    FROM wishlist w
    JOIN hotels h ON w.hotel_id = h.hotel_id
    WHERE w.user_id = '$user_id'
    ORDER BY w.created_at DESC
";
$wishlist_result = mysqli_query($conn, $wishlist_query);
$wishlist_items = [];
while ($row = mysqli_fetch_assoc($wishlist_result)) {
    $wishlist_items[] = $row;
}