<?php include '../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 비밀번호 찾기</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php" class="logo">KISIA <span>HOTEL</span></a>
            <ul class="nav-links">
                <li><a href="../index.php">홈</a></li>
                <li><a href="../hotel/hotels.php">호텔</a></li>
                <li><a href="../review/review.php">후기</a></li>
                <li><a href="../inquiry/inquiry.php">문의</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="login.php" class="login-btn">로그인</a>
                <a href="signup.php" class="signup-btn">회원가입</a>
            </div>
        </nav>
    </header>

    <main class="login-container">
        <div class="login-box">
            <h1>비밀번호 찾기</h1>
            <form id="findPwForm">
                <div class="form-group">
                    <label for="id">아이디</label>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="id" name="id" placeholder="아이디를 입력하세요" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">이름</label>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="name" name="name" placeholder="이름을 입력하세요" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">이메일</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="이메일을 입력하세요" required>
                    </div>
                </div>
                <button type="submit" class="login-btn">비밀번호 찾기</button>
            </form>
            <div class="signup-link">
                <a href="login.php">로그인</a>
                <span class="separator">|</span>
                <a href="find-id.php">아이디 찾기</a>
                <span class="separator">|</span>
                <a href="signup.php">회원가입</a>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>회사 소개</h3>
                <p>경쟁력 있는 가격과 우수한 고객 서비스로 최고의 호텔 예약 경험을 제공합니다.</p>
            </div>
            <div class="footer-section">
                <h3>바로가기</h3>
                <ul>
                    <li><a href="../index.php">홈</a></li>
                    <li><a href="../hotel/hotels.php">호텔</a></li>
                    <li><a href="../review/review.php">후기</a></li>
                    <li><a href="../inquiry/inquiry.php">문의</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>연락처</h3>
                <p><i class="fas fa-phone"></i> +82 02-1234-5678</p>
                <p><i class="fas fa-envelope"></i> info@kisiahotel.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 KISIA HOTEL. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 