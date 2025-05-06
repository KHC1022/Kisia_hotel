<?php 
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/info_for_admin.php';
?>

    <main class="admin-container">
        <div class="admin-sidebar">
            <h2>관리자 메뉴</h2>
            <ul class="admin-menu">
                <li class="active" data-tab="users">
                    <i class="fas fa-users"></i>
                    회원 관리
                </li>
                <li data-tab="hotels">
                    <i class="fas fa-hotel"></i>
                    호텔 관리
                </li>
                <li data-tab="reservations">
                    <i class="fas fa-calendar-check"></i>
                    예약 관리
                </li>
                <li data-tab="reviews">
                    <i class="fas fa-star"></i>
                    후기 관리
                </li>
                <li data-tab="inquiries">
                    <i class="fas fa-question-circle"></i>
                    문의 관리
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <!-- 회원 관리 섹션 -->
            <section id="users" class="content-section active">
                <div class="section-header">
                    <h2>회원 관리</h2>
                    <form method="get" action="../includes/info_for_admin.php">
                        <input type="hidden" name="search" value="user_name_search">
                        <div class="admin-search-box">
                            <input type="text" name="user_name_search" placeholder="회원 이름 검색...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>이름</th>
                                <th>아이디</th>
                                <th>비밀번호</th>
                                <th>이메일</th>
                                <th>전화번호</th>
                                <th>가입일</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['user_id'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['real_id'] ?></td>
                                <td><?= $user['password'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><?= $user['created_at'] ?></td>
                                <td>
                                    <form method="get" action="../action/admin_editDelete_action.php">
                                        <button name="user_delete" class="action-btn delete" value="<?= $user['user_id'] ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if (isset($_GET['user_name_search'])) {
                    searchPagination($page, $total_pages, 'users', $_GET['user_name_search']);
                } else {
                    Adminpagination($page, $total_pages, 'users');
                }
                ?>
            </section>

            <!-- 호텔 관리 섹션 -->
            <section id="hotels" class="content-section">
                <div class="section-header">
                    <h2>호텔 관리</h2>
                    <form method="get" action="../includes/info_for_admin.php">
                        <input type="hidden" name="search" value="hotel_name_search">
                        <div class="admin-search-box">
                            <input type="text" name="hotel_name_search" placeholder="호텔 이름 검색...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="section-actions">
                    <a href="hotel-add.php" class="add-btn"><i class="fas fa-plus"></i> 호텔 추가</a>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>호텔명</th>
                                <th>위치</th>
                                <th>객실 수</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hotels as $hotel): ?>
                            <tr>
                                <td><?= $hotel['hotel_id'] ?></td>
                                <td><?= $hotel['name'] ?></td>
                                <td><?= $hotel['location'] ?></td>
                                <td><?= $hotel['room_count'] ?></td>
                                <td>
                                    <form method="get" action="../action/admin_editDelete_action.php">
                                        <button name="hotel_edit" class="action-btn edit" value="<?= $hotel['hotel_id'] ?>"><i class="fas fa-edit"></i></button>
                                        <button name="hotel_delete" class="action-btn delete" value="<?= $hotel['hotel_id'] ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                if (isset($_GET['hotel_name_search'])) {
                    searchPagination($page, $total_pages, 'hotels', $_GET['hotel_name_search']);
                } else {
                    Adminpagination($page, $total_pages, 'hotels');
                }
                ?>
            </section>

            <!-- 예약 관리 섹션 -->
            <section id="reservations" class="content-section">
                <div class="section-header">
                    <h2>예약 관리</h2>
                    <form method="get" action="../includes/info_for_admin.php">
                        <input type="hidden" name="search" value="reservation_number_search">
                        <div class="admin-search-box">
                            <input type="text" name="reservation_number_search" placeholder="예약 번호 검색...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>예약번호</th>
                                <th>호텔명</th>
                                <th>고객명</th>
                                <th>체크인</th>
                                <th>체크아웃</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?= $reservation['reservation_id'] ?></td>
                                    <td><?= $reservation['name'] ?></td>
                                    <td><?= $reservation['username'] ?></td>
                                    <td><?= $reservation['check_in'] ?></td>
                                    <td><?= $reservation['check_out'] ?></td>
                                    <td>
                                        <form method="get" action="../action/admin_editDelete_action.php">
                                            <button name="reservation_edit" class="action-btn edit" value="<?= $reservation['reservation_id'] ?>"><i class="fas fa-edit"></i></button>
                                            <button name="reservation_delete" class="action-btn delete" value="<?= $reservation['reservation_id'] ?>"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                if (isset($_GET['reservation_number_search'])) {
                    searchPagination($page, $total_pages, 'reservations', $_GET['reservation_number_search']);
                } else {
                    Adminpagination($page, $total_pages, 'reservations');
                }
                ?>
            </section>

            <!-- 후기 관리 섹션 -->
            <section id="reviews" class="content-section">
                <div class="section-header">
                    <h2>후기 관리</h2>
                    <form method="get" action="../includes/info_for_admin.php">
                        <input type="hidden" name="search" value="review_number_search">
                        <div class="admin-search-box">
                            <input type="text" name="review_number_search" placeholder="후기 번호 검색...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 10%">번호</th>
                                <th style="width: 20%">호텔</th>
                                <th style="width: 15%">작성자</th>
                                <th style="width: 10%">평점</th>
                                <th style="width: 25%">내용</th>
                                <th style="width: 15%">작성일</th>
                                <th style="width: 15%">관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reviews as $review): ?>
                            <tr>
                                <td><?= $review['review_id'] ?></td>
                                <td><?= $review['hotel_name'] ?></td>
                                <td><?= $review['username'] ?></td>
                                <td><?= $review['rating'] ?></td>
                                <td><?= mb_substr($review['content'], 0, 30) . (mb_strlen($review['content']) > 30 ? '...' : '') ?></td>
                                <td><?= $review['created_at'] ?></td>
                                <td>
                                    <form method="get" action="../action/admin_editDelete_action.php">
                                        <a href="../review/review_detail.php?review_id=<?= $review['review_id'] ?>" class="action-btn view"><i class="fas fa-eye"></i></a>
                                        <button name="review_delete" class="action-btn delete" value="<?= $review['review_id'] ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                if (isset($_GET['review_number_search'])) {
                    searchPagination($page, $total_pages, 'reviews', $_GET['review_number_search']);
                } else {
                    Adminpagination($page, $total_pages, 'reviews');
                }
                ?>
            </section>

            <!-- 문의 관리 섹션 -->
            <section id="inquiries" class="content-section">
                <div class="section-header">
                    <h2>문의 관리</h2>
                    <form method="get" action="../includes/info_for_admin.php">
                        <input type="hidden" name="search" value="inquiry_number_search">
                        <div class="admin-search-box">
                            <input type="text" name="inquiry_number_search" placeholder="문의 번호 검색...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 10%">번호</th>
                                <th style="width: 10%">분류</th>
                                <th style="width: 30%">제목</th>
                                <th style="width: 15%">작성자</th>
                                <th style="width: 20%">작성일</th>
                                <th style="width: 10%">답변상태</th>
                                <th style="width: 20%">관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inquiries as $inquiry): ?>
                            <tr>
                                <td><?= $inquiry['inquiry_id'] ?></td>
                                <td>
                                    <?php
                                    switch($inquiry['category']) {
                                        case 'reservation':
                                            echo '예약';
                                            break;
                                        case 'payment':
                                            echo '결제';
                                            break;
                                        case 'room':
                                            echo '객실';
                                            break;
                                        case 'other':
                                            echo '기타';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if ($inquiry['is_secret']): ?>
                                        <span class="lock-icon">🔒</span>
                                    <?php endif; ?>
                                    <?= $inquiry['title'] ?>
                                </td>
                                <td><?= $inquiry['username'] ?></td>
                                <td><?= $inquiry['created_at'] ?></td>
                                <td>
                                    <?php if ($inquiry['is_answered']): ?>
                                        <span class="status-complete">답변완료</span>
                                    <?php else: ?>
                                        <span class="status-pending">미답변</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form method="get" action="../action/admin_editDelete_action.php">
                                        <a href="../inquiry/inquiry_detail.php?inquiry_id=<?= $inquiry['inquiry_id'] ?>" class="action-btn view"><i class="fas fa-eye"></i></a>
                                        <button name="inquiry_delete" class="action-btn delete" value="<?= $inquiry['inquiry_id'] ?>"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                if (isset($_GET['inquiry_number_search'])) {
                    searchPagination($page, $total_pages, 'inquiries', $_GET['inquiry_number_search']);
                } else {
                    Adminpagination($page, $total_pages, 'inquiries');
                }
                ?>
            </section>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

    <script>
        // URL 파라미터에서 tab 값 가져오기
        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = urlParams.get('tab') || 'users';

        // 해당 탭 활성화
        document.querySelectorAll('.admin-menu li').forEach(menuItem => {
            if (menuItem.getAttribute('data-tab') === activeTab) {
                menuItem.classList.add('active');
                document.getElementById(activeTab).classList.add('active');
            } else {
                menuItem.classList.remove('active');
                document.getElementById(menuItem.getAttribute('data-tab')).classList.remove('active');
            }
        });

        // 탭 전환 기능
        document.querySelectorAll('.admin-menu li').forEach(menuItem => {
            menuItem.addEventListener('click', () => {
                const tabId = menuItem.getAttribute('data-tab');
                window.location.href = `admin.php?tab=${tabId}`;
            });
        });
    </script>
</body>
</html> 