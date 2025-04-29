<?php include '../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 후기 이벤트</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/event.css">
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
                <a href="../user/login.php" class="login-btn">로그인</a>
                <a href="../user/signup.php" class="signup-btn">회원가입</a>
            </div>
        </nav>
    </header>

    <main class="event-container">
        <div class="event-header">
            <h1>의견 남기고 선물 받자!</h1>
            <span class="event-period">2025년 5월 1일 ~ 5월 30일</span>
        </div>

        <div class="event-content">
            <div class="event-image">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1600&q=80" alt="호텔 리뷰 이벤트">
            </div>

            <div class="event-details">
                <h2>이벤트 내용</h2>
                <p class="event-description">KISIA HOTEL을 이용해 주시는 고객님들의 소중한 의견을 기다립니다!</p>
                
                <div class="event-section">
                    <h3>참여 방법</h3>
                    <ol>
                        <li>아래 댓글란에 KISIA HOTEL에 대한 의견을 작성해주세요</li>
                        <li>호텔 시설, 서비스에 대한 상세한 의견을 남겨주시면 당첨 확률이 높아집니다</li>
                    </ol>
                </div>

                <div class="event-section">
                    <h3>경품 안내</h3>
                    <ul>
                        <li>1등(1명): 5성급 호텔 숙박권 2박</li>
                        <li>2등(3명): 5성급 호텔 숙박권 1박</li>
                        <li>3등(5명): 스타벅스 기프티콘 5만원권</li>
                        <li>4등(10명): 스타벅스 기프티콘 3만원권</li>
                    </ul>
                </div>

                <div class="event-section">
                    <h3>유의사항</h3>
                    <ul class="notice-list">
                        <li>당첨자 발표: 2025년 6월 10일</li>
                        <li>숙박권의 유효기간은 발급일로부터 6개월입니다.</li>
                        <li>경품은 당첨자 본인에 한해 사용 가능합니다.</li>
                        <li>부적절한 댓글이나 허위 댓글은 이벤트 대상에서 제외됩니다.</li>
                        <li>로그인 후 참여 가능합니다.</li>
                    </ul>
                </div>

                <div class="comment-section">
                    <h3>의견 남기기</h3>
                    <form id="commentForm" class="comment-form">
                        <textarea id="comment" name="comment" placeholder="KISIA HOTEL에 대한 의견을 자유롭게 작성해주세요." required></textarea>
                        <button type="submit" class="submit-btn">등록하기</button>
                    </form>
                </div>

                <div class="comments-list">
                    <h3>등록된 의견</h3>
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="comment-author">김철수</span>
                            <span class="comment-date">2025-04-01 14:30</span>
                        </div>
                        <p class="comment-text">예약하기 너무 편리합니다!</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="comment-author">이영희</span>
                            <span class="comment-date">2025-04-01 15:45</span>
                        </div>
                        <p class="comment-text">호텔 예약 사이트 중에 최저가가 많아요.</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="comment-author">박지민</span>
                            <span class="comment-date">2025-04-01 16:20</span>
                        </div>
                        <p class="comment-text">다른 예약 사이트보다 홈페이지가 복잡하지 않아서 좋아요.</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="comment-author">최준호</span>
                            <span class="comment-date">2025-04-01 17:10</span>
                        </div>
                        <p class="comment-text">이벤트가 많아서 자주 이용하고 있어요!</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="comment-author">강미래</span>
                            <span class="comment-date">2025-04-01 18:05</span>
                        </div>
                        <p class="comment-text">호텔이 종류가 진짜 많은 것 같습니다.</p>
                    </div>
                    <div class="pagination">
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">4</button>
                        <button class="page-btn">5</button>
                        <button class="page-btn next">다음 ></button>
                    </div>
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