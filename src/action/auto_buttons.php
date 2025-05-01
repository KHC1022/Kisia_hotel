<?php
include_once __DIR__ . '/../includes/session.php';?>

<?php if(!isset($_SESSION['is_login'])): ?>
    <a href="../user/login.php" class="style-auth-btn">로그인</a>
    <a href="../user/signup.php" class="style-auth-btn">회원가입</a>
<?php else: ?>
    <!-- 로그인한 경우 -->
    <span class="style-username"><?php echo $_SESSION['username']; ?>님</span>
    <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
        <a href="../admin/admin.php" class="style-auth-btn">관리자페이지</a>
    <?php else: ?>
        <a href="../user/mypage.php" class="style-auth-btn">마이페이지</a>
    <?php endif; ?>
    <a href="../action/logout_action.php" class="style-auth-btn">로그아웃</a>
<?php endif; ?>