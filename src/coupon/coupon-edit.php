<?php
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';

// 쿠폰 ID 확인
if (!isset($_GET['id'])) {
    header('Location: coupon-list.php');
    exit;
}

$couponId = $_GET['id'];

// 쿠폰 정보 가져오기
function getCoupon($pdo, $couponId) {
    $stmt = $pdo->prepare("SELECT * FROM coupons WHERE coupon_id = :id");
    $stmt->bindParam(':id', $couponId);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$coupon = getCoupon($pdo, $couponId);

if (!$coupon) {
    header('Location: coupon-list.php');
    exit;
}
?>

<main class="coupon-container">
    <div class="coupon-header">
        <div class="header-left">
            <a href="coupon-list.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> 목록으로
            </a>
            <h1>쿠폰 수정</h1>
        </div>
    </div>

    <form id="editCouponForm" action="coupon-action.php" method="POST" class="coupon-form">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="coupon_id" value="<?php echo $coupon['coupon_id']; ?>">
        
        <div class="form-group">
            <label for="couponCode">쿠폰 코드</label>
            <input type="text" id="couponCode" name="code" 
                   value="<?php echo htmlspecialchars($coupon['code']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="couponName">쿠폰 이름</label>
            <input type="text" id="couponName" name="name" 
                   value="<?php echo htmlspecialchars($coupon['name']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="description">설명</label>
            <input type="text" id="description" name="description" 
                   value="<?php echo htmlspecialchars($coupon['description']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="discountType">할인 유형</label>
            <select id="discountType" name="discount_type" required>
                <option value="percentage" <?php echo $coupon['discount_type'] === 'percentage' ? 'selected' : ''; ?>>
                    퍼센트 할인
                </option>
                <option value="fixed" <?php echo $coupon['discount_type'] === 'fixed' ? 'selected' : ''; ?>>
                    정액 할인
                </option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="discountValue">할인 값</label>
            <input type="number" id="discountValue" name="discount_value" 
                   value="<?php echo $coupon['discount_value']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="startDate">시작일</label>
            <input type="date" id="startDate" name="start_date" 
                   value="<?php echo date('Y-m-d', strtotime($coupon['start_date'])); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="endDate">종료일</label>
            <input type="date" id="endDate" name="end_date" 
                   value="<?php echo date('Y-m-d', strtotime($coupon['end_date'])); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="minimumPurchase">최소 구매 금액</label>
            <input type="number" id="minimumPurchase" name="minimum_purchase" 
                   value="<?php echo $coupon['minimum_purchase']; ?>">
        </div>
        
        <div class="form-group">
            <label for="maximumDiscount">최대 할인 금액</label>
            <input type="number" id="maximumDiscount" name="maximum_discount" 
                   value="<?php echo $coupon['maximum_discount']; ?>">
        </div>
        
        <div class="form-group">
            <label for="usageLimit">사용 제한 횟수</label>
            <input type="number" id="usageLimit" name="usage_limit" 
                   value="<?php echo $coupon['usage_limit']; ?>">
        </div>
        
        <div class="form-group">
            <label for="isActive">상태</label>
            <select id="isActive" name="is_active">
                <option value="1" <?php echo $coupon['is_active'] ? 'selected' : ''; ?>>활성</option>
                <option value="0" <?php echo !$coupon['is_active'] ? 'selected' : ''; ?>>비활성</option>
            </select>
        </div>
        
        <div class="form-actions">
            <button type="button" class="btn btn-secondary" onclick="history.back()">취소</button>
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </form>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 