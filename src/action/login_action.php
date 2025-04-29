<?php
include_once '../includes/session.php';
include_once '../includes/db_connection.php';

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT user_id, username, password, username FROM users WHERE user_id='$id' AND password='$password'";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row!=null) {
    $_SESSION['username'] = $row['user_id'];
    $_SESSION['name'] = $row['username'];
    echo "<script>
            alert('로그인 성공');
            window.location.href = '../index.php';
    </script>";
    exit;
}
else {
    echo "<script>
            alert('아이디 또는 패스워드가 틀렸습니다.');
            history.back();
    </script>";
    exit;
}
?>