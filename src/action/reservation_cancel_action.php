<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/mypage_action.php';  // VIP 관련 함수 포함

$reservation_id = $_GET['reservation_id'];
$room_id = $_GET['room_id'];
$user_id = $_SESSION['user_id'];

// 객실 상태 available로 변경
$sql2 = "UPDATE rooms SET status = 'available' WHERE room_id = $room_id";
$result2 = mysqli_query($conn, $sql2);

// 예약 정보 조회
$reservation_sql = "SELECT total_price FROM reservations WHERE reservation_id = $reservation_id";
$reservation_result = mysqli_query($conn, $reservation_sql);
$reservation = mysqli_fetch_assoc($reservation_result);

// 환불 금액
$refund_amount = $reservation['total_price'];

// 예약 취소 처리
$sql = "UPDATE reservations SET status = 'cancel' WHERE reservation_id = $reservation_id";
$result = mysqli_query($conn, $sql);

// 포인트 환불
mysqli_query($conn, "UPDATE users SET point = point + $refund_amount WHERE user_id = $user_id");

// VIP 상태 업데이트
if ($result && $result2) {
    $vip_score = calculate_vip_score($user_id, $conn);
    update_vip_status($user_id, $vip_score, $conn);

    echo "<script>
        alert('예약이 취소되고 $refund_amount P가 환불되었습니다.');
        location.href = '../user/mypage.php';
    </script>";
} else {
    echo "<script>alert('예약 취소에 실패했습니다.'); history.back();</script>";
}
?>
