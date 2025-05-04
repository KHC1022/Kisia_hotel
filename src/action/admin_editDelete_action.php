<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

$action_type = null;
$table_name = null;
$id_name = null;
$id = null;

foreach ($_GET as $key => $value) {
    if (strpos($key, '_') !== false) {
        list($prefix, $action) = explode('_', $key);
        
        switch ($prefix) {
            case 'user':
                $table_name = 'users';
                $id_name = 'user_id';
                break;
            case 'hotel':
                $table_name = 'hotels';
                $id_name = 'hotel_id';
                break;
            case 'reservation':
                $table_name = 'reservations';
                $id_name = 'reservation_id';
                break;
            case 'review':
                $table_name = 'reviews';
                $id_name = 'review_id';
                break;
            case 'inquiry':
                $table_name = 'inquiries';
                $id_name = 'inquiry_id';
                break;
        }
        
        if ($action === 'edit' || $action === 'delete') {
            $action_type = $action;
            $id = $value;
            break;
        }
    }
}

if ($action_type === 'edit') {
    // 편집 로직 구현 예정
}
else if ($action_type === 'delete') {
    $sql = "DELETE FROM $table_name WHERE $id_name = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "<script>
            alert('$id 번이 삭제되었습니다.');
            window.location.href = '../admin/admin.php?tab=$table_name';
        </script>";
    } else {
        echo "<script>
            alert('삭제에 실패했습니다.');
            window.location.href = '../admin/admin.php?tab=$table_name';
        </script>";
    }
    exit;
}
?>