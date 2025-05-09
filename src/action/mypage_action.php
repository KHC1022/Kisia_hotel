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

// 예약 내역 조회
$reservation_query = "
    SELECT r.*, h.name AS hotel_name, rm.room_type, rm.hotel_id
    FROM reservations r
    JOIN rooms rm ON r.room_id = rm.room_id
    JOIN hotels h ON rm.hotel_id = h.hotel_id
    WHERE r.user_id = '$user_id'
    ORDER BY r.created_at DESC;
";

$reservation_result = mysqli_query($conn, $reservation_query);
$reservations = [];
while ($row = mysqli_fetch_assoc($reservation_result)) {
    $reservations[] = $row;
}

$GLOBALS['reservations'] = $reservations;

