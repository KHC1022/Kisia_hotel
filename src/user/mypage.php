<?php include '../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 마이페이지</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/mypage.css">
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
                <span class="user-name">김철수님</span>
                <a href="login.php" class="logout-btn">로그아웃</a>
            </div>
        </nav>
    </header>

    <main class="mypage-container">
        <div class="mypage-sidebar">
            <div class="profile-section">
                <div class="profile-image-container">
                    <img src="https://via.placeholder.com/150" alt="프로필 사진" id="profileImage">
                    <button class="change-profile-btn">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <h2 id="userName">홍길동</h2>
                <p id="userEmail">user@example.com</p>
            </div>
            <nav class="mypage-nav">
                <ul>
                    <li><a href="#" data-tab="reservations" class="active">예약 관리</a></li>
                    <li><a href="#" data-tab="profile">여행객 정보</a></li>
                    <li><a href="#" data-tab="wishlist">찜 목록</a></li>
                </ul>
            </nav>
        </div>

        <div class="mypage-content">
            <!-- 예약 관리 섹션 -->
            <section id="reservations" class="content-section active">
                <h2>예약 관리</h2>
                <div class="reservation-list">
                    <div class="reservation-card">
                        <div class="reservation-header">
                            <h3>그랜드 럭셔리 호텔</h3>
                            <span class="status confirmed">확정</span>
                        </div>
                        <div class="reservation-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar"></i>
                                <span>체크인: 2024-04-01</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-calendar"></i>
                                <span>체크아웃: 2024-04-03</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-bed"></i>
                                <span>디럭스 더블룸</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-user"></i>
                                <span>2명</span>
                            </div>
                        </div>
                        <div class="reservation-actions">
                            <button class="modify-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                            <button class="cancel-btn">예약 취소</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 여행객 정보 섹션 -->
            <section id="profile" class="content-section">
                <h2>여행객 정보</h2>
                <div class="profile-form-container">
                    <form class="profile-form">
                        <div class="form-group">
                            <label for="name">이름</label>
                            <input type="text" id="name" value="홍길동">
                        </div>
                        <div class="form-group">
                            <label for="email">이메일</label>
                            <input type="email" id="email" value="user@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">전화번호</label>
                            <input type="tel" id="phone" value="010-1234-5678">
                        </div>
                        <div class="form-group">
                            <label for="password">비밀번호 변경</label>
                            <input type="password" id="password" placeholder="새 비밀번호">
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirm">비밀번호 확인</label>
                            <input type="password" id="passwordConfirm" placeholder="새 비밀번호 확인">
                        </div>
                        <button type="submit" class="save-btn">저장</button>
                    </form>
                </div>
            </section>

            <!-- 찜 목록 섹션 -->
            <section id="wishlist" class="content-section">
                <h2>찜 목록</h2>
                <table class="wishlist-table">
                    <thead>
                        <tr>
                            <th>호텔 이름</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="hotel-row">
                                    <span>그랜드 럭셔리 호텔</span>
                                    <div class="button-group">
                                        <button class="detail-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                                        <button class="delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="hotel-row">
                                    <span>시그니처 호텔</span>
                                    <div class="button-group">
                                        <button class="detail-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                                        <button class="delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="hotel-row">
                                    <span>파크 프리미엄 호텔</span>
                                    <div class="button-group">
                                        <button class="detail-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                                        <button class="delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
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

    <script src="js/mypage.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.mypage-nav a');
            const contentSections = document.querySelectorAll('.content-section');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links and sections
                    navLinks.forEach(l => l.classList.remove('active'));
                    contentSections.forEach(section => section.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Show corresponding section
                    const targetTab = this.getAttribute('data-tab');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        });
    </script>
</body>
</html> 