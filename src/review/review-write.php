<?php 
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../action/login_check.php';
?>

    <main class="board-container">
        <div class="board-header">
            <h1 class="board-title">후기 작성</h1>
        </div>
        <div class="form-container">
            <form class="inquiry-form">
                <div class="inquiry-form-group">
                    <label for="hotel">호텔 이름</label>
                    <input type="text" id="hotelName" name="hotelName" required>
                </div>
                <div class="inquiry-form-group">
                    <label for="room">객실 유형</label>
                    <select id="room" name="room" required>
                        <option value="">객실 유형 선택</option>
                        <option value="economy-double">이코노미 더블룸</option>
                        <option value="deluxe-double">디럭스 더블룸</option>
                        <option value="suite">스위트룸</option>
                    </select>
                </div>
                <div class="inquiry-form-group">
                    <label for="travel-type">여행 유형</label>
                    <select id="travel-type" name="travel-type" required>
                        <option value="">여행 유형 선택</option>
                        <option value="solo">나홀로 여행객</option>
                        <option value="couple">커플</option>
                        <option value="family">가족</option>
                        <option value="business">비즈니스</option>
                    </select>
                </div>
                <div class="inquiry-form-group">
                    <label for="rating">평점</label>
                    <select id="rating" name="rating" required>
                        <option value="">평점 선택</option>
                        <option value="0.0">0.0</option>
                        <option value="0.5">0.5</option>
                        <option value="1.0">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.0</option>
                        <option value="4.5">4.5</option>
                        <option value="5.0">5.0</option>
                    </select>
                </div>
                <div class="inquiry-form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <div class="file-input-container">
                    <label for="photos">사진 첨부</label>
                    <div class="inquiry-form-group">
                        <input type="file" id="files" name="files[]" multiple>
                    </div>
                </div>
                <div class="inquiry-form-actions">
                    <a href="review.php" class="inquiry-write-btn inquiry-cancel-btn">취소</a>
                    <button type="submit" class="inquiry-write-btn">등록</button>
                </div>
            </form>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 