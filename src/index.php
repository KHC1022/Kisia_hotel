<?php 
include_once __DIR__ . '/includes/header.php';
?>

    <main>
        <section class="style-hero">
            <div class="style-search-container">
                <h1>완벽한 숙소를 찾아보세요</h1>
                <div class="style-search-box">
                    <div class="style-search-input">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="어디로 가시나요?">
                    </div>
                    <div class="style-search-input">
                        <i class="fas fa-calendar"></i>
                        <input type="date" placeholder="체크인 날짜">
                    </div>
                    <div class="style-search-input">
                        <i class="fas fa-calendar"></i>
                        <input type="date" placeholder="체크아웃 날짜">
                    </div>
                    <div class="style-search-input">
                        <i class="fas fa-user"></i>
                        <input type="number" placeholder="게스트 수" min="1" max="10">
                    </div>
                    <button class="style-search-btn">검색</button>
                </div>
                <div id="searchResults" class="search-results"></div>
            </div>
        </section>

        <section class="style-featured-hotels">
            <h2>추천 호텔</h2>
            <div class="style-hotel-grid">
                <div class="style-hotel-card">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="럭셔리 호텔">
                    <div class="style-hotel-info">
                        <h3>그랜드 럭셔리 호텔</h3>
                        <p class="style-location"><i class="fas fa-map-marker-alt"></i> 뉴욕, 미국</p>
                        <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                        <div class="style-price">
                        ₩250,000 <span class="price-per-night">/ 박</span>
                        </div>
                        <a href="./hotel/hotel-detail.php?hotel=grand-luxury" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
                <div class="style-hotel-card">    
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="비치 리조트">
                    <div class="style-hotel-info">
                        <h3>비치 파라다이스 리조트</h3>
                        <p class="style-location"><i class="fas fa-map-marker-alt"></i> 마이애미, 미국</p>
                        <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <div class="style-price">
                        ₩300,000 <span class="price-per-night">/ 박</span>
                        </div>
                        <a href="./hotel/hotel-detail.php?hotel=beach-paradise" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
                <div class="style-hotel-card">
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="마운틴 뷰 호텔">
                    <div class="style-hotel-info">
                        <h3>마운틴 뷰 호텔</h3>
                        <p class="style-location"><i class="fas fa-map-marker-alt"></i> 덴버, 미국</p>
                        <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <div class="style-price">
                        ₩450,000 <span class="price-per-night">/ 박</span>
                        </div>
                        <a href="./hotel/hotel-detail.php?hotel=mountain-view" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="style-benefits">
            <h2>이벤트 & 프로모션</h2>
            <div class="style-benefits-grid">
                <a href="event/event-review.php" class="style-benefit-card">
                    <i class="fas fa-gift"></i>
                    <h3>의견 남기고 선물 받자!</h3>
                    <p>KISIA HOTEL 이용 소감을 댓글로 남기면 추첨을 통해 특별 선물 증정</p>
                    <span class="style-event-date">2025년 5월 1일 ~ 5월 30일</span>
                    <span class="style-benefit-link">자세히 보기 <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="event/event-timedeal.php" class="style-benefit-card">
                    <i class="fas fa-percent"></i>
                    <h3>부산 호텔 타임딜</h3>
                    <p>오늘만 부산 호텔 40% 할인</p>
                    <span class="style-event-date">오늘 자정까지</span>
                    <span class="style-benefit-link">자세히 보기 <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="event/event-japan.php" class="style-benefit-card">
                    <i class="fas fa-hotel"></i>
                    <h3>일본 호텔 단독 특가</h3>
                    <p>도쿄, 오사카, 후쿠오카 등 일본 전역 호텔 20% 할인</p>
                    <span class="style-event-date">2025년 4월 1일 ~ 6월 30일</span>
                    <span class="style-benefit-link">자세히 보기 <i class="fas fa-arrow-right"></i></span>
                </a>
            </div>
        </section>
    </main>

<?php include_once __DIR__ . '/includes/footer.php'; ?> 