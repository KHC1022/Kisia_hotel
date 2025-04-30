<?php 
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 후기 작성</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php" class="logo">KISIA <span>HOTEL</span></a>
            <ul class="nav-links">
                <li><a href="../index.php">홈</a></li>
                <li><a href="../hotel/hotels.php">호텔</a></li>
                <li><a href="review.php">후기</a></li>
                <li><a href="../inquiry/inquiry.php">문의</a></li>
            </ul>
            <div class="auth-buttons">
                <?php include __DIR__ . '/../action/auto_buttons.php'; ?>
            </div>
        </nav>
    </header>

    <main class="board-container">
        <div class="board-header">
            <h1 class="board-title">후기 작성</h1>
        </div>
        <div class="form-container">
            <form class="review-form">
                <div class="form-group">
                    <label for="hotel">호텔 선택</label>
                    <select id="hotel" name="hotel" required>
                        <option value="">호텔 선택</option>
                        <option value="grand-luxury">그랜드 럭셔리 호텔</option>
                        <option value="beach-paradise">비치 파라다이스 호텔</option>
                        <option value="mountain-view">마운틴 뷰 호텔</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="room">객실 유형</label>
                    <select id="room" name="room" required>
                        <option value="">객실 유형 선택</option>
                        <option value="economy-double">이코노미 더블룸</option>
                        <option value="deluxe-double">디럭스 더블룸</option>
                        <option value="suite">스위트룸</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="travel-type">여행 유형</label>
                    <select id="travel-type" name="travel-type" required>
                        <option value="">여행 유형 선택</option>
                        <option value="solo">나홀로 여행객</option>
                        <option value="couple">커플</option>
                        <option value="family">가족</option>
                        <option value="business">비즈니스</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rating">평점</label>
                    <select id="rating" name="rating" required>
                        <option value="">평점 선택</option>
                        <option value="0.0">0.0</option>
                        <option value="0.5">0.5</option>
                        <option value="1.0">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.0</option>
                        <option value="4.5">4.5</option>
                        <option value="5.0">5.0</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <div class="form-group">
                    <label for="photos">사진 첨부</label>
                    <input type="file" id="photos" name="photos" multiple accept="image/*">
                </div>
                <div class="form-actions">
                    <a href="review.php" class="write-btn cancel-btn">취소</a>
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
                    <li><a href="review.php">후기</a></li>
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