<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

$hotels = array(); // 배열 초기화

$query = "SELECT h.*, 
          hf.pool, hf.spa, hf.fitness, hf.restaurant, hf.parking, hf.wifi
          FROM hotels h
          LEFT JOIN hotel_facilities hf ON h.hotel_id = hf.hotel_id";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($hotel = $result->fetch_assoc()) {
        $hotels[] = $hotel;
    }
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);

$total_hotels = count($hotels);

$total_pages = ceil($total_hotels / 9);

$start_index = ($page - 1) * 9;
$current_hotels = array_slice($hotels, $start_index, 9);



// 추천 호텔
$featured_query = "SELECT h.*, 
                  hf.pool, hf.spa, hf.fitness, hf.restaurant, hf.parking, hf.wifi
                  FROM hotels h
                  LEFT JOIN hotel_facilities hf ON h.hotel_id = hf.hotel_id
                  WHERE h.hotel_id IN (5, 34, 41)";
$featured_result = $conn->query($featured_query);

$featured_hotels = array();

if ($featured_result && $featured_result->num_rows > 0) {
    while ($hotel = $featured_result->fetch_assoc()) {
        $featured_hotels[] = $hotel;
    }
}


// 부산 호텔 타임딜
$busan_query = "SELECT h.*, 
                  hf.pool, hf.spa, hf.fitness, hf.restaurant, hf.parking, hf.wifi
                  FROM hotels h
                  LEFT JOIN hotel_facilities hf ON h.hotel_id = hf.hotel_id
                  WHERE h.hotel_id IN (43, 3, 49)";
$busan_result = $conn->query($busan_query);

$busan_hotels = array();

if ($busan_result && $busan_result->num_rows > 0) {
    while ($hotel = $busan_result->fetch_assoc()) {
        $busan_hotels[] = $hotel;
    }
}


// 일본 호텔 특가
$japan_query = "SELECT h.*, 
                  hf.pool, hf.spa, hf.fitness, hf.restaurant, hf.parking, hf.wifi
                  FROM hotels h
                  LEFT JOIN hotel_facilities hf ON h.hotel_id = hf.hotel_id
                  WHERE h.hotel_id IN (6, 21, 46)";
$japan_result = $conn->query($japan_query);

$japan_hotels = array();

if ($japan_result && $japan_result->num_rows > 0) {
    while ($hotel = $japan_result->fetch_assoc()) {
        $japan_hotels[] = $hotel;
    }
}



?>