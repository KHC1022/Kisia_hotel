<?php
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/session.php';

$user_id = $_SESSION['user_id'];
$charge_point = isset($_GET['point']) ? (int)$_GET['point'] : 0;

// 현재 포인트 조회
$sql = "SELECT point FROM users WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$current_point = $row ? (int)$row['point'] : 0;

// 포인트 합산
$new_point = $current_point + $charge_point;

// 업데이트 쿼리
$update_sql = "UPDATE users SET point = '$new_point' WHERE user_id = '$user_id'";
$update_result = mysqli_query($conn, $update_sql);

// 성공/실패 처리
if ($update_result) {
    echo "<script>alert('포인트가 충전되었습니다.'); location.href='../user/mypage.php';</script>";
} else {
    echo "<script>alert('포인트 충전에 실패했습니다.'); history.back();</script>";
}
?>