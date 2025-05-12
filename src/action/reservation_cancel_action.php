<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/mypage_action.php';  // VIP 관련 함수를 포함

$reservation_id = $_GET['reservation_id'];
$room_id = $_GET['room_id'];
$user_id = $_SESSION['user_id'];

$sql = "UPDATE reservations SET status = 'cancel' WHERE reservation_id = $reservation_id";
$sql2 = "UPDATE rooms SET status = 'available' WHERE room_id = $room_id";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

if ($result && $result2) {
    // VIP 상태 즉시 업데이트
    $vip_score = calculate_vip_score($user_id, $conn);
    update_vip_status($user_id, $vip_score, $conn);

    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        echo "<script>
            alert('$reservation_id 번 예약이 취소되었습니다.');
            window.location.href = '../admin/admin.php?tab=reservations';
        </script>";
    } else {
        echo "<script>
            alert('예약이 취소되었습니다.');
            window.location.href = '../user/mypage.php';
        </script>";
    }
}

?>