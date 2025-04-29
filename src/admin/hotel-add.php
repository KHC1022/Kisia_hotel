<?php include '../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 호텔 추가</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="../index.php" class="logo">KISIA <span>HOTEL</span></a>
            <ul class="nav-links">
                <li><a href="admin.php">관리자</a></li>
                <li><a href="../index.php">메인으로</a></li>
            </ul>
            <div class="auth-buttons">
                <span class="admin-name">관리자님</span>
                <a href="../user/login.php" class="login-btn">로그아웃</a>
            </div>
        </nav>
    </header>

    <main class="admin-container">
        <div class="admin-sidebar">
            <h2>관리자 메뉴</h2>
            <ul class="admin-menu">
                <li data-tab="members" onclick="window.location.href='admin.php?tab=members'">
                    <i class="fas fa-users"></i>
                    회원 관리
                </li>
                <li class="active" data-tab="hotels" onclick="window.location.href='admin.php?tab=hotels'">
                    <i class="fas fa-hotel"></i>
                    호텔 관리
                </li>
                <li data-tab="reservations" onclick="window.location.href='admin.php?tab=reservations'">
                    <i class="fas fa-calendar-check"></i>
                    예약 관리
                </li>
                <li data-tab="reviews" onclick="window.location.href='admin.php?tab=reviews'">
                    <i class="fas fa-star"></i>
                    후기 관리
                </li>
                <li data-tab="inquiries" onclick="window.location.href='admin.php?tab=inquiries'">
                    <i class="fas fa-question-circle"></i>
                    문의 관리
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <div class="section-header">
                <h2>호텔 추가</h2>
                <a href="hotel-list.php" class="back-btn"><i class="fas fa-arrow-left"></i> 목록으로 돌아가기</a>
            </div>

            <form id="hotelAddForm" class="admin-form">
                <div class="form-group">
                    <label for="hotelName">호텔 이름</label>
                    <input type="text" id="hotelName" name="hotelName" required>
                </div>

                <div class="form-group">
                    <label for="location">위치</label>
                    <input type="text" id="location" name="location" required>
                </div>

                <div class="form-group">
                    <label for="description">설명</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <label for="amenities">편의시설</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="amenities" value="wifi"> 무선 인터넷</label>
                        <label><input type="checkbox" name="amenities" value="parking"> 주차장</label>
                        <label><input type="checkbox" name="amenities" value="pool"> 수영장</label>
                        <label><input type="checkbox" name="amenities" value="gym"> 피트니스 센터</label>
                        <label><input type="checkbox" name="amenities" value="restaurant"> 레스토랑</label>
                        <label><input type="checkbox" name="amenities" value="spa"> 스파</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="images">호텔 이미지</label>
                    <input type="file" id="images" name="images" multiple accept="image/*">
                    <div class="image-preview" id="imagePreview"></div>
                </div>

                <div class="form-group">
                    <label for="roomTypes">객실 유형</label>
                    <div id="roomTypes">
                        <div class="room-type">
                            <input type="text" placeholder="객실 유형" required>
                            <input type="number" placeholder="가격" required>
                            <input type="number" placeholder="최대 인원" required>
                            <button type="button" class="remove-room">삭제</button>
                        </div>
                    </div>
                    <button type="button" class="add-room-btn">객실 유형 추가</button>
                </div>

                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="window.location.href='admin.php'">취소</button>
                    <button type="submit" class="submit-btn">호텔 추가</button>
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