<?php include '../includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISIA HOTEL - 후기</title>
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
                <li><a href="review.php" class="active">후기</a></li>
                <li><a href="../inquiry/inquiry.php">문의</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="../user/login.php" class="login-btn">로그인</a>
                <a href="../user/signup.php" class="signup-btn">회원가입</a>
            </div>
        </nav>
    </header>

    <main class="board-container">
        <div class="board-header">
            <h1 class="board-title">후기 게시판</h1>
        </div>

        <div class="search-sort-container">
            <div class="search-box">
                <div class="search-row">
                    <div class="search-input">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="호텔 이름을 입력하세요">
                    </div>
                    <button class="search-button">검색</button>
                </div>
            </div>
            <div class="controls-row">
                <div class="sort-controls">
                    <span class="sort-label">정렬:</span>
                    <select class="sort-select">
                        <option value="recent">최신순</option>
                        <option value="rating-high">평점 높은순</option>
                        <option value="rating-low">평점 낮은순</option>
                        <option value="helpful">도움이 된 순</option>
                    </select>
                </div>
                <a href="review-write.php" class="write-btn">후기 작성</a>
            </div>
        </div>

        <div class="review-list">
            <div class="review-item">
                <div class="review-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <span class="hotel-name">그랜드 럭셔리 호텔</span>
                            <span class="user-name">Youngjin</span>
                        </div>
                    </div>
                    <div class="review-rating">
                        <div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-number">4.5</span>
                    </div>
                </div>
                <div class="review-content">
                    <p>감사합니다.</p>
                    <p>다음번에도 이용부탁드립니다.</p>
                </div>
                <img class="review-photo" src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=400&q=80" alt="호텔 사진">
                <div class="review-meta">
                    <div class="stay-info">
                        <i class="fas fa-bed"></i>
                        <span>이코노미 더블룸</span>
                        <span>•</span>
                        <span>나홀로 여행객</span>
                    </div>
                    <div class="review-actions">
                        <button class="action-btn">
                            <i class="far fa-thumbs-up"></i>도움이 됨<span class="count">(42)</span>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-thumbs-down"></i>도움이 되지 않음<span class="count">(5)</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="review-item">
                <div class="review-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <span class="hotel-name">비치 파라다이스 호텔</span>
                            <span class="user-name">김철수</span>
                        </div>
                    </div>
                    <div class="review-rating">
                        <div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-number">4.5</span>
                    </div>
                </div>
                <div class="review-content">
                    <p>위치가 좋고 직원분들이 친절했습니다. 객실도 깨끗하고 전망도 좋았어요.</p>
                </div>
                <img class="review-photo" src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=400&q=80" alt="호텔 사진">
                <div class="review-meta">
                    <div class="stay-info">
                        <i class="fas fa-bed"></i>
                        <span>디럭스 트윈룸</span>
                        <span>•</span>
                        <span>가족여행</span>
                    </div>
                    <div class="review-actions">
                        <button class="action-btn">
                            <i class="far fa-thumbs-up"></i>도움이 됨<span class="count">(28)</span>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-thumbs-down"></i>도움이 되지 않음<span class="count">(3)</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="review-item">
                <div class="review-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <span class="hotel-name">도쿄 비즈니스 호텔</span>
                            <span class="user-name">Sakura</span>
                        </div>
                    </div>
                    <div class="review-rating">
                        <div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-number">4.5</span>
                    </div>
                </div>
                <div class="review-content">
                    <p>スタッフがとても親切でした。部屋も清潔で快適でした。</p>
                </div>
                <img class="review-photo" src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=400&q=80" alt="호텔 사진">
                <div class="review-meta">
                    <div class="stay-info">
                        <i class="fas fa-bed"></i>
                        <span>싱글룸</span>
                        <span>•</span>
                        <span>나홀로 여행객</span>
                    </div>
                    <div class="review-actions">
                        <button class="action-btn">
                            <i class="far fa-thumbs-up"></i>도움이 됨<span class="count">(15)</span>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-thumbs-down"></i>도움이 되지 않음<span class="count">(2)</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="review-item">
                <div class="review-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <span class="hotel-name">런던 시티 호텔</span>
                            <span class="user-name">Emily</span>
                        </div>
                    </div>
                    <div class="review-rating">
                        <div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="rating-number">4.0</span>
                    </div>
                </div>
                <div class="review-content">
                    <p>The breakfast was delicious and the location was perfect for sightseeing.</p>
                </div>
                <img class="review-photo" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="호텔 사진">
                <div class="review-meta">
                    <div class="stay-info">
                        <i class="fas fa-bed"></i>
                        <span>스탠다드룸</span>
                        <span>•</span>
                        <span>커플 여행</span>
                    </div>
                    <div class="review-actions">
                        <button class="action-btn">
                            <i class="far fa-thumbs-up"></i>도움이 됨<span class="count">(10)</span>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-thumbs-down"></i>도움이 되지 않음<span class="count">(1)</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="review-item">
                <div class="review-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <span class="hotel-name">부산 해운대 호텔</span>
                            <span class="user-name">박지민</span>
                        </div>
                    </div>
                    <div class="review-rating">
                        <div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-number">4.5</span>
                    </div>
                </div>
                <div class="review-content">
                    <p>시설이 깔끔하고 조용해서 휴식하기 좋았습니다. 다음에도 또 이용하고 싶어요.</p>
                </div>
                <img class="review-photo" src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="호텔 사진">
                <div class="review-meta">
                    <div class="stay-info">
                        <i class="fas fa-bed"></i>
                        <span>프리미엄룸</span>
                        <span>•</span>
                        <span>친구와 여행</span>
                    </div>
                    <div class="review-actions">
                        <button class="action-btn">
                            <i class="far fa-thumbs-up"></i>도움이 됨<span class="count">(10)</span>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-thumbs-down"></i>도움이 되지 않음<span class="count">(1)</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination">
            <a href="#" class="arrow" aria-label="이전 페이지"><i class="fas fa-angle-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="arrow" aria-label="다음 페이지"><i class="fas fa-angle-right"></i></a>
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