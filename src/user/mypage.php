<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="mypage-container">
        <div class="mypage-sidebar">
            <div class="profile-section">
                <div class="profile-image-container">
                    <img src="https://via.placeholder.com/150" alt="프로필 사진" id="profileImage">
                    <button class="change-profile-btn">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <h2 id="userName">홍길동</h2>
                <p id="userEmail">user@example.com</p>
            </div>
            <nav class="mypage-nav">
                <ul>
                    <li><a href="#" data-tab="reservations" class="active">예약 관리</a></li>
                    <li><a href="#" data-tab="profile">여행객 정보</a></li>
                    <li><a href="#" data-tab="wishlist">찜 목록</a></li>
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
                    <form class="profile-form">
                        <div class="form-group">
                            <label for="name">이름</label>
                            <input type="text" id="name" value="홍길동">
                        </div>
                        <div class="form-group">
                            <label for="email">이메일</label>
                            <input type="email" id="email" value="user@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">전화번호</label>
                            <input type="tel" id="phone" value="010-1234-5678">
                        </div>
                        <div class="form-group">
                            <label for="password">비밀번호 변경</label>
                            <input type="password" id="password" placeholder="새 비밀번호">
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirm">비밀번호 확인</label>
                            <input type="password" id="passwordConfirm" placeholder="새 비밀번호 확인">
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
                            <th>호텔 이름</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="hotel-row">
                                    <span>그랜드 럭셔리 호텔</span>
                                    <div class="button-group">
                                        <button class="detail-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                                        <button class="delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="hotel-row">
                                    <span>시그니처 호텔</span>
                                    <div class="button-group">
                                        <button class="detail-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                                        <button class="delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="hotel-row">
                                    <span>파크 프리미엄 호텔</span>
                                    <div class="button-group">
                                        <button class="detail-btn" onclick="window.location.href='../hotel/hotel-detail.php'">상세보기</button>
                                        <button class="delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                    
                    // Remove active class from all links and sections
                    navLinks.forEach(l => l.classList.remove('active'));
                    contentSections.forEach(section => section.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Show corresponding section
                    const targetTab = this.getAttribute('data-tab');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        });
    </script>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 