<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

$reservation_id = $_GET['reservation_id'];
$room_id = $_GET['room_id'];

$sql = "UPDATE reservations SET status = 'cancel' WHERE reservation_id = $reservation_id";
$sql2 = "UPDATE rooms SET status = 'available' WHERE room_id = $room_id";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

if ($result && $result2) {
    echo "<script>
        alert('$reservation_id 번 예약이 취소되었습니다.');
        window.location.href = '../user/mypage.php';
    </script>";
}

?>