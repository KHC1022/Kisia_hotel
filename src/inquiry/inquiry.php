<?php
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../action/inquiry_action.php';

$inquiry_list = $GLOBALS['inquiry_list'] ?? [];
$GLOBALS['total_pages'] = $total_pages;
$page = $GLOBALS['page'] ?? 1;
?>

<main class="inquiry-board-container">
    <div class="inquiry-board-header">
        <h1 class="inquiry-board-title">문의 게시판</h1>
    </div>

    <div class="hotels-search-sort-container">
        <form class="hotels-search-box" method="get" action="inquiry.php">
            <div class="hotels-search-row">
                <div class="hotels-search-input">
                    <i class="fas fa-search"></i>
                    <input class="hotels-search-input-input" type="text" name="keyword" placeholder="제목을 입력하세요" required>
                </div>
                <button class="style-search-btn" type="submit">검색</button>
            </div>
        </form>
        <div class="controls-row">
            <form method="get" action="inquiry.php" class="sort-form">
                <span class="sort-label">정렬:</span>
                <select name="sort" class="sort-select" onchange="this.form.submit()">
                    <option value="recent" <?= ($_GET['sort'] ?? '') === 'recent' ? 'selected' : '' ?>>최신순</option>
                    <option value="old" <?= ($_GET['sort'] ?? '') === 'old' ? 'selected' : '' ?>>오래된순</option>
                </select>
                <?php if (!empty($_GET['keyword'])): ?>
                    <input type="hidden" name="keyword" value="<?= $_GET['keyword'] ?>">
                <?php endif; ?>
            </form>
            <a href="inquiry-write.php" class="write-btn">문의하기</a>
        </div>
    </div>

    <table class="inquiry-board-table">
        <thead>
            <tr>
                <th style="width: 10%">번호</th>
                <th style="width: 10%">분류</th>
                <th style="width: 35%">제목</th>
                <th style="width: 15%">작성자</th>
                <th style="width: 15%">작성일</th>
                <th style="width: 15%">답변여부</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total_inquiries = $GLOBALS['totalInquiries'] ?? 0; // 추가 필요
                $display_num = $total_inquiries - ($page - 1) * $limit;

                foreach ($inquiry_list as $inquiry): ?>
                <tr>
                    <td><?= $display_num-- ?></td>
                    <td><?= $inquiry['category'] ?></td>
                    <td>
                        <?php if ($inquiry['is_secret']): ?>
                            <span class="lock-icon">🔒</span>
                        <?php endif; ?>
                        <a href="inquiry_detail.php?inquiry_id=<?= $inquiry['inquiry_id'] ?>">
                            <?= $inquiry['title'] ?>
                        </a>
                    </td>
                    <td><?= $inquiry['username'] ?></td>
                    <td><?= $inquiry['created_at'] ?></td>
                    <td>
                        <?php if ($inquiry['response']): ?>
                            <span class="status-complete">답변완료</span>
                        <?php else: ?>
                            <span class="status-pending">미답변</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php 
    include_once __DIR__ . '/../includes/pagination.php';
    pagination($total_inquiries, $limit);
    ?>
</main>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>