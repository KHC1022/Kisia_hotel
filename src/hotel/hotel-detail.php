<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="hotel-detail-container">
        <div class="hotel-header">
            <div class="hotel-gallery">
                <div class="main-image">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80" alt="호텔 메인 이미지">
                </div>
                <div class="thumbnail-images">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=300&q=80" alt="호텔 이미지 1">
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=300&q=80" alt="호텔 이미지 2">
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=300&q=80" alt="호텔 이미지 3">
                    <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&w=300&q=80" alt="호텔 이미지 4">
                </div>
            </div>
            <div class="hotel-info">
                <h1 class="hotel-name">그랜드 럭셔리 호텔</h1>
                <div class="hotel-rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="rating">4.5</span>
                    <span class="review-count">(203개 후기)</span>
                </div>
                <div class="hotel-location">
                    <i class="fas fa-map-marker-alt"></i>
                    뉴욕, 미국
                </div>
                <div class="hotel-features">
                    <span class="feature"><i class="fas fa-swimming-pool"></i> 수영장</span>
                    <span class="feature"><i class="fas fa-spa"></i> 스파</span>
                    <span class="feature"><i class="fas fa-dumbbell"></i> 피트니스</span>
                    <span class="feature"><i class="fas fa-utensils"></i> 레스토랑</span>
                    <span class="feature"><i class="fas fa-parking"></i> 주차</span>
                </div>
            </div>
        </div>

        <div class="hotel-content">
            <div class="main-content">
                <section class="description">
                    <h2>호텔 소개</h2>
                    <p>그랜드 럭셔리 호텔은 뉴욕의 중심부에 위치한 5성급 호텔입니다. 현대적인 디자인과 고급스러운 인테리어로 구성된 객실에서 뉴욕의 전경을 감상할 수 있습니다. 최고급 레스토랑, 스파, 피트니스 센터 등 다양한 편의시설을 갖추고 있으며, 모든 객실에서 무료 Wi-Fi를 이용하실 수 있습니다.</p>
                </section>

                <section class="facilities">
                    <h2>편의시설</h2>
                    <div class="facility-grid">
                        <div class="facility-item">
                            <i class="fas fa-swimming-pool"></i>
                            <h3>수영장</h3>
                            <p>실내 수영장과 야외 수영장을 모두 이용하실 수 있습니다.</p>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-spa"></i>
                            <h3>스파</h3>
                            <p>전문 테라피스트가 제공하는 다양한 마사지와 트리트먼트를 즐기실 수 있습니다.</p>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-dumbbell"></i>
                            <h3>피트니스 센터</h3>
                            <p>최신식 운동기구와 전문 트레이너가 상주하는 피트니스 센터입니다.</p>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-utensils"></i>
                            <h3>레스토랑</h3>
                            <p>미슐랭 스타 셰프가 운영하는 고급 레스토랑에서 다양한 요리를 즐기실 수 있습니다.</p>
                        </div>
                    </div>
                </section>

                <section class="rooms">
                    <h2>객실 타입</h2>
                    <div class="room-grid">
                        <div class="room-card">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=500&q=80" alt="디럭스 룸">
                            <div class="room-info">
                                <h3>디럭스 룸</h3>
                                <p>최대 2인 / 35㎡</p>
                                <ul class="room-features">
                                    <li><i class="fas fa-bed"></i> 킹 사이즈 베드</li>
                                    <li><i class="fas fa-wifi"></i> 무료 Wi-Fi</li>
                                    <li><i class="fas fa-tv"></i> 55인치 스마트 TV</li>
                                    <li><i class="fas fa-coffee"></i> 커피/티 메이커</li>
                                </ul>
                                <div class="room-price">
                                    <span class="price">₩250,000</span>
                                    <span class="per-night">/ 박</span>
                                </div>
                            </div>
                        </div>
                        <div class="room-card">
                            <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=500&q=80" alt="스위트 룸">
                            <div class="room-info">
                                <h3>스위트 룸</h3>
                                <p>최대 4인 / 65㎡</p>
                                <ul class="room-features">
                                    <li><i class="fas fa-bed"></i> 킹 사이즈 베드 + 소파베드</li>
                                    <li><i class="fas fa-wifi"></i> 무료 Wi-Fi</li>
                                    <li><i class="fas fa-tv"></i> 65인치 스마트 TV</li>
                                    <li><i class="fas fa-hot-tub"></i> 스파 욕조</li>
                                </ul>
                                <div class="room-price">
                                    <span class="price">₩450,000</span>
                                    <span class="per-night">/ 박</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="reviews">
                    <h2>후기</h2>
                    <div class="review-summary">
                        <div class="overall-rating">
                            <div class="stars">★★★★★</div>
                            <div class="rating">4.8</div>
                            <div class="total-reviews">(1,234 reviews)</div>
                        </div>
                    </div>
                    <div class="review-list">
                        <div class="review-card">
                            <div class="reviewer-info">
                                <img src="https://via.placeholder.com/50" alt="Reviewer">
                                <div class="reviewer-details">
                                    <div class="reviewer-name">김민수</div>
                                    <div class="review-rating">
                                        <div class="stars">★★★★★</div>
                                        <div class="review-date">2024.03.15</div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-text">
                                정말 멋진 숙박이었습니다! 객실이 넓고 깨끗했으며, 도시의 아름다운 전망을 감상할 수 있었습니다. 직원분들이 매우 친절하게 대해주셔서 잊지 못할 추억을 만들 수 있었습니다. 꼭 추천드립니다!
                            </div>
                            <div class="review-actions">
                                <button class="like-button">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>도움이 되었어요</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="review-card">
                            <div class="reviewer-info">
                                <img src="https://via.placeholder.com/50" alt="Reviewer">
                                <div class="reviewer-details">
                                    <div class="reviewer-name">이지은</div>
                                    <div class="review-rating">
                                        <div class="stars">★★★★☆</div>
                                        <div class="review-date">2024.03.08</div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-text">
                                위치가 좋고 객실이 편안했습니다. 조식 뷔페는 다양한 메뉴로 구성되어 있어서 훌륭했습니다. 유일한 단점은 피크 시간대에 엘리베이터가 조금 느렸다는 점입니다.
                            </div>
                            <div class="review-actions">
                                <button class="like-button">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>도움이 되었어요</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="load-more-reviews">
                        <button class="load-more-btn">리뷰 더 보기</button>
                    </div>
                </section>
            </div>

            <div class="sidebar">
                <div class="booking-widget">
                    <h3>객실 예약</h3>
                    <form class="booking-form" action="../user/payment.php">
                        <div class="form-group">
                            <label for="check-in">체크인</label>
                            <input type="date" id="check-in" required>
                        </div>
                        <div class="form-group">
                            <label for="check-out">체크아웃</label>
                            <input type="date" id="check-out" required>
                        </div>
                        <div class="form-group">
                            <label for="guests">인원</label>
                            <input type="number" id="guests" name="guests" value="1" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="room-type">객실 타입</label>
                            <select id="room-type" required>
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

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 