<?php 
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../action/login_check.php';
?>

    <main class="inquiry-board-container">
        <div class="inquiry-board-header">
            <h1 class="inquiry-board-title">문의 작성</h1>
        </div>
        <div class="inquiry-form-container">
            <form class="inquiry-form">
                <div class="inquiry-form-group">
                    <label for="category">분류</label>
                    <select id="category" name="category" required>
                        <option value="">분류 선택</option>
                        <option value="예약">예약</option>
                        <option value="결제">결제</option>
                        <option value="객실">객실</option>
                        <option value="기타">기타</option>
                    </select>
                </div>
                <div class="inquiry-form-group">
                    <label for="title">제목</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="inquiry-form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <div class="file-input-container">
                    <label for="file">사진 첨부</label>
                    <div class="file-input-box">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>이미지를 업로드하려면 여기를 클릭하세요</p>
                        <p class="text-muted">또는 파일을 여기에 드래그하세요</p>
                        <input type="file" id="photos" name="photos" multiple accept="image/*">
                    </div>
                </div>
                <div class="inquiry-form-actions">
                    <a href="inquiry.php" class="inquiry-write-btn inquiry-cancel-btn">취소</a>
                    <button type="submit" class="inquiry-write-btn">등록</button>
                </div>
            </form>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 