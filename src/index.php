<?php include 'includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 메인</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">KISIA <span>HOTEL</span></a>
            <ul class="nav-links">
                <li><a href="index.php">홈</a></li>
                <li><a href="hotel/hotels.php">호텔</a></li>
                <li><a href="review/review.php">후기</a></li>
                <li><a href="inquiry/inquiry.php">문의</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="user/login.php" class="login-btn">로그인</a>
                <a href="user/signup.php" class="signup-btn">회원가입</a>
            </div>
        </nav>
    </header>

    <div id="loginModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>로그인</h2>
            <form>
                <div class="form-group">
                    <input type="text" id="username" placeholder="사용자 이름" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" placeholder="비밀번호" required>
                </div>
                <button type="submit" class="login-submit-btn">로그인</button>
            </form>
        </div>
    </div>

    <main>
        <section class="hero">
            <div class="search-container">
                <h1>완벽한 숙소를 찾아보세요</h1>
                <div class="search-box">
                    <div class="search-input">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="어디로 가시나요?">
                    </div>
                    <div class="search-input">
                        <i class="fas fa-calendar"></i>
                        <input type="date" placeholder="체크인 날짜">
                    </div>
                    <div class="search-input">
                        <i class="fas fa-calendar"></i>
                        <input type="date" placeholder="체크아웃 날짜">
                    </div>
                    <div class="search-input">
                        <i class="fas fa-user"></i>
                        <input type="number" placeholder="게스트 수" min="1" max="10">
                    </div>
                    <button class="search-btn">검색</button>
                </div>
                <div id="searchResults" class="search-results"></div>
            </div>
        </section>

        <section class="featured-hotels">
            <h2>추천 호텔</h2>
            <div class="hotel-grid">
                <div class="hotel-card">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="럭셔리 호텔">
                    <div class="hotel-info">
                        <h3>그랜드 럭셔리 호텔</h3>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> 뉴욕, 미국</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                        <p class="price">₩250,000/박</p>
                        <a href="./hotel/hotel-detail.php?hotel=grand-luxury" class="detail-btn">상세보기</a>
                    </div>
                </div>
                <div class="hotel-card">    
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="비치 리조트">
                    <div class="hotel-info">
                        <h3>비치 파라다이스 리조트</h3>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> 마이애미, 미국</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <p class="price">₩300,000/박</p>
                        <a href="./hotel/hotel-detail.php?hotel=beach-paradise" class="detail-btn">상세보기</a>
                    </div>
                </div>
                <div class="hotel-card">
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="마운틴 뷰 호텔">
                    <div class="hotel-info">
                        <h3>마운틴 뷰 호텔</h3>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> 덴버, 미국</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <p class="price">₩200,000/박</p>
                        <a href="./hotel/hotel-detail.php?hotel=mountain-view" class="detail-btn">상세보기</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits">
            <h2>이벤트 & 프로모션</h2>
            <div class="benefits-grid">
                <a href="event/event-review.php" class="benefit-card">
                    <i class="fas fa-gift"></i>
                    <h3>의견 남기고 선물 받자!</h3>
                    <p>KISIA HOTEL 이용 소감을 댓글로 남기면 추첨을 통해 특별 선물 증정</p>
                    <span class="event-date">2025년 5월 1일 ~ 5월 30일</span>
                    <span class="benefit-link">자세히 보기 <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="event/event-timedeal.php" class="benefit-card">
                    <i class="fas fa-percent"></i>
                    <h3>부산 호텔 타임딜</h3>
                    <p>오늘만 부산 호텔 40% 할인</p>
                    <span class="event-date">오늘 자정까지</span>
                    <span class="benefit-link">자세히 보기 <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="event/event-japan.php" class="benefit-card">
                    <i class="fas fa-hotel"></i>
                    <h3>일본 호텔 단독 특가</h3>
                    <p>도쿄, 오사카, 후쿠오카 등 일본 전역 호텔 20% 할인</p>
                    <span class="event-date">2025년 4월 1일 ~ 6월 30일</span>
                    <span class="benefit-link">자세히 보기 <i class="fas fa-arrow-right"></i></span>
                </a>
            </div>
        </section>
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
                    <li><a href="index.php">홈</a></li>
                    <li><a href="hotel/hotels.php">호텔</a></li>
                    <li><a href="review/review.php">후기</a></li>
                    <li><a href="inquiry/inquiry.php">문의</a></li>
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