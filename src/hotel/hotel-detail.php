<?php 
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/hotel_detail_info.php';
?>

    <main class="hotel-detail-container">
        <div class="hotel-header">
            <div class="hotel-gallery">
                <div class="main-image">
                    <img src="<?php echo $hotel_main_image; ?>" alt="호텔 메인 이미지">
                </div>
                <div class="thumbnail-images">
                    <img src="<?php echo $hotel_detail_image_1; ?>" alt="호텔 이미지 1">
                    <img src="<?php echo $hotel_detail_image_2; ?>" alt="호텔 이미지 2">
                    <img src="<?php echo $hotel_detail_image_3; ?>" alt="호텔 이미지 3">
                    <img src="<?php echo $hotel_detail_image_4; ?>" alt="호텔 이미지 4">
                </div>
            </div>
            <div class="hotel-info">
                <h1 class="hotel-name"><?php echo $hotel_name; ?></h1>
                <div class="hotel-rating">
                    <div class="stars">
                        <?php
                            $fullStars = floor($hotel_rating);
                            $emptyStars = 5 - $fullStars;
                            
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="far fa-star"></i>';
                            }
                        ?>
                        <span><?php echo $hotel_rating; ?></span>
                    </div>
                    <span class="review-count">(<?php echo $review_count; ?>개 후기)</span>
                </div>
                <div class="hotel-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php echo $hotel_location; ?>
                </div>
                <div class="hotel-features">
                    <?php if ($hotel_facilities['pool']) : ?><span class="feature">수영장</span><?php endif; ?>
                    <?php if ($hotel_facilities['spa']) : ?><span class="feature">스파</span><?php endif; ?>
                    <?php if ($hotel_facilities['fitness']) : ?><span class="feature">피트니스</span><?php endif; ?>
                    <?php if ($hotel_facilities['restaurant']) : ?><span class="feature">레스토랑</span><?php endif; ?>
                    <?php if ($hotel_facilities['parking']) : ?><span class="feature">주차</span><?php endif; ?>
                    <?php if ($hotel_facilities['wifi']) : ?><span class="feature">와이파이</span><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="hotel-content">
            <div class="main-content">
                <section class="description">
                    <h2>호텔 소개</h2>
                    <p><?php echo str_replace('.', '.<br>', $hotel_description); ?></p>
                </section>

                <section class="facilities">
                    <h2>편의시설</h2>
                    <div class="facility-grid">
                        <?php if ($hotel_facilities['pool']) : ?>
                        <div class="facility-item">
                            <i class="fas fa-swimming-pool"></i>
                            <h3>수영장</h3>
                            <p>실내 수영장과 야외 수영장을 모두 이용하실 수 있습니다.</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($hotel_facilities['spa']) : ?>
                        <div class="facility-item">
                            <i class="fas fa-spa"></i>
                            <h3>스파</h3>
                            <p>전문 테라피스트가 제공하는 다양한 마사지와 트리트먼트를 즐기실 수 있습니다.</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($hotel_facilities['fitness']) : ?>
                        <div class="facility-item">
                            <i class="fas fa-dumbbell"></i>
                            <h3>피트니스 센터</h3>
                            <p>최신식 운동기구와 전문 트레이너가 상주하는 피트니스 센터입니다.</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($hotel_facilities['restaurant']) : ?>
                        <div class="facility-item">
                            <i class="fas fa-utensils"></i>
                            <h3>레스토랑</h3>
                            <p>미슐랭 스타 셰프가 운영하는 고급 레스토랑에서 다양한 요리를 즐기실 수 있습니다.</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($hotel_facilities['parking']) : ?>
                        <div class="facility-item">
                            <i class="fas fa-parking"></i>
                            <h3>주차</h3>
                            <p>여유 있는 주차 공간이 준비되어 있습니다.</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($hotel_facilities['wifi']) : ?>
                        <div class="facility-item">
                            <i class="fas fa-wifi"></i>
                            <h3>와이파이</h3>
                            <p>무료 Wi-Fi를 이용하실 수 있습니다.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>

                <section class="rooms">
                    <h2>객실 타입</h2>
                    <div class="room-grid">
                        <?php foreach ($hotel_rooms_deluxe as $deluxe) : ?>
                        <div class="room-card">
                            <img src="<?php echo $deluxe['rooms_image']; ?>" alt="디럭스 룸">
                            <div class="room-info">
                                <h3>디럭스 룸</h3>
                                <p>최대 <?php echo $deluxe['max_person']; ?>인 / 35㎡</p>
                                <ul class="room-features">
                                    <li><i class="fas fa-bed"></i> 킹 사이즈 베드</li>
                                    <li><i class="fas fa-wifi"></i> 무료 Wi-Fi</li>
                                    <li><i class="fas fa-tv"></i> 55인치 스마트 TV</li>
                                    <li><i class="fas fa-coffee"></i> 커피/티 메이커</li>
                                </ul>
                                <div class="room-price">
                                    <span class="price">₩<?php echo $deluxe['price']; ?></span>
                                    <span class="per-night">/ 박</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php foreach ($hotel_rooms_suite as $suite) : ?>
                        <div class="room-card">
                            <img src="<?php echo $suite['rooms_image']; ?>" alt="스위트 룸">
                            <div class="room-info">
                                <h3>스위트 룸</h3>
                                <p>최대 <?php echo $suite['max_person']; ?>인 / 65㎡</p>
                                <ul class="room-features">
                                    <li><i class="fas fa-bed"></i> 킹 사이즈 베드 + 소파베드</li>
                                    <li><i class="fas fa-wifi"></i> 무료 Wi-Fi</li>
                                    <li><i class="fas fa-tv"></i> 65인치 스마트 TV</li>
                                    <li><i class="fas fa-hot-tub"></i> 스파 욕조</li>
                                </ul>
                                <div class="room-price">
                                    <span class="price">₩<?php echo $suite['price']; ?></span>
                                    <span class="per-night">/ 박</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="reviews">
                    <h2>후기</h2>
                    <div class="review-list">
                        <?php foreach ($reviews as $review) : ?>
                        <div class="review-card">
                            <div class="reviewer-info">
                                <img src="<?php echo $review['profile_image'] ?>" alt="Reviewer">
                                <div class="reviewer-details">
                                    
                                    <div class="review-rating">
                                        <div class="stars">
                                        <div class="reviewer-name"><?php echo $review['username']; ?></div>
                                            <?php
                                                $fullStars = floor($review['rating']);
                                                $emptyStars = 5 - $fullStars;
                                                
                                                for ($i = 0; $i < $fullStars; $i++) {
                                                    echo '<i class="fas fa-star"></i>';
                                                }
                                                for ($i = 0; $i < $emptyStars; $i++) {
                                                    echo '<i class="far fa-star"></i>';
                                                }
                                            ?>
                                            <span><?php echo $review['rating']; ?></span>
                                        </div>
                                        <div class="review-date"><?php echo $review['created_at']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-text">
                                <?php echo $review['content']; ?>
                            </div>
                            <div class="detail-review-actions" style="margin-left: 25rem;">
                                <a href="../action/helpful_action.php?review_id=<?php echo $review['review_id']; ?>&action=helpful&hotel_id=<?php echo $hotel_id; ?>" class="action-btn">
                                    <i class="far fa-thumbs-up"></i>도움이 됨<span class="count">(<?php echo $review['count_is_helpful']; ?>)</span>
                                </a>
                                <a href="../action/helpful_action.php?review_id=<?php echo $review['review_id']; ?>&action=not_helpful&hotel_id=<?php echo $hotel_id; ?>" class="action-btn">
                                    <i class="far fa-thumbs-down"></i>도움이 되지 않음<span class="count">(<?php echo $review['count_is_not_helpful']; ?>)</span>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>

            <div class="sidebar">
                <div class="booking-widget">
                    <h2>객실 예약</h2>
                    <form class="booking-form" action="../user/payment.php" method="get">
                        <input type="hidden" name="id" value="<?= $hotel_id ?>">
                        <div class="form-group">
                            <label for="check-in">체크인</label>
                            <input type="date" id="check-in" name="checkin" value="<?= isset($_GET['checkin']) ? $_GET['checkin'] : '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="check-out">체크아웃</label>
                            <input type="date" id="check-out" name="checkout" value="<?= isset($_GET['checkout']) ? $_GET['checkout'] : '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="guests">인원</label>
                            <input type="number" id="guests" name="guests" value="<?= isset($_GET['guests']) ? (int)$_GET['guests'] : 1 ?>" min="1" max="4" required>
                        </div>
                        <div class="form-group">
                            <label for="room-type">객실 타입</label>
                            <select id="room-type" name="room_type">
                                <option value="deluxe">디럭스 룸</option>
                                <option value="suite">스위트 룸</option>
                            </select>
                        </div>
                        <button type="submit" class="book-now-btn">예약하기</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
    document.querySelector('.booking-form').addEventListener('submit', function () {
    document.getElementById('hidden-checkin').value = document.getElementById('check-in').value;
    document.getElementById('hidden-checkout').value = document.getElementById('check-out').value;
    document.getElementById('hidden-guests').value = document.getElementById('guests').value;
    document.getElementById('hidden-room-type').value = document.getElementById('room-type').value;
    });
    </script>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 