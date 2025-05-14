<?php
include_once __DIR__ . '/../includes/db_connection.php';

$user_id = $_GET['user_id'] ?? null;
$vip_status = $_GET['vip_status'] ?? null;

if ($user_id !== null && $vip_status !== null) {
    $sql = "UPDATE users SET vip = $vip_status WHERE user_id = $user_id";
    mysqli_query($conn, $sql);
}

header("Location: ../admin/admin.php?tab=users");
exit;
?>
