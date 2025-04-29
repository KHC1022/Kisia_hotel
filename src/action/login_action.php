<?php
include_once '../includes/session.php';
include_once '../includes/db_connection.php';

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT user_id, password FROM users WHERE user_id='$id' AND password='$password'";

if ($db->query($sql)) {
    echo "<script>
            alert('로그인 성공');
            window.location.href = '../index.php';
        </script>";
}
else {
    echo "<script>
            alert('로그인 실패');
            history.back();
        </script>";
}
?>