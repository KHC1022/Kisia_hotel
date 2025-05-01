<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="admin-container">
        <div class="admin-sidebar">
            <h2>관리자 메뉴</h2>
            <ul class="admin-menu">
                <li class="active" data-tab="members">
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
            <section id="members" class="content-section active">
                <div class="section-header">
                    <h2>회원 관리</h2>
                    <div class="admin-search-box">
                        <input type="text" placeholder="회원 검색...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>이름</th>
                                <th>이메일</th>
                                <th>전화번호</th>
                                <th>비밀번호</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>김철수</td>
                                <td>kim@example.com</td>
                                <td>010-1234-5678</td>
                                <td>••••••••</td>
                                <td>
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- 호텔 관리 섹션 -->
            <section id="hotels" class="content-section">
                <div class="section-header">
                    <h2>호텔 관리</h2>
                    <div class="action-buttons">
                        <div class="admin-search-box">
                            <input type="text" placeholder="호텔 검색...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </div>
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
                                <th>상태</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>그랜드 럭셔리 호텔</td>
                                <td>서울시 강남구</td>
                                <td>150</td>
                                <td><span class="status active">운영중</span></td>
                                <td>
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- 예약 관리 섹션 -->
            <section id="reservations" class="content-section">
                <div class="section-header">
                    <h2>예약 관리</h2>
                    <div class="admin-search-box">
                        <input type="text" placeholder="예약 검색...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>예약번호</th>
                                <th>호텔</th>
                                <th>고객명</th>
                                <th>체크인</th>
                                <th>체크아웃</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>R001</td>
                                <td>그랜드 럭셔리 호텔</td>
                                <td>김철수</td>
                                <td>2024-04-01</td>
                                <td>2024-04-03</td>
                                <td>
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- 후기 관리 섹션 -->
            <section id="reviews" class="content-section">
                <div class="section-header">
                    <h2>후기 관리</h2>
                    <div class="admin-search-box">
                        <input type="text" placeholder="후기 검색...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>호텔</th>
                                <th>작성자</th>
                                <th>평점</th>
                                <th>작성일</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>그랜드 럭셔리 호텔</td>
                                <td>김철수</td>
                                <td>5</td>
                                <td>2024-04-01</td>
                                <td>
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- 문의 관리 섹션 -->
            <section id="inquiries" class="content-section">
                <div class="section-header">
                    <h2>문의 관리</h2>
                    <div class="admin-search-box">
                        <input type="text" placeholder="문의 검색...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>제목</th>
                                <th>작성자</th>
                                <th>작성일</th>
                                <th>상태</th>
                                <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>예약 문의</td>
                                <td>김철수</td>
                                <td>2024-04-01</td>
                                <td><span class="status pending">답변 대기</span></td>
                                <td>
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

    <script>
        // URL 파라미터에서 tab 값 가져오기
        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = urlParams.get('tab') || 'members'; // 기본값은 members

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