<?php
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/session.php';

$user_id = $_SESSION['user_id'] ?? null;
$charge_amount = $_GET['charge_amount'] ?? 0;

$pay_sql = "SELECT point FROM users WHERE user_id = '$user_id'";
$pay_result = mysqli_query($conn, $pay_sql);
$user = mysqli_fetch_assoc($pay_result);

if ($user && $user['point'] >= $charge_amount) {
    // 포인트 차감
    $new_point = $user['point'] - $charge_amount;
    $update_sql = "UPDATE users SET point = $new_point WHERE user_id = '$user_id'";
    mysqli_query($conn, $update_sql);

    echo "<script>alert('결제가 되었습니다.'); location.href='../user/mypage.php';</script>";
    exit;
} else {
    echo "<script>alert('잔액이 부족합니다.'); history.back();</script>";
}
?>