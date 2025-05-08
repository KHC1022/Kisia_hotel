<?php
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

?>

<main class="admin-hotel-add-container">
    
    <form action="../action/hotel_add_action.php" method="POST" enctype="multipart/form-data" class="hotel-add-admin-form">
    <div class="hotel-add-admin-header">
        <a href="admin.php?tab=hotels" class="hotel-add-admin-back-btn"><i class="fas fa-arrow-left"></i> 목록으로 돌아가기</a>
        <h1 class="hotel-add-admin-title">호텔 추가</h1>
    </div>
        <div class="hotel-add-admin-form-group">
            <label for="name">호텔 이름</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="hotel-add-admin-form-group">
            <label for="location">위치</label>
            <input type="text" id="location" name="location" required>
        </div>

        <div class="hotel-add-admin-form-group">
            <label for="description">설명</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <div class="hotel-add-admin-form-group">
            <label for="price_per_night">1박 가격</label>
            <input type="number" id="price_per_night" name="price_per_night" min="0" required>
        </div>

        <div class="hotel-add-admin-form-group">
            <label>부대시설</label>
            <div class="hotel-add-admin-checkbox-group">
                <label>
                    <input type="checkbox" name="facilities[]" value="pool"> 수영장
                </label>
                <label>
                    <input type="checkbox" name="facilities[]" value="spa"> 스파
                </label>
                <label>
                    <input type="checkbox" name="facilities[]" value="fitness"> 피트니스
                </label>
                <label>
                    <input type="checkbox" name="facilities[]" value="restaurant"> 레스토랑
                </label>
                <label>
                    <input type="checkbox" name="facilities[]" value="parking"> 주차장
                </label>
                <label>
                    <input type="checkbox" name="facilities[]" value="wifi"> 와이파이
                </label>
            </div>
        </div>

        <div class="hotel-add-admin-files">
            <label for="files">메인 이미지</label>
            <input type="file" id="files" name="files[]" multiple>
            <label for="files">상세 이미지 1</label>
            <input type="file" id="files" name="files[]" multiple>
            <label for="files">상세 이미지 2</label>
            <input type="file" id="files" name="files[]" multiple>
            <label for="files">상세 이미지 3</label>
            <input type="file" id="files" name="files[]" multiple>
            <label for="files">상세 이미지 4</label>
            <input type="file" id="files" name="files[]" multiple>
        </div>

        <div class="hotel-add-admin-form-actions">
            <a href="admin.php?tab=hotels" class="hotel-add-admin-cancel-btn">취소</a>
            <button type="submit" class="hotel-add-admin-submit-btn">호텔 추가</button>
        </div>
    </form>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 