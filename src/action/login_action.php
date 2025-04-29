<?php
include_once '../includes/session.php';
include_once '../includes/db_connection.php';

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT user_id, password FROM users WHERE user_id='$id' AND password='$password'";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row!=null) {
    $_SESSION['username'] = $row['id'];
    $_SESSION['name'] = $row['name'];
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