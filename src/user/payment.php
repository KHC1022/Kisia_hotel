<?php 
include_once __DIR__ . '/../action/payment_action.php';
include_once __DIR__ . '/../includes/header.php';
?>
    <main class="payment-container">
        <div class="payment-content">
            <!-- 예약 정보 -->
            <div class="booking-summary">
                <h2>예약 정보</h2>
                <div class="summary-card">
                    <div class="hotel-info">
                        <h3><?= $hotel['name'] ?></h3>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> <?=$hotel['location'] ?></p>
                    </div>
                    <div class="booking-details">
                        <div class="detail-item">
                            <span class="label">체크인</span>
                            <span class="value"><?= $checkin ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">체크아웃</span>
                            <span class="value"><?= $checkout ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">객실</span>
                            <span class="value"><?= $room_type === 'deluxe' ? '디럭스 룸' : '스위트 룸' ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">인원</span>
                            <span class="value"><?= $guests ?>명</span>
                        </div>
                    </div>
                    <div class="price-summary">
                        <div class="price-item">
                            <span class="label">객실 요금 (<?= $days ?>박)</span>
                            <span class="value">₩<?= number_format($room_fee) ?></span>
                        </div>
                        <div class="price-item">
                            <span class="label">세금 및 수수료</span>
                            <span class="value">₩<?= number_format($tax) ?></span>
                        </div>
                        <div class="price-item total">
                            <span class="label">총 결제 금액</span>
                            <span class="value">₩<?= number_format($total_price) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 포인트 결제 폼 -->
            <div class="payment-form">
                <h2>포인트 결제</h2>
                <form action="../action/point_pay_action.php" method="get">
                    <div class="form-group">
                        <label>보유 포인트</label>
                        <p><?= number_format($users['point']) ?> P</p>
                    </div>
                    <div class="form-group">
                        <label>총 금액</label>
                        <span><?= number_format($total_price) ?> P</span>
                        <input type="hidden" name="charge_amount" value="<?= $total_price ?>">
                    </div>
                    <div class="terms-agreement">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">포인트 차감 및 예약에 동의합니다.</label>
                    </div>
                    <button type="submit" class="payment-btn">포인트로 결제하기</button>
                </form>
            </div>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>