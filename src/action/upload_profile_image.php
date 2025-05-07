<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

$user_id = $_SESSION['user_id'];

if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
    $filename = basename($_FILES['profile_image']['name']);
    $target_dir = '../uploads/';
    $relative_path = 'uploads/' . $filename;
    $target_file = $target_dir . $filename;

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);

    $sql = "UPDATE users SET profile_image = '$relative_path' WHERE user_id = '$user_id'";
    mysqli_query($conn, $sql);

    header("Location: /user/mypage.php");
    exit;
}