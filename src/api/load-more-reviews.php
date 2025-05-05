<?php
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/db_connect.php';

header('Content-Type: application/json');

if (!isset($_GET['hotel_id']) || !isset($_GET['offset'])) {
    echo json_encode(['error' => '필수 파라미터가 누락되었습니다.']);
    exit;
}

$hotel_id = (int)$_GET['hotel_id'];
$offset = (int)$_GET['offset'];

// 추가 리뷰 가져오기
$reviews_query = "SELECT r.*, u.username, u.profile_image,
                 (SELECT SUM(is_helpful) FROM review_helpful WHERE review_id = r.review_id) as total_helpful,
                 (SELECT SUM(not_helpful) FROM review_helpful WHERE review_id = r.review_id) as total_not_helpful
                 FROM reviews r
                 JOIN users u ON r.user_id = u.user_id
                 WHERE r.hotel_id = ?
                 ORDER BY r.created_at DESC
                 LIMIT 2 OFFSET ?";

$reviews_stmt = $conn->prepare($reviews_query);
$reviews_stmt->bind_param("ii", $hotel_id, $offset);
$reviews_stmt->execute();
$reviews_result = $reviews_stmt->get_result();
$reviews = [];

while ($review = $reviews_result->fetch_assoc()) {
    $reviews[] = $review;
}

// 전체 리뷰 수 가져오기
$total_query = "SELECT COUNT(*) as total FROM reviews WHERE hotel_id = ?";
$total_stmt = $conn->prepare($total_query);
$total_stmt->bind_param("i", $hotel_id);
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_reviews = $total_result->fetch_assoc()['total'];

echo json_encode([
    'reviews' => $reviews,
    'total_reviews' => $total_reviews
]); 