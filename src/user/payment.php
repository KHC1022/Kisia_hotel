<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="payment-container">
        <div class="payment-content">
            <div class="booking-summary">
                <h2>예약 정보</h2>
                <div class="summary-card">
                    <div class="hotel-info">
                        <h3>그랜드 럭셔리 호텔</h3>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> 뉴욕, 미국</p>
                    </div>
                    <div class="booking-details">
                        <div class="detail-item">
                            <span class="label">체크인</span>
                            <span class="value">2024-03-20</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">체크아웃</span>
                            <span class="value">2024-03-22</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">객실</span>
                            <span class="value">디럭스 룸</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">인원</span>
                            <span class="value">2명</span>
                        </div>
                    </div>
                    <div class="price-summary">
                        <div class="price-item">
                            <span>객실 요금 (2박)</span>
                            <span>₩500,000</span>
                        </div>
                        <div class="price-item">
                            <span>세금 및 수수료</span>
                            <span>₩50,000</span>
                        </div>
                        <div class="price-item total">
                            <span>총 결제 금액</span>
                            <span>₩550,000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment-form">
                <h2>결제 정보</h2>
                <form action="booking-confirmation.php">
                    <div class="form-group">
                        <label for="card-number">카드 번호</label>
                        <div class="card-input">
                            <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
                            <div class="card-icons">
                                <i class="fab fa-cc-visa"></i>
                                <i class="fab fa-cc-mastercard"></i>
                                <i class="fab fa-cc-amex"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="expiry-date">유효기간</label>
                            <input type="text" id="expiry-date" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" placeholder="123" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card-holder">카드 소유자 이름</label>
                        <input type="text" id="card-holder" placeholder="카드에 표시된 이름" required>
                    </div>

                    <div class="form-group">
                        <label for="email">이메일</label>
                        <input type="email" id="email" placeholder="receipt@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">휴대폰 번호</label>
                        <input type="tel" id="phone" placeholder="010-1234-5678" required>
                    </div>

                    <div class="terms-agreement">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">예약 및 결제 약관에 동의합니다.</label>
                    </div>

                    <button type="submit" class="payment-btn">결제하기</button>
                </form>
            </div>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 