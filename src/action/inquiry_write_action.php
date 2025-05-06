<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

$user_id = $_SESSION['user_id'];
$category = $_POST['category'];
$title = $_POST['title'];
$content = $_POST['content'];
$is_secret=isset($_POST['is_secret']) ? 1 : 0;

mysqli_query($conn, "INSERT INTO inquiries (user_id, category, title, content, is_secret) 
VALUES ('$user_id', '$category', '$title', '$content', '$is_secret')");

$inquiry_id = mysqli_insert_id($conn);

$upload_dir = '../uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (isset($_FILES['files']['name'])) {
    $cnt = count($_FILES['files']['name']);

    for ($i = 0; $i < $cnt; $i++) {
        $original_name = $_FILES['files']['name'][$i];
        $tmp_name = $_FILES['files']['tmp_name'][$i];
        
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);
        $safe_name = time() . '_' . uniqid() . '.' . $ext;
        $target = $upload_dir . $safe_name;

        if (move_uploaded_file($tmp_name, $target)) {
            // DB에는 원래 한글 이름 저장
            mysqli_query($conn, "INSERT INTO inquiry_files (inquiry_id, file_name, file_path)
            VALUES ($inquiry_id, '$original_name', 'uploads/$safe_name')");
        } else {
            echo "파일 업로드 실패: $original_name<br>";
            break;
        }
    }
}

echo "<script>alert('등록 완료'); location.href='../inquiry/inquiry.php';</script>";
exit;