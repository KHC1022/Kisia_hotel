<?php
include_once __DIR__ . '/../includes/db_connect.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// 쿠폰 추가
function addCoupon($pdo, $data) {
    $sql = "INSERT INTO coupons (code, name, description, discount_type, discount_value, 
            start_date, end_date, minimum_purchase, maximum_discount, usage_limit, is_active) 
            VALUES (:code, :name, :description, :discount_type, :discount_value, 
            :start_date, :end_date, :minimum_purchase, :maximum_discount, :usage_limit, 1)";
    
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

// 쿠폰 수정
function updateCoupon($pdo, $data) {
    $sql = "UPDATE coupons SET 
            code = :code,
            name = :name,
            description = :description,
            discount_type = :discount_type,
            discount_value = :discount_value,
            start_date = :start_date,
            end_date = :end_date,
            minimum_purchase = :minimum_purchase,
            maximum_discount = :maximum_discount,
            usage_limit = :usage_limit,
            is_active = :is_active
            WHERE coupon_id = :coupon_id";
    
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

// 쿠폰 삭제
function deleteCoupon($pdo, $couponId) {
    $stmt = $pdo->prepare("DELETE FROM coupons WHERE coupon_id = :id");
    $stmt->bindParam(':id', $couponId);
    return $stmt->execute();
}

// 응답 메시지 설정
$message = '';
$success = false;

try {
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'code' => $_POST['code'],
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'discount_type' => $_POST['discount_type'],
                    'discount_value' => $_POST['discount_value'],
                    'start_date' => $_POST['start_date'],
                    'end_date' => $_POST['end_date'],
                    'minimum_purchase' => $_POST['minimum_purchase'] ?: null,
                    'maximum_discount' => $_POST['maximum_discount'] ?: null,
                    'usage_limit' => $_POST['usage_limit'] ?: null
                ];
                
                if (addCoupon($pdo, $data)) {
                    $message = '쿠폰이 성공적으로 추가되었습니다.';
                    $success = true;
                } else {
                    $message = '쿠폰 추가에 실패했습니다.';
                }
            }
            break;
            
        case 'edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'coupon_id' => $_POST['coupon_id'],
                    'code' => $_POST['code'],
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'discount_type' => $_POST['discount_type'],
                    'discount_value' => $_POST['discount_value'],
                    'start_date' => $_POST['start_date'],
                    'end_date' => $_POST['end_date'],
                    'minimum_purchase' => $_POST['minimum_purchase'] ?: null,
                    'maximum_discount' => $_POST['maximum_discount'] ?: null,
                    'usage_limit' => $_POST['usage_limit'] ?: null,
                    'is_active' => $_POST['is_active']
                ];
                
                if (updateCoupon($pdo, $data)) {
                    $message = '쿠폰이 성공적으로 수정되었습니다.';
                    $success = true;
                } else {
                    $message = '쿠폰 수정에 실패했습니다.';
                }
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                if (deleteCoupon($pdo, $_GET['id'])) {
                    $message = '쿠폰이 성공적으로 삭제되었습니다.';
                    $success = true;
                } else {
                    $message = '쿠폰 삭제에 실패했습니다.';
                }
            }
            break;
            
        default:
            $message = '잘못된 요청입니다.';
    }
} catch (PDOException $e) {
    $message = '데이터베이스 오류가 발생했습니다: ' . $e->getMessage();
}

$redirectUrl = 'coupon-list.php';
if ($message) {
    $redirectUrl .= '?message=' . urlencode($message) . '&success=' . ($success ? '1' : '0');
}
header('Location: ' . $redirectUrl);
exit; 