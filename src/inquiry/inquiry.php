<?php 
include_once __DIR__ . '/../includes/header.php';
?>

    <main class="inquiry-board-container">
        <div class="inquiry-board-header">
            <h1 class="inquiry-board-title">문의 게시판</h1>
        </div>

        <div class="hotels-search-sort-container">
            <div class="hotels-search-box">
                <div class="hotels-search-row">
                    <div class="hotels-search-input">
                        <i class="fas fa-search"></i>
                        <input class="hotels-search-input-input" type="text" placeholder="제목을 입력하세요">
                    </div>
                    <button class="style-search-btn">검색</button>
                </div>
            </div>
            <div class="controls-row">
                <div class="sort-controls">
                    <span class="sort-label">정렬:</span>
                    <select class="sort-select">
                        <option value="recent">최신순</option>
                        <option value="old">오래된순</option>
                    </select>
                </div>
                <a href="inquiry-write.php" class="write-btn">문의하기</a>
            </div>
        </div>

        <table class="inquiry-board-table">
            <thead>
                <tr>
                    <th style="width: 10%">번호</th>
                    <th style="width: 10%">분류</th>
                    <th style="width: 50%">제목</th>
                    <th style="width: 15%">작성자</th>
                    <th style="width: 15%">작성일</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>5</td>
                    <td>예약</td>
                    <td class="inquiry-title"><a href="#">예약 변경 관련 문의드립니다</a></td>
                    <td>홍길동</td>
                    <td>2024-03-15</td>
                </tr>
                <tr class="inquiry-reply-row">
                    <td></td>
                    <td>답변</td>
                    <td class="inquiry-title"><a href="#">└ 예약 변경 관련 답변드립니다</a></td>
                    <td>관리자</td>
                    <td>2024-03-15</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>결제</td>
                    <td class="inquiry-title"><a href="#">결제 취소 문의</a></td>
                    <td>김철수</td>
                    <td>2024-03-14</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>객실</td>
                    <td class="inquiry-title"><a href="#">객실 시설 문의</a></td>
                    <td>이영희</td>
                    <td>2024-03-13</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>기타</td>
                    <td class="inquiry-title"><a href="#">체크인 시간 문의</a></td>
                    <td>박민수</td>
                    <td>2024-03-12</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>예약</td>
                    <td class="inquiry-title"><a href="#">예약 확인 문의</a></td>
                    <td>최지원</td>
                    <td>2024-03-11</td>
                </tr>
            </tbody>
        </table>

        <div class="inquiry-pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
        </div>
    </main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?> 