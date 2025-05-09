<?php 
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../action/mypage_action.php';
$users = $GLOBALS['users'];
?>

    <main class="mypage-container">
        <div class="mypage-sidebar">
            <div class="profile-section">
                <form method="post" action="../action/upload_profile_image.php" enctype="multipart/form-data">
                    <?php
                        $has_image = !empty($users['profile_image']) ? 'has-image' : '';
                        $profile_img = !empty($users['profile_image']) 
                        ? $users['profile_image']
                        : '/image/default_profile.jpg';
                    ?>
                    <div class="profile-image-container <?= $has_image ?>">
                        <img src="<?= $profile_img ?>" alt="프로필 사진" id="profileImage" class="profile-image">
                        <label for="profileUpload" class="change-profile-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file" id="profileUpload" name="profile_image" accept="image/*" style="display: none;" onchange="this.form.submit()">
                    </div>
                </form>
                <h2 id="username"><?= $users['username']?></h2>
                <p id="email"><?= $users['email']?></p>
            </div>
            <nav class="mypage-nav">
                <ul>
                    <li><a href="#" data-tab="reservations" class="active">예약 관리</a></li>
                    <li><a href="#" data-tab="profile">여행객 정보</a></li>
                    <li><a href="#" data-tab="wishlist">찜 목록</a></li>
                    <li><a href="#" data-tab="point">포인트</a></li>
                </ul>
            </nav>
        </div>

        <div class="mypage-content">
            <!-- 예약 관리 섹션 -->
            <section id="reservations" class="content-section active">
                <h2>예약 관리</h2>
                <div class="reservation-list">
                    <div class="reservation-card">
                        <div class="reservation-header">
                            <h3>그랜드 럭셔리 호텔</h3>
                            <span class="status confirmed">확정</span>
                        </div>
                        <div class="reservation-details">
                            <div class="mypage-detail-item">
                                <i class="fas fa-calendar"></i>
                                <span>체크인: 2024-04-01</span>
                            </div>
                            <div class="mypage-detail-item">
                                <i class="fas fa-calendar"></i>
                                <span>체크아웃: 2024-04-03</span>
                            </div>
                            <div class="mypage-detail-item">
                                <i class="fas fa-bed"></i>
                                <span>디럭스 더블룸</span>
                            </div>
                            <div class="mypage-detail-item">
                                <i class="fas fa-user"></i>
                                <span>2명</span>
                            </div>
                        </div>
                        <div class="reservation-actions">
                            <button class="modify-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                            <button class="mypage-cancel-btn">예약 취소</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 여행객 정보 섹션 -->
            <section id="profile" class="content-section">
                <h2>여행객 정보</h2>
                <div class="profile-form-container">
                    <form class="profile-form" method="get" action="../action/mypage_change_action.php">
                        <div class="form-group">
                            <label for="username">이름</label>
                            <input type="text" id="username" name="username" value="<?= $users['username']?>" readonly class="readonly-input">
                        </div>
                        <div class="form-group">
                            <label for="email">이메일</label>
                            <input type="email" id="email" value="<?= $users['email'] ?>" readonly class="readonly-input">
                        </div>
                        <div class="form-group">
                            <label for="phone">전화번호</label>
                            <input type="tel" id="phone" value="<?= $users['phone'] ?>" readonly class="readonly-input">
                        </div>
                        <div class="form-group">
                            <label for="password">기존 비밀번호</label>
                            <input type="password" id="password" name="password" placeholder="기존 비밀번호">
                        </div>
                        <div class="form-group">
                            <label for="new_password">비밀번호 변경</label>
                            <input type="password" id="new_password" name="new_password"  placeholder="새 비밀번호">
                        </div>
                        <div class="form-group">
                            <label for="new_password_check">비밀번호 확인</label>
                            <input type="password" id="new_password_check" name="new_password_check" placeholder="새 비밀번호 확인">
                        </div>
                        <button type="submit" class="save-btn">저장</button>
                    </form>
                </div>
            </section>

            <!-- 찜 목록 섹션 -->
            <section id="wishlist" class="content-section">
                <h2>찜 목록</h2>
                <table class="wishlist-table">
                    <thead>
                        <tr>
                            <th width="90%">호텔 이름</th>
                            <th width="10%" style="padding-left: 25px;">관리</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php foreach ($wishlist_items as $hotel): ?>
                            <tr>
                                <td>
                                    <div class="hotel-row">
                                        <h2 class="hotel-name"><?=$hotel['name'] ?></h2>
                                    </div>
                                </td>
                                <td>
                                    <div class="button-group">
                                        <a href="../hotel/hotel-detail.php?id=<?= $hotel['hotel_id'] ?>" class="detail-btn">상세보기</a>
                                        <form method="get" action="../action/wishlist_delete.php" style="display:inline;">
                                            <input type="hidden" name="hotel_id" value="<?= $hotel['hotel_id'] ?>">
                                            <button type="submit" class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
            </section>
            <section id="point" class="content-section">
                <h2>포인트 관리</h2>
                <div class="profile-form-container">
                    <p><strong>현재 보유 포인트:</strong> <?=number_format( $users['point']) ?> P</p>
                    <form action="../action/charge_point_action.php" method="get">
                        <div class="form-group">
                            <label for="charge_amount">충전할 포인트</label>
                            <input type="number" name="point" id="point" min="1000" step="1000" required>
                        </div>
                        <button type="submit" class="save-btn">충전</button>
                    </form>
                </div>
            </section>

        </div>
    </main>

    <script src="js/mypage.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.mypage-nav a');
            const contentSections = document.querySelectorAll('.content-section');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    navLinks.forEach(l => l.classList.remove('active'));
                    contentSections.forEach(section => section.classList.remove('active'));
                    
                    this.classList.add('active');
                    
                    const targetTab = this.getAttribute('data-tab');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        });
    </script>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 