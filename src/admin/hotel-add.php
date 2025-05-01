<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="admin-container">
        <div class="admin-sidebar">
            <h2>관리자 메뉴</h2>
            <ul class="admin-menu">
                <li data-tab="members" onclick="window.location.href='admin.php?tab=members'">
                    <i class="fas fa-users"></i>
                    회원 관리
                </li>
                <li class="active" data-tab="hotels" onclick="window.location.href='admin.php?tab=hotels'">
                    <i class="fas fa-hotel"></i>
                    호텔 관리
                </li>
                <li data-tab="reservations" onclick="window.location.href='admin.php?tab=reservations'">
                    <i class="fas fa-calendar-check"></i>
                    예약 관리
                </li>
                <li data-tab="reviews" onclick="window.location.href='admin.php?tab=reviews'">
                    <i class="fas fa-star"></i>
                    후기 관리
                </li>
                <li data-tab="inquiries" onclick="window.location.href='admin.php?tab=inquiries'">
                    <i class="fas fa-question-circle"></i>
                    문의 관리
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <div class="section-header">
                <h2>호텔 추가</h2>
                <a href="admin.php?tab=hotels" class="back-btn"><i class="fas fa-arrow-left"></i> 목록으로 돌아가기</a>
            </div>

            <form id="hotelAddForm" class="admin-form">
                <div class="admin-form-group">
                    <label for="hotelName">호텔 이름</label>
                    <input type="text" id="hotelName" name="hotelName" required>
                </div>

                <div class="admin-form-group">
                    <label for="location">위치</label>
                    <input type="text" id="location" name="location" required>
                </div>

                <div class="admin-form-group">
                    <label for="description">설명</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                </div>

                <div class="admin-form-group">
                    <label for="amenities">편의시설</label>
                    <div class="admin-checkbox-group">
                        <label><input type="checkbox" name="amenities" value="wifi"> 무선 인터넷</label>
                        <label><input type="checkbox" name="amenities" value="parking"> 주차장</label>
                        <label><input type="checkbox" name="amenities" value="pool"> 수영장</label>
                        <label><input type="checkbox" name="amenities" value="gym"> 피트니스 센터</label>
                        <label><input type="checkbox" name="amenities" value="restaurant"> 레스토랑</label>
                        <label><input type="checkbox" name="amenities" value="spa"> 스파</label>
                    </div>
                </div>

                <div class="admin-form-group">
                    <label for="images">호텔 이미지 추가</label>
                    <div class="file-input-container">
                        <div class="file-input-box">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>이미지를 업로드하려면 여기를 클릭하세요</p>
                            <p class="text-muted">또는 파일을 여기에 드래그하세요</p>
                            <input type="file" id="images" name="images" multiple accept="image/*">
                        </div>
                    </div>
                    <div class="image-preview" id="imagePreview"></div>
                </div>

                <div class="admin-form-group">
                    <label for="roomTypes">객실 유형</label>
                    <div id="roomTypes">
                        <div class="room-type">
                            <input type="text" placeholder="객실 유형" required>
                            <input type="number" placeholder="가격" required>
                            <input type="number" placeholder="최대 인원" required>
                            <button type="button" class="remove-room">삭제</button>
                        </div>
                    </div>
                    <button type="button" class="add-room-btn">객실 유형 추가</button>
                </div>

                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="window.location.href='admin.php?tab=hotels'">취소</button>
                    <button type="submit" class="submit-btn">호텔 추가</button>
                </div>
            </form>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 