<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../action/login_check.php';

$user_id = $_SESSION['user_id'];

// 사용자 가입일 확인
$user_sql = "SELECT created_at FROM users WHERE user_id = $user_id";
$user_result = mysqli_query($conn, $user_sql);
$user = mysqli_fetch_assoc($user_result);
$user_created_at = strtotime($user['created_at']);
$one_week_ago = strtotime('-1 week');

// 신규 회원 여부 확인 (가입일로부터 일주일 이내)
$is_new_user = ($user_created_at >= $one_week_ago);

// 전체 쿠폰 가져오기 (신규 회원이 아닌 경우 신규 회원 쿠폰 제외)
$sql = "SELECT * FROM coupons WHERE 1=1";
if (!$is_new_user) {
    $sql .= " AND code != 'WELCOME10'";
}
$sql .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die('쿠폰 정보 조회 오류: ' . mysqli_error($conn));
}
$coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 내가 받은 쿠폰 목록 가져오기
$received_result = mysqli_query($conn, "SELECT coupon_id FROM user_coupons WHERE user_id = $user_id");
$received = [];

while ($row = mysqli_fetch_assoc($received_result)) {
    $received[] = $row['coupon_id'];
}

?>