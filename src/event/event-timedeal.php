<?php include '../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 부산 호텔 타임딜</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/event-timedeal.css">
    <link rel="stylesheet" href="../style/event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap" rel="stylesheet">
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
                <a href="../user/login.php" class="login-btn">로그인</a>
                <a href="../user/signup.php" class="signup-btn">회원가입</a>
            </div>
        </nav>
    </header>

    <main class="event-container">
        <div class="event-header">
            <h1>부산 호텔 타임딜</h1>
            <div class="event-period">오늘 자정까지</div>
        </div>

        <div class="event-content">
            <div class="event-image">
                <img src="https://images.unsplash.com/photo-1596178065887-1198b6148b2b?auto=format&fit=crop&w=1600&q=80" alt="타임딜 이벤트">
            </div>

            <div class="event-details">
                <h2>이벤트 내용</h2>
                <p class="event-description">부산의 럭셔리 호텔을 특별한 가격으로 만나보세요! 오늘 자정까지만 진행되는 특별 할인 이벤트입니다.</p>

                <div class="event-section">
                    <h3>할인 호텔</h3>
                    <div class="hotel-deals">
                        <div class="hotel-deal-item">
                            <div class="hotel-image">
                                <img src="https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?auto=format&fit=crop&w=800&q=80" alt="파라다이스 호텔 부산">
                                <span class="discount-badge">40% 할인</span>
                            </div>
                            <div class="hotel-info">
                                <h4>파라다이스 호텔 부산</h4>
                                <div class="price-info">
                                    <p class="original-price">₩550,000원</p>
                                    <p class="discount-price">₩330,000원/박</p>
                                </div>
                                <a href="../hotel/hotel-detail.php?hotel=paradise" class="detail-btn">상세보기</a>
                            </div>
                        </div>

                        <div class="hotel-deal-item">
                            <div class="hotel-image">
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80" alt="시그니엘 부산">
                                <span class="discount-badge">40% 할인</span>
                            </div>
                            <div class="hotel-info">
                                <h4>시그니엘 부산</h4>
                                <div class="price-info">
                                    <p class="original-price">₩680,000원</p>
                                    <p class="discount-price">₩408,000원/박</p>
                                </div>
                                <a href="../hotel/hotel-detail.php?hotel=signiel" class="detail-btn">상세보기</a>
                            </div>
                        </div>

                        <div class="hotel-deal-item">
                            <div class="hotel-image">
                                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80" alt="파크 하얏트 부산">
                                <span class="discount-badge">40% 할인</span>
                            </div>
                            <div class="hotel-info">
                                <h4>파크 하얏트 부산</h4>
                                <div class="price-info">
                                    <p class="original-price">₩600,000원</p>
                                    <p class="discount-price">₩360,000원/박</p>
                                </div>
                                <a href="../hotel/hotel-detail.php?hotel=parkhyatt" class="detail-btn">상세보기</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="event-section">
                    <h3>예약 기간</h3>
                    <p>오늘 자정까지</p>
                </div>

                <div class="event-section">
                    <h3>유의사항</h3>
                    <ul class="notice-list">
                        <li>본 이벤트는 오늘 자정까지만 진행됩니다.</li>
                        <li>예약 변경 및 취소는 호텔 정책에 따릅니다.</li>
                        <li>할인율은 객실 타입 및 날짜에 따라 상이할 수 있습니다.</li>
                        <li>성수기 및 공휴일에는 추가 요금이 발생할 수 있습니다.</li>
                        <li>문의사항은 고객센터(1588-1234)로 연락 부탁드립니다.</li>
                    </ul>
                </div>

                <div class="event-buttons">
                    <button class="share-btn">
                        <i class="fas fa-share-alt"></i>
                        공유하기
                    </button>
                </div>
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