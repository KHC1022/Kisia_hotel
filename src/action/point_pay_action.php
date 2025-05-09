<?php
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/session.php';

$user_id = $_SESSION['user_id'] ?? null;
$charge_amount = $_GET['charge_amount'] ?? 0;
$room_id = $_GET['room_id'] ?? null;
$checkin = $_GET['checkin'] ?? null;
$checkout = $_GET['checkout'] ?? null;
$total_price = $_GET['total_price'] ?? 0;
$guests = $_GET['guests'] ?? 1;

$pay_sql = "SELECT point FROM users WHERE user_id = '$user_id'";
$pay_result = mysqli_query($conn, $pay_sql);
$user = mysqli_fetch_assoc($pay_result);

if ($user && $user['point'] >= $charge_amount) {
    // 포인트 차감
    $new_point = $user['point'] - $charge_amount;
    $update_sql = "UPDATE users SET point = $new_point WHERE user_id = '$user_id'";
    mysqli_query($conn, $update_sql);

    $rooms_update_sql = "UPDATE rooms SET status = 'reserved' WHERE room_id = '$room_id'";
    mysqli_query($conn, $rooms_update_sql);

    $reservation_sql = "INSERT INTO reservations (user_id, room_id, check_in, check_out, total_price, guests, created_at, status) 
                       VALUES ('$user_id', '$room_id', '$checkin', '$checkout', '$total_price', '$guests', NOW(), 'done')";
    $reservation_result = mysqli_query($conn, $reservation_sql);
    
    if (!$reservation_result) {
        echo "<script>alert('예약 등록 중 오류가 발생했습니다: " . mysqli_error($conn) . "');</script>";
        exit;
    }

    echo "<script>alert('결제가 완료되었습니다.'); location.href='../user/mypage.php';</script>";
    exit;
} else {
    echo "<script>alert('잔액이 부족합니다.'); history.back();</script>";
}
?>