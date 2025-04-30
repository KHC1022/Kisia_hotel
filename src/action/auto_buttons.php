<?php
include_once __DIR__ . '/../includes/session.php';?>

<?php if(!isset($_SESSION['is_login'])): ?>
    <a href="../user/login.php" class="login-btn">로그인</a>
    <a href="../user/signup.php" class="signup-btn">회원가입</a>
<?php else: ?>
    <!-- 로그인한 경우 -->
    <?php echo $_SESSION['username']; ?>님
    <a href="../user/logout.php" class="logout-btn">마이페이지</a>
    <a href="../user/logout.php" class="logout-btn">로그아웃</a>
<?php endif; ?>