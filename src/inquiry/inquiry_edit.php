<?php
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../action/login_check.php';

$inquiry_id = $_GET['inquiry_id'] ?? 0;
$inquiry_id = (int)$inquiry_id;

$sql = "SELECT * FROM inquiries WHERE inquiry_id = $inquiry_id";
$result = mysqli_query($conn, $sql);
$inquiry = mysqli_fetch_assoc($result);

?>
    <main class="inquiry-board-container">
        <div class="inquiry-form-container">
            <div class="hotel-add-admin-header" style="margin-top: 4rem;">
                <h1 class="hotel-add-admin-title" style="color:black;">문의 수정</h1>
            </div>
            <form class="inquiry-form" method="post" action="../action/inquiry_edit_action.php" enctype="multipart/form-data">
                <input type="hidden" name="inquiry_id" value="<?= $inquiry['inquiry_id'] ?>">

                <div class="inquiry-form-group">
                    <label for="category">분류</label>
                    <select id="category" name="category" required>
                        <option value="">분류 선택</option>
                        <option value="reservation" <?= $inquiry['category'] === 'reservation' ? 'selected' : '' ?>>예약</option>
                        <option value="payment" <?= $inquiry['category'] === 'payment' ? 'selected' : '' ?>>결제 및 환불</option>
                        <option value="room" <?= $inquiry['category'] === 'room' ? 'selected' : '' ?>>객실</option>
                        <option value="other" <?= $inquiry['category'] === 'other' ? 'selected' : '' ?>>기타</option>
                    </select>
                </div>

                <div class="inquiry-form-group">
                    <label for="title">제목</label>
                    <input type="text" id="title" name="title" value="<?= $inquiry['title'] ?>" required>
                </div>

                <div class="inquiry-form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" required><?= $inquiry['content'] ?></textarea>
                </div>

                <div class="inquiry-form-group">
                    <label for="files">파일 첨부 (선택)</label>
                    <input type="file" id="files" name="files[]" multiple>
                </div>

                <div class="inquiry-form-actions">
                    <a href="inquiry_detail.php?inquiry_id=<?= $inquiry['inquiry_id'] ?>" class="inquiry-write-btn inquiry-cancel-btn">취소</a>
                    <button type="submit" class="inquiry-write-btn">수정 완료</button>
                </div>
            </form>
        </div>
    </main>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
