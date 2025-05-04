<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

// 현재 탭 종류 확인
$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'users';

// 페이징 설정
$items_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// 회원 관리 탭
if ($current_tab === 'users') {
    // 검색어가 있는 경우
    if (isset($_GET['user_name_search']) && trim($_GET['user_name_search']) !== '') {
        $keyword = trim($_GET['user_name_search']);
        
        $count_sql = "SELECT COUNT(*) as total FROM users WHERE username LIKE '%$keyword%'";
        $count_result = $conn->query($count_sql);
        $total_items = $count_result->fetch_assoc()['total'];
        $total_pages = ceil($total_items / $items_per_page);
        
        $sql = "SELECT * FROM users WHERE username LIKE '%$keyword%' ORDER BY user_id ASC LIMIT $offset, $items_per_page";
        $result = $conn->query($sql);
        
        $users = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
    } 
    // 검색어 없는 경우 전체 목록
    else {
        $count_sql = "SELECT COUNT(*) as total FROM users";
        $count_result = $conn->query($count_sql);
        $total_items = $count_result->fetch_assoc()['total'];
        $total_pages = ceil($total_items / $items_per_page);
        
        $sql = "SELECT * FROM users ORDER BY user_id ASC LIMIT $offset, $items_per_page";
        $result = $conn->query($sql);
        
        $users = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
    }
}

// 호텔 관리 탭
else if ($current_tab === 'hotels') {
    // 검색어가 있는 경우
    if (isset($_GET['hotel_name_search']) && trim($_GET['hotel_name_search']) !== '') {
        $keyword = trim($_GET['hotel_name_search']);
        
        $count_sql = "SELECT COUNT(DISTINCT h.hotel_id) as total FROM hotels h WHERE h.name LIKE '%$keyword%'";
        $count_result = $conn->query($count_sql);
        $total_items = $count_result->fetch_assoc()['total'];
        $total_pages = ceil($total_items / $items_per_page);
        
        $sql = "SELECT h.hotel_id, h.name, h.location, COUNT(r.room_id) as room_count 
                FROM hotels h 
                LEFT JOIN rooms r ON h.hotel_id = r.hotel_id 
                WHERE h.name LIKE '%$keyword%' 
                GROUP BY h.hotel_id 
                ORDER BY h.hotel_id ASC 
                LIMIT $offset, $items_per_page";
        $result = $conn->query($sql);
        
        $hotels = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $hotels[] = $row;
            }
        }
    } 
    // 검색어 없는 경우 전체 목록
    else {
        $count_sql = "SELECT COUNT(*) as total FROM hotels";
        $count_result = $conn->query($count_sql);
        $total_items = $count_result->fetch_assoc()['total'];
        $total_pages = ceil($total_items / $items_per_page);
        
        $sql = "SELECT h.hotel_id, h.name, h.location, COUNT(r.room_id) as room_count 
                FROM hotels h 
                LEFT JOIN rooms r ON h.hotel_id = r.hotel_id 
                GROUP BY h.hotel_id 
                ORDER BY h.hotel_id ASC 
                LIMIT $offset, $items_per_page";
        $result = $conn->query($sql);
        
        $hotels = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $hotels[] = $row;
            }
        }
    }
}

// 예약 관리 탭
else if ($current_tab === 'reservations') {
    // 구현 예정
}

// 후기 관리 탭
else if ($current_tab === 'reviews') {
    // 구현 예정
}

// 문의 관리 탭
else if ($current_tab === 'inquiries') {
    // 구현 예정
}

// 검색 타입에 따른 탭 결정
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $search_type = $_GET['search'];
    $keyword = isset($_GET[$search_type]) ? trim($_GET[$search_type]) : '';
    
    if ($keyword === '') {
        echo "<script>
                alert('검색어를 입력하세요');
                history.back();
              </script>";
        exit;
    }
    
    $tab = '';
    switch ($search_type) {
        case 'user_name_search':
            $tab = 'users';
            break;
        case 'hotel_name_search':
            $tab = 'hotels';
            break;
        case 'reservation_number_search':
            $tab = 'reservations';
            break;
        case 'review_number_search':
            $tab = 'reviews';
            break;
        case 'inquiry_number_search':
            $tab = 'inquiries';
            break;
    }
    
    if ($tab !== '') {
        header("Location: ../admin/admin.php?tab=$tab&page=1&$search_type=$keyword");
        exit;
    }
}

?> 