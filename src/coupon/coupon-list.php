<?php
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('로그인 후 이용해 주세요.');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// ✅ 전체 쿠폰 가져오기
$result = mysqli_query($conn, "SELECT * FROM coupons ORDER BY created_at DESC");
$coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);

// ✅ 내가 받은 쿠폰 목록 가져오기
$received_result = mysqli_query($conn, "SELECT coupon_id FROM user_coupons WHERE user_id = $user_id");
$received = [];
while ($row = mysqli_fetch_assoc($received_result)) {
    $received[] = $row['coupon_id'];
}
?>

<main class="user-coupon-container">
    <h2>나의 쿠폰</h2>

    <?php if (count($coupons) === 0): ?>
        <p>현재 사용 가능한 쿠폰이 없습니다.</p>
    <?php else: ?>
        <?php foreach ($coupons as $coupon): ?>
            <div class="coupon-card">
                <div class="coupon-details">
                    <div class="coupon-header">
                        <i class="fas fa-ticket-alt"></i> 
                        <?= $coupon['name'] ?> (<?= $coupon['code'] ?>) <!-- ✅ XSS 필터 제거 -->
                    </div>
                    <p style="color:red; font-weight:bold;">
                        <?= $coupon['discount_type'] === 'percentage'
                            ? (int)$coupon['discount_value'] . '% 할인'
                            : number_format($coupon['discount_value']) . '원 할인'; ?>
                    </p>
                    <p>사용 기간: <?= $coupon['start_date'] ?> ~ <?= $coupon['end_date'] ?></p> <!-- ✅ date() 제거 -->
                </div>

                <div class="coupon-action">
                    <?php if (in_array($coupon['coupon_id'], $received)): ?>
                        <button disabled><i class="fas fa-check"></i></button>
                    <?php else: ?>
                        <form action="receive_coupon_action.php" method="GET">
                            <input type="hidden" name="coupon_id" value="<?= $coupon['coupon_id'] ?>"> <!-- ✅ CSRF 필터 없음 -->
                            <button type="submit"><i class="fas fa-gift"></i></button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
