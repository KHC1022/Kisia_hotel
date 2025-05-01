<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="hotels-container">
        <div class="hotels-header">
            <h1 class="hotels-title">호텔 목록</h1>
        </div>

        <div class="hotels-search-sort-container">
            <div class="hotels-search-box">
                <div class="hotels-search-row">
                    <div class="hotels-search-input">
                        <i class="fas fa-search"></i>
                        <input class="hotels-search-input-input" type="text" placeholder="호텔 이름 또는 위치를 입력하세요">
                    </div>
                    <button class="style-search-btn">검색</button>
                </div>
            </div>
            <div class="hotels-controls-row">
                <div class="hotels-sort-controls">
                    <span class="hotels-sort-label">정렬:</span>
                    <select class="hotels-sort-select">
                        <option value="price-low">가격 낮은순</option>
                        <option value="price-high">가격 높은순</option>
                        <option value="rating">평점순</option>
                        <option value="rating">후기 많은순</option>
                    </select>
                </div>
                <div class="hotels-filter-controls">
                    <div class="hotels-filter-group">
                        <button class="hotels-filter-toggle">
                            <span class="hotels-filter-label">필터</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="hotels-filter-dropdown">
                            <div class="hotels-filter-section">
                                <h4 class="hotels-filter-section-title">가격대</h4>
                                <div class="hotels-filter-options">
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="price-0-100000">
                                        <span>10만원 이하</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="price-100000-200000">
                                        <span>10-20만원</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="price-200000-300000">
                                        <span>20-30만원</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="price-300000-">
                                        <span>30만원 이상</span>
                                    </label>
                                </div>
                            </div>
                            <div class="hotels-filter-section">
                                <h4 class="hotels-filter-section-title">편의시설</h4>
                                <div class="hotels-filter-options">
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="facility-pool">
                                        <span>수영장</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="facility-spa">
                                        <span>스파</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="facility-gym">
                                        <span>피트니스</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="facility-restaurant">
                                        <span>레스토랑</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="facility-parking">
                                        <span>주차</span>
                                    </label>
                                </div>
                            </div>
                            <div class="hotels-filter-section">
                                <h4 class="hotels-filter-section-title">호텔 등급</h4>
                                <div class="hotels-filter-options">
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="grade-5">
                                        <span>5성급</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="grade-4">
                                        <span>4성급</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="grade-3">
                                        <span>3성급</span>
                                    </label>
                                </div>
                            </div>
                            <div class="hotels-filter-actions">
                                <button class="hotels-reset-button">초기화</button>
                                <button class="hotels-apply-button">적용</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="style-hotel-grid">
            <!-- 호텔 카드 1 -->
            <div class="style-hotel-card">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=500&q=60" alt="그랜드 럭셔리 호텔" class="hotel-image">
                <div class="style-hotel-info">
                    <h3 class="hotels-name">그랜드 럭셔리 호텔</h3>
                    <p class="style-location">
                        <i class="fas fa-map-marker-alt"></i>
                        뉴욕, 미국
                    </p>
                    <div class="hotel-features">
                        <span class="feature">수영장</span>
                        <span class="feature">스파</span>
                        <span class="feature">피트니스</span>
                    </div>
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
                    <div class="hotel-actions">
                        <a href="hotel-detail.php?hotel=paradise" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
            </div>

            <!-- 호텔 카드 2 -->
            <div class="style-hotel-card">
                <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=500&q=60" alt="비치 파라다이스 호텔" class="hotel-image">
                <div class="style-hotel-info">
                    <h3 class="hotels-name">비치 파라다이스 호텔</h3>
                    <p class="style-location">
                        <i class="fas fa-map-marker-alt"></i>
                        마이애미, 미국
                    </p>
                    <div class="hotel-features">
                        <span class="feature">해변</span>
                        <span class="feature">수영장</span>
                        <span class="feature">레스토랑</span>
                    </div>
                    <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                    <div class="style-price">
                        ₩300,000 <span class="price-per-night">/ 박</span>
                    </div>
                    <div class="hotel-actions">
                        <a href="hotel-detail.php?hotel=signiel" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
            </div>

            <!-- 호텔 카드 3 -->
            <div class="style-hotel-card">
                <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=500&q=60" alt="마운틴 뷰 호텔" class="hotel-image">
                <div class="style-hotel-info">
                    <h3 class="hotels-name">마운틴 뷰 호텔</h3>
                    <p class="style-location">
                        <i class="fas fa-map-marker-alt"></i>
                        덴버, 미국
                    </p>
                    <div class="hotel-features">
                        <span class="feature">스키</span>
                        <span class="feature">온천</span>
                        <span class="feature">바베큐</span>
                    </div>
                    <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                    <div class="style-price">
                        ₩200,000 <span class="price-per-night">/ 박</span>
                    </div>
                    <div class="hotel-actions">
                        <a href="hotel-detail.php?hotel=parkhyatt" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
            </div>

            <!-- 호텔 카드 4 -->
            <div class="style-hotel-card">
                <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&w=500&q=60" alt="시티 센터 호텔" class="hotel-image">
                <div class="style-hotel-info">
                    <h3 class="hotels-name">시티 센터 호텔</h3>
                    <p class="style-location">
                        <i class="fas fa-map-marker-alt"></i>
                        서울, 대한민국
                    </p>
                    <div class="hotel-features">
                        <span class="feature">비즈니스</span>
                        <span class="feature">레스토랑</span>
                        <span class="feature">주차</span>
                    </div>
                    <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                    </div>
                    <div class="style-price">
                        ₩180,000 <span class="price-per-night">/ 박</span>
                    </div>
                    <div class="hotel-actions">
                        <a href="hotel-detail.php?hotel=paradise" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
            </div>

            <!-- 호텔 카드 5 -->
            <div class="style-hotel-card">
                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=500&q=60" alt="오션 뷰 리조트" class="hotel-image">
                <div class="style-hotel-info">
                    <h3 class="hotels-name">오션 뷰 리조트</h3>
                    <p class="style-location">
                        <i class="fas fa-map-marker-alt"></i>
                        제주도, 대한민국
                    </p>
                    <div class="hotel-features">
                        <span class="feature">해변</span>
                        <span class="feature">수영장</span>
                        <span class="feature">키즈존</span>
                    </div>
                    <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                    <div class="style-price">
                        ₩280,000 <span class="price-per-night">/ 박</span>
                    </div>
                    <div class="hotel-actions">
                        <a href="hotel-detail.php?hotel=signiel" class="style-detail-btn">상세보기</a>
                    </div>
                </div>
            </div>

            <!-- 호텔 카드 6 -->
            <div class="style-hotel-card">
                <img src="https://images.unsplash.com/photo-1445019980597-93fa8acb246c?auto=format&fit=crop&w=500&q=60" alt="히스토릭 팰리스 호텔" class="hotel-image">
                <div class="style-hotel-info">
                    <h3 class="hotels-name">히스토릭 팰리스 호텔</h3>
                    <p class="style-location">
                        <i class="fas fa-map-marker-alt"></i>
                        파리, 프랑스
                    </p>
                    <div class="hotel-features">
                        <span class="feature">역사적 건물</span>
                        <span class="feature">미슐랭</span>
                        <span class="feature">스파</span>
                    </div>
                    <div class="style-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                    </div>
                    <div class="style-price">
                        ₩450,000 <span class="price-per-night">/ 박</span>
                    </div>
                    <div class="hotel-actions">
                        <a href="hotel-detail.php?hotel=parkhyatt" class="style-detail-btn">상세보기</a>
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

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterToggle = document.querySelector('.hotels-filter-toggle');
            const filterDropdown = document.querySelector('.hotels-filter-dropdown');

            filterToggle.addEventListener('click', function() {
                this.classList.toggle('active');
                filterDropdown.classList.toggle('active');
            });

            // 필터 드롭다운 외부 클릭 시 닫기
            document.addEventListener('click', function(event) {
                if (!filterToggle.contains(event.target) && !filterDropdown.contains(event.target)) {
                    filterToggle.classList.remove('active');
                    filterDropdown.classList.remove('active');
                }
            });

            // 초기화 버튼 클릭 시 모든 체크박스 해제
            const resetButton = document.querySelector('.hotels-reset-button');
            resetButton.addEventListener('click', function() {
                const checkboxes = filterDropdown.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
            });
        });
    </script>
</body>
</html> 