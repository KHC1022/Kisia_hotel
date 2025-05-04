<?php 
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/hotels_info.php';
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
                        <option value="many_reviews">후기 많은순</option>
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
                                        <input type="checkbox" value="pool">
                                        <span>수영장</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="spa">
                                        <span>스파</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="fitness">
                                        <span>피트니스</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="restaurant">
                                        <span>레스토랑</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="parking">
                                        <span>주차</span>
                                    </label>
                                    <label class="hotels-filter-option">
                                        <input type="checkbox" value="wifi">
                                        <span>와이파이</span>
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
            <?php foreach ($current_hotels as $hotel): ?>
                <div class="style-hotel-card">
                    <img src="<?= $hotel['main_image'] ?>" alt="<?= $hotel['name'] ?>" class="hotel-image">
                    <div class="style-hotel-info">
                        <h3 class="hotels-name"><?= $hotel['name'] ?></h3>
                        <p class="style-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <?= $hotel['location'] ?>
                        </p>
                        <div class="style-rating">
                            <?php
                            $fullStars = floor($hotel['rating']);
                            $emptyStars = 5 - $fullStars;
                            
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="far fa-star"></i>';
                            }
                            ?>
                            <span><?= $hotel['rating'] ?></span>
                        </div>
                        <div class="hotel-features">
                                <?php if ($hotel['pool']) : ?><span class="feature">수영장</span><?php endif; ?>
                                <?php if ($hotel['spa']) : ?><span class="feature">스파</span><?php endif; ?>
                                <?php if ($hotel['fitness']) : ?><span class="feature">피트니스</span><?php endif; ?>
                                <?php if ($hotel['restaurant']) : ?><span class="feature">레스토랑</span><?php endif; ?>
                                <?php if ($hotel['parking']) : ?><span class="feature">주차</span><?php endif; ?>
                                <?php if ($hotel['wifi']) : ?><span class="feature">와이파이</span><?php endif; ?>
                        </div>
                        <div class="style-price">
                            ₩<?= number_format($hotel['price_per_night']) ?> <span class="price-per-night">/ 박</span>
                        </div>
                        <div class="hotel-actions">
                            <a href="hotel-detail.php?id=<?= $hotel['hotel_id'] ?>" class="style-detail-btn">상세보기</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php 
            include_once __DIR__ . '/../includes/pagination.php';
            pagination($total_hotels, 9);
        ?>
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