<?php 
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 문의 작성</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/inquiry.css">
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
                <li><a href="inquiry.php" class="active">문의</a></li>
            </ul>
            <div class="auth-buttons">
                <?php include __DIR__ . '/../action/auto_buttons.php'; ?>
            </div>
        </nav>
    </header>

    <main class="board-container">
        <div class="board-header">
            <h1 class="board-title">문의 작성</h1>
        </div>
        <div class="form-container">
            <form class="inquiry-form">
                <div class="form-group">
                    <label for="category">분류</label>
                    <select id="category" name="category" required>
                        <option value="">분류 선택</option>
                        <option value="예약">예약</option>
                        <option value="결제">결제</option>
                        <option value="객실">객실</option>
                        <option value="기타">기타</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">제목</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file">파일 첨부</label>
                    <input type="file" id="file" name="file" multiple>
                </div>
                <div class="form-actions">
                    <a href="inquiry.php" class="write-btn cancel-btn">취소</a>
                    <button type="submit" class="write-btn">등록</button>
                </div>
            </form>
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
                    <li><a href="inquiry.php">문의</a></li>
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