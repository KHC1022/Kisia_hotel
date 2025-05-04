-- 0. 데이터베이스 생성 및 사용
CREATE DATABASE IF NOT EXISTS kisia_hotel DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kisia_hotel;

-- 1. users (회원 정보)
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    real_id VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_admin BOOLEAN DEFAULT FALSE,
    terms BOOLEAN DEFAULT FALSE,
    marketing BOOLEAN DEFAULT FALSE
);

-- 2. hotels (호텔 정보)
CREATE TABLE hotels (
    hotel_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(200) NOT NULL,
    description TEXT,
    price_per_night INT NOT NULL,
    rating DECIMAL(2,1),
    main_image VARCHAR(255),
    detail_image_1 VARCHAR(255),
    detail_image_2 VARCHAR(255),
    detail_image_3 VARCHAR(255),
    detail_image_4 VARCHAR(255)
);

-- 3. hotel_facilities (호텔 부대시설)
CREATE TABLE hotel_facilities (
    hotel_id INT PRIMARY KEY,
    pool BOOLEAN DEFAULT FALSE,
    spa BOOLEAN DEFAULT FALSE,
    fitness BOOLEAN DEFAULT FALSE,
    restaurant BOOLEAN DEFAULT FALSE,
    parking BOOLEAN DEFAULT FALSE,
    wifi BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id) ON DELETE CASCADE
);

-- 4. rooms (객실 정보)
CREATE TABLE rooms (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    hotel_id INT,
    room_type VARCHAR(50) NOT NULL,
    max_person INT NOT NULL,
    price INT NOT NULL,
    available BOOLEAN DEFAULT TRUE,
    description TEXT,
    rooms_image VARCHAR(255),
    FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id) ON DELETE CASCADE
);

-- 5. reservations (예약)
CREATE TABLE reservations (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    room_id INT,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    total_price INT NOT NULL,
    guests INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('done', 'cancel') DEFAULT 'done',
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(room_id) ON DELETE CASCADE
);

-- 6. reviews (후기)
CREATE TABLE reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    hotel_id INT,
    reservation_id INT,
    rating DECIMAL(2,1) NOT NULL CHECK (rating BETWEEN 0.0 AND 5.0),
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    room_type VARCHAR(50),
    travel_type ENUM('solo', 'couple', 'friend', 'family', 'business') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id) ON DELETE CASCADE
);

-- 7. review_helpful (후기 도움돼요 기록)
CREATE TABLE review_helpful (
    helpful_id INT PRIMARY KEY AUTO_INCREMENT,
    review_id INT,
    user_id INT,
    is_helpful BOOLEAN NOT NULL,
    FOREIGN KEY (review_id) REFERENCES reviews(review_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- 8. inquiries (1:1 문의)
CREATE TABLE inquiries (
    inquiry_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    category ENUM('reservation', 'payment', 'room', 'other') NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- 9. inquiry_responses (문의 답변)
CREATE TABLE inquiry_responses (
    response_id INT PRIMARY KEY AUTO_INCREMENT,
    inquiry_id INT,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (inquiry_id) REFERENCES inquiries(inquiry_id) ON DELETE CASCADE
);

-- 10. wishlist (찜 목록)
CREATE TABLE wishlist (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    hotel_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id) ON DELETE CASCADE
);

-- 11. event_comments (이벤트 댓글)
CREATE TABLE event_comments (
    comment_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    comment TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

SET NAMES utf8mb4;

-- 사용자 계정 추가
INSERT INTO users (username, real_id, password, email, phone, created_at, is_admin, terms, marketing) VALUES 
('관리자', 'admin', 'admin', 'admin@naver.com', '010-1234-1234', '2024-01-01 00:00:00', 1, 1, 0),
('김서연', 'kimsy', 'kimsy123', 'kimsy@naver.com', '010-1111-2222', '2024-01-02 10:30:00', 0, 1, 0),
('이준호', 'leejh', 'leejh456', 'leejh@naver.com', '010-1111-3333', '2024-01-03 14:15:00', 0, 1, 0),
('박지민', 'parkjm', 'parkjm789', 'parkjm@naver.com', '010-1111-4444', '2024-01-04 09:45:00', 0, 1, 0),
('최민준', 'choimj', 'choimj101', 'choimj@naver.com', '010-1111-5555', '2024-01-05 16:20:00', 0, 1, 0),
('정서아', 'jeongsa', 'jeongsa202', 'jeongsa@naver.com', '010-1111-6666', '2024-01-06 11:10:00', 0, 1, 0),
('황도현', 'hwangdh', 'hwangdh303', 'hwangdh@naver.com', '010-1111-7777', '2024-01-07 13:25:00', 0, 1, 0),
('강수아', 'kangsa', 'kangsa404', 'kangsa@naver.com', '010-1111-8888', '2024-01-08 15:40:00', 0, 1, 0),
('조민서', 'joms', 'joms505', 'joms@naver.com', '010-1111-9999', '2024-01-09 10:55:00', 0, 1, 0),
('윤지우', 'yoonjw', 'yoonjw606', 'yoonjw@naver.com', '010-1111-0000', '2024-01-10 14:30:00', 0, 1, 0),
('장하준', 'janghj', 'janghj707', 'janghj@naver.com', '010-2222-1111', '2024-01-11 09:15:00', 0, 1, 0),
('임서준', 'limsj', 'limsj808', 'limsj@naver.com', '010-2222-2222', '2024-01-12 16:45:00', 0, 1, 0),
('한지안', 'hanja', 'hanja909', 'hanja@naver.com', '010-2222-3333', '2024-01-13 11:20:00', 0, 1, 0),
('신하윤', 'shinhy', 'shinhy101', 'shinhy@naver.com', '010-2222-4444', '2024-01-14 13:35:00', 0, 1, 0),
('오지호', 'ohjh', 'ohjh202', 'ohjh@naver.com', '010-2222-5555', '2024-01-15 15:50:00', 0, 1, 0),
('서연우', 'seoyw', 'seoyw303', 'seoyw@naver.com', '010-2222-6666', '2024-01-16 10:05:00', 0, 1, 0),
('권서현', 'kwonsh', 'kwonsh404', 'kwonsh@naver.com', '010-2222-7777', '2024-01-17 14:40:00', 0, 1, 0),
('김민수', 'minsoo', 'minsoo123', 'minsoo@gmail.com', '010-3333-1111', '2024-01-18 09:25:00', 0, 1, 1),
('이지은', 'jieun', 'jieun456', 'jieun@daum.net', '010-3333-2222', '2024-01-19 16:55:00', 0, 1, 0),
('박준호', 'junho', 'junho789', 'junho@naver.com', '010-3333-3333', '2024-01-20 11:30:00', 0, 1, 1),
('최수진', 'sujin', 'sujin101', 'sujin@gmail.com', '010-3333-4444', '2024-01-21 13:45:00', 0, 1, 0),
('정다은', 'daeun', 'daeun202', 'daeun@daum.net', '010-3333-5555', '2024-01-22 15:00:00', 0, 1, 1),
('황민지', 'minji', 'minji303', 'minji@naver.com', '010-3333-6666', '2024-01-23 10:15:00', 0, 1, 0),
('강현우', 'hyunwoo', 'hyunwoo404', 'hyunwoo@gmail.com', '010-3333-7777', '2024-01-24 14:50:00', 0, 1, 1),
('조서연', 'seoyeon', 'seoyeon505', 'seoyeon@daum.net', '010-3333-8888', '2024-01-25 09:35:00', 0, 1, 0),
('윤지훈', 'jihun', 'jihun606', 'jihun@naver.com', '010-3333-9999', '2024-01-26 16:05:00', 0, 1, 1),
('장수아', 'sua', 'sua707', 'sua@gmail.com', '010-3333-0000', '2024-01-27 11:40:00', 0, 1, 0);

-- 호텔 데이터 추가
INSERT INTO hotels (name, location, description, price_per_night, rating, main_image, detail_image_1, detail_image_2, detail_image_3, detail_image_4) VALUES
('그랜드 인터컨티넨탈 서울', '한국, 서울', '도심 속 럭셔리한 휴식공간', 250000, 4.8, '/image/grand_hotel.jpg', '/image/grand_hotel_1.jpg', '/image/grand_hotel_2.jpg', '/image/grand_hotel_3.jpg', '/image/grand_hotel_4.jpg'),
('리츠칼튼 뉴욕', '미국, 뉴욕', '센트럴파크가 보이는 럭셔리 호텔', 450000, 4.9, '/image/newyork_central.jpg', '/image/newyork_1.jpg', '/image/newyork_2.jpg', '/image/newyork_3.jpg', '/image/newyork_4.jpg'),
('파라다이스 호텔 해운대', '한국, 부산', '해운대 해변과 가까운 프리미엄 호텔', 680000, 4.7, '/image/signature_busan.jpg', '/image/signature_busan_1.jpg', '/image/signature_busan_2.jpg', '/image/signature_busan_3.jpg', '/image/signature_busan_4.jpg'),
('포시즌스 파리', '프랑스, 파리', '에펠탑 전망의 럭셔리 호텔', 520000, 4.8, '/image/paris_eiffel.jpg', '/image/paris_1.jpg', '/image/paris_2.jpg', '/image/paris_3.jpg', '/image/paris_4.jpg'),
('신라스테이 제주', '한국, 제주', '제주의 아름다운 바다가 보이는 호텔', 150000, 4.6, '/image/jeju_ocean.jpg', '/image/jeju_ocean_1.jpg', '/image/jeju_ocean_2.jpg', '/image/jeju_ocean_3.jpg', '/image/jeju_ocean_4.jpg'),
('만다린 오리엔탈 도쿄', '일본, 도쿄', '도시 전망이 아름다운 럭셔리 호텔', 750000, 4.7, '/image/tokyo_view.jpg', '/image/tokyo_1.jpg', '/image/tokyo_2.jpg', '/image/tokyo_3.jpg', '/image/tokyo_4.jpg'),
('하얏트 리젠시 인천', '한국, 인천', '인천국제공항과 가까운 비즈니스 호텔', 120000, 4.5, '/image/incheon_sky.jpg', '/image/incheon_sky_1.jpg', '/image/incheon_sky_2.jpg', '/image/incheon_sky_3.jpg', '/image/incheon_sky_4.jpg'),
('페닌슐라 홍콩', '중국, 홍콩', '빅토리아 하버가 보이는 럭셔리 호텔', 460000, 4.8, '/image/hongkong_harbor.jpg', '/image/hongkong_1.jpg', '/image/hongkong_2.jpg', '/image/hongkong_3.jpg', '/image/hongkong_4.jpg'),
('메리어트 대구', '한국, 대구', '대구 도심의 편리한 위치', 100000, 4.4, '/image/daegu_central.jpg', '/image/daegu_central_1.jpg', '/image/daegu_central_2.jpg', '/image/daegu_central_3.jpg', '/image/daegu_central_4.jpg'),
('버즈 알 아랍', '아랍에미리트, 두바이', '두바이의 상징적인 7성급 호텔', 890000, 4.9, '/image/dubai_burj.jpg', '/image/dubai_1.jpg', '/image/dubai_2.jpg', '/image/dubai_3.jpg', '/image/dubai_4.jpg'),
('라마다 프라자 광주', '한국, 광주', '광주천과 인접한 쾌적한 호텔', 90000, 4.3, '/image/gwangju_riverside.jpg', '/image/gwangju_riverside_1.jpg', '/image/gwangju_riverside_2.jpg', '/image/gwangju_riverside_3.jpg', '/image/gwangju_riverside_4.jpg'),
('래플스 싱가포르', '싱가포르, 싱가포르', 'colonial 스타일의 럭셔리 호텔', 420000, 4.8, '/image/singapore_raffles.jpg', '/image/singapore_1.jpg', '/image/singapore_2.jpg', '/image/singapore_3.jpg', '/image/singapore_4.jpg'),
('노보텔 대전', '한국, 대전', '대덕연구단지 인근 비즈니스 호텔', 110000, 4.2, '/image/daejeon_techno.jpg', '/image/daejeon_techno_1.jpg', '/image/daejeon_techno_2.jpg', '/image/daejeon_techno_3.jpg', '/image/daejeon_techno_4.jpg'),
('베네치안 마카오', '중국, 마카오', '베네치아 테마의 럭셔리 리조트', 380000, 4.7, '/image/macau_venetian.jpg', '/image/macau_1.jpg', '/image/macau_2.jpg', '/image/macau_3.jpg', '/image/macau_4.jpg'),
('롯데호텔 울산', '한국, 울산', '울산항과 가까운 해양 리조트', 130000, 4.1, '/image/ulsan_marina.jpg', '/image/ulsan_marina_1.jpg', '/image/ulsan_marina_2.jpg', '/image/ulsan_marina_3.jpg', '/image/ulsan_marina_4.jpg'),
('플라자 뉴욕', '미국, 뉴욕', '센트럴파크 사우스의 역사적인 호텔', 470000, 4.8, '/image/newyork_plaza.jpg', '/image/plaza_1.jpg', '/image/plaza_2.jpg', '/image/plaza_3.jpg', '/image/plaza_4.jpg'),
('힐튼 수원', '한국, 수원', '수원화성과 가까운 관광 호텔', 95000, 4.0, '/image/suwon_paldal.jpg', '/image/suwon_paldal_1.jpg', '/image/suwon_paldal_2.jpg', '/image/suwon_paldal_3.jpg', '/image/suwon_paldal_4.jpg'),
('웨스틴 로마', '이탈리아, 로마', '바티칸과 가까운 럭셔리 호텔', 350000, 4.6, '/image/rome_westin.jpg', '/image/rome_1.jpg', '/image/rome_2.jpg', '/image/rome_3.jpg', '/image/rome_4.jpg'),
('하얏트 리젠시 시드니', '호주, 시드니', '오페라하우스가 보이는 하버뷰 호텔', 420000, 4.7, '/image/sydney_hyatt.jpg', '/image/sydney_1.jpg', '/image/sydney_2.jpg', '/image/sydney_3.jpg', '/image/sydney_4.jpg'),
('W 바르셀로나', '스페인, 바르셀로나', '지중해가 보이는 현대적 호텔', 380000, 4.6, '/image/barcelona_w.jpg', '/image/barcelona_1.jpg', '/image/barcelona_2.jpg', '/image/barcelona_3.jpg', '/image/barcelona_4.jpg'),
('아만 도쿄', '일본, 도쿄', '도시 전망의 럭셔리 부티크 호텔', 680000, 4.9, '/image/tokyo_aman.jpg', '/image/aman_1.jpg', '/image/aman_2.jpg', '/image/aman_3.jpg', '/image/aman_4.jpg'),
('포시즌스 방콕', '태국, 방콕', '차오프라야 강변의 럭셔리 호텔', 320000, 4.7, '/image/bangkok_fourseasons.jpg', '/image/bangkok_1.jpg', '/image/bangkok_2.jpg', '/image/bangkok_3.jpg', '/image/bangkok_4.jpg'),
('샹그릴라 런던', '영국, 런던', '템즈강이 보이는 럭셔리 호텔', 480000, 4.8, '/image/london_shangri.jpg', '/image/london_1.jpg', '/image/london_2.jpg', '/image/london_3.jpg', '/image/london_4.jpg'),
('벨라지오 라스베가스', '미국, 라스베가스', '분수쇼로 유명한 럭셔리 호텔', 390000, 4.7, '/image/vegas_bellagio.jpg', '/image/bellagio_1.jpg', '/image/bellagio_2.jpg', '/image/bellagio_3.jpg', '/image/bellagio_4.jpg'),
('파크 하얏트 비엔나', '오스트리아, 비엔나', '역사적 건물의 럭셔리 호텔', 420000, 4.8, '/image/vienna_hyatt.jpg', '/image/vienna_1.jpg', '/image/vienna_2.jpg', '/image/vienna_3.jpg', '/image/vienna_4.jpg'),
('인터컨티넨탈 몰디브', '몰디브, 말레', '에메랄드빛 바다의 워터빌라 리조트', 780000, 4.9, '/image/maldives_ic.jpg', '/image/maldives_1.jpg', '/image/maldives_2.jpg', '/image/maldives_3.jpg', '/image/maldives_4.jpg'),
('만다린 오리엔탈 방콕', '태국, 방콕', '차오프라야 강변의 전통적 럭셔리', 350000, 4.8, '/image/bangkok_mandarin.jpg', '/image/mandarin_1.jpg', '/image/mandarin_2.jpg', '/image/mandarin_3.jpg', '/image/mandarin_4.jpg'),
('리츠칼튼 마이애미', '미국, 마이애미', '마이애미 비치의 럭셔리 리조트', 420000, 4.7, '/image/miami_ritz.jpg', '/image/miami_1.jpg', '/image/miami_2.jpg', '/image/miami_3.jpg', '/image/miami_4.jpg'),
('아틀란티스 두바이', '아랍에미리트, 두바이', '팜 주메이라의 해양 테마 리조트', 520000, 4.8, '/image/dubai_atlantis.jpg', '/image/atlantis_1.jpg', '/image/atlantis_2.jpg', '/image/atlantis_3.jpg', '/image/atlantis_4.jpg'),
('웨스틴 발리', '인도네시아, 발리', '열대 해변의 럭셔리 리조트', 380000, 4.7, '/image/bali_westin.jpg', '/image/bali_1.jpg', '/image/bali_2.jpg', '/image/bali_3.jpg', '/image/bali_4.jpg'),
('페어몬트 밴프', '캐나다, 밴프', '로키 산맥의 성같은 리조트', 450000, 4.8, '/image/banff_fairmont.jpg', '/image/banff_1.jpg', '/image/banff_2.jpg', '/image/banff_3.jpg', '/image/banff_4.jpg'),
('샹그릴라 파리', '프랑스, 파리', '에펠탑 전망의 팔레스 호텔', 580000, 4.9, '/image/paris_shangri.jpg', '/image/shangri_1.jpg', '/image/shangri_2.jpg', '/image/shangri_3.jpg', '/image/shangri_4.jpg'),
('콘래드 몰디브', '몰디브, 랑갈리', '인도양의 럭셔리 리조트', 690000, 4.8, '/image/maldives_conrad.jpg', '/image/conrad_1.jpg', '/image/conrad_2.jpg', '/image/conrad_3.jpg', '/image/conrad_4.jpg'),
('세인트 레지스 보라보라', '프랑스령폴리네시아, 보라보라', '남태평양의 럭셔리 리조트', 820000, 4.9, '/image/borabora_regis.jpg', '/image/regis_1.jpg', '/image/regis_2.jpg', '/image/regis_3.jpg', '/image/regis_4.jpg'),
('아만풀로 베니스', '이탈리아, 베니스', '그랜드 운하의 16세기 궁전 호텔', 750000, 4.9, '/image/venice_aman.jpg', '/image/amanvenice_1.jpg', '/image/amanvenice_2.jpg', '/image/amanvenice_3.jpg', '/image/amanvenice_4.jpg'),
('포시즌스 보라보라', '프랑스령폴리네시아, 보라보라', '산호초 위의 럭셔리 리조트', 780000, 4.8, '/image/borabora_four.jpg', '/image/fourseasons_1.jpg', '/image/fourseasons_2.jpg', '/image/fourseasons_3.jpg', '/image/fourseasons_4.jpg'),
('리츠칼튼 몰디브', '몰디브, 파리', '인도양의 프라이빗 아일랜드 리조트', 850000, 4.9, '/image/maldives_ritz.jpg', '/image/ritzmaldives_1.jpg', '/image/ritzmaldives_2.jpg', '/image/ritzmaldives_3.jpg', '/image/ritzmaldives_4.jpg'),
('만다린 오리엔탈 마라케시', '모로코, 마라케시', '아틀라스 산맥이 보이는 럭셔리 리조트', 420000, 4.7, '/image/marrakech_mandarin.jpg', '/image/marrakech_1.jpg', '/image/marrakech_2.jpg', '/image/marrakech_3.jpg', '/image/marrakech_4.jpg'),
('페닌슐라 파리', '프랑스, 파리', '샹젤리제 근처의 팔레스 호텔', 620000, 4.8, '/image/paris_peninsula.jpg', '/image/peninsula_1.jpg', '/image/peninsula_2.jpg', '/image/peninsula_3.jpg', '/image/peninsula_4.jpg'),
('래플스 이스탄불', '터키, 이스탄불', '보스포러스 해협이 보이는 럭셔리 호텔', 380000, 4.7, '/image/istanbul_raffles.jpg', '/image/raffles_1.jpg', '/image/raffles_2.jpg', '/image/raffles_3.jpg', '/image/raffles_4.jpg'),
('카페 로얄 런던', '영국, 런던', '리젠트 거리의 역사적 럭셔리 호텔', 450000, 4.8, '/image/london_cafe.jpg', '/image/cafe_1.jpg', '/image/cafe_2.jpg', '/image/cafe_3.jpg', '/image/cafe_4.jpg'),
('아만 베니스', '이탈리아, 베니스', '그랜드 운하의 16세기 팔라조', 720000, 4.9, '/image/venice_aman2.jpg', '/image/amanvenice2_1.jpg', '/image/amanvenice2_2.jpg', '/image/amanvenice2_3.jpg', '/image/amanvenice2_4.jpg'),
('이터널 부산', '한국, 부산', '부산의 명물 호텔', 550000, 4.9, '/image/busan_eternal.jpg', '/image/eternal_1.jpg', '/image/eternal_2.jpg', '/image/eternal_3.jpg', '/image/eternal_4.jpg'),
('아만 아무안', '인도네시아, 발리', '인도양 전망의 프라이빗 빌라', 850000, 4.9, '/image/amankila.jpg', '/image/amankila_1.jpg', '/image/amankila_2.jpg', '/image/amankila_3.jpg', '/image/amankila_4.jpg'),
('포시즌스 하노이', '베트남, 하노이', '호안끼엠 호수가 보이는 럭셔리 호텔', 320000, 4.7, '/image/hanoi_fs.jpg', '/image/hanoi_1.jpg', '/image/hanoi_2.jpg', '/image/hanoi_3.jpg', '/image/hanoi_4.jpg'),
('콘래드 도쿄', '일본, 도쿄', '도쿄만 전망의 현대적 럭셔리 호텔', 580000, 4.8, '/image/tokyo_conrad.jpg', '/image/conradtokyo_1.jpg', '/image/conradtokyo_2.jpg', '/image/conradtokyo_3.jpg', '/image/conradtokyo_4.jpg'),
('리츠칼튼 몬테카를로', '모나코, 몬테카를로', '지중해 전망의 카지노 리조트', 650000, 4.9, '/image/montecarlo_ritz.jpg', '/image/montecarlo_1.jpg', '/image/montecarlo_2.jpg', '/image/montecarlo_3.jpg', '/image/montecarlo_4.jpg'),
('페닌슐라 베이루트', '레바논, 베이루트', '지중해 전망의 중동 럭셔리 호텔', 420000, 4.7, '/image/beirut_peninsula.jpg', '/image/beirut_1.jpg', '/image/beirut_2.jpg', '/image/beirut_3.jpg', '/image/beirut_4.jpg'),
('홀리데이 인 부산', '한국, 부산', '부산의 명물 호텔', 600000, 4.9, '/image/holiday_inn.jpg', '/image/holiday_inn_1.jpg', '/image/holiday_inn_2.jpg', '/image/holiday_inn_3.jpg', '/image/holiday_inn_4.jpg');

-- 리뷰 데이터 추가
INSERT INTO reviews (user_id, hotel_id, reservation_id, rating, content, room_type, travel_type) VALUES
(2, 1, NULL, 4.5, '시설이 깔끔하고 직원들이 친절했습니다. 위치도 좋아요.', '스위트룸', 'couple'),
(3, 1, NULL, 2.5, '방은 괜찮았지만 조식이 기대에 못 미쳤어요.', '스탠다드룸', 'family'),
(4, 1, NULL, 3.0, '전반적으로 평범한 숙박이었습니다.', '스위트룸', 'couple'),
(5, 2, NULL, 5.0, '완벽한 숙박이었습니다. 모든 것이 최고였어요!', '스탠다드룸', 'family'),
(6, 2, NULL, 3.5, '가격 대비 만족스러웠습니다.', '디럭스룸', 'couple'),
(7, 2, NULL, 1.5, '방음이 너무 안 되어서 잠을 잘 수 없었어요.', '스탠다드룸', 'family'),
(8, 3, NULL, 4.0, '시설과 서비스 모두 만족스러웠습니다.', '스위트룸', 'couple'),
(9, 3, NULL, 4.5, '뷰가 정말 아름다웠어요. 추천합니다!', '오션뷰룸', 'family'),
(10, 3, NULL, 2.0, '에어컨이 고장나서 매우 불편했습니다.', '스탠다드룸', 'business'),
(11, 4, NULL, 3.5, '전반적으로 만족스러운 숙박이었습니다.', '스탠다드룸', 'couple'),
(12, 4, NULL, 2.5, '시설은 좋았지만 가격이 좀 비쌌어요.', '디럭스룸', 'family'),
(13, 4, NULL, 4.0, '직원들이 매우 친절했어요.', '스탠다드룸', 'business'),
(14, 5, NULL, 3.0, '시설과 서비스 모두 평범했습니다.', '스위트룸', 'couple'),
(15, 5, NULL, 4.5, '가격 대비 매우 만족스러웠습니다.', '디럭스룸', 'family'),
(16, 5, NULL, 2.0, '청결 상태가 좋지 않았습니다.', '스탠다드룸', 'couple'),
(17, 6, NULL, 5.0, '모든 것이 완벽했습니다!', '스위트룸', 'family'),
(18, 6, NULL, 3.0, '좋은 숙박이었습니다.', '디럭스룸', 'couple'),
(19, 6, NULL, 1.5, '시설은 좋았지만 직원들이 매우 불 친절했습니다.', '스탠다드룸', 'family'),
(20, 7, NULL, 4.0, '뷰가 정말 아름다웠어요!', '스위트룸', 'couple'),
(21, 7, NULL, 2.5, '가격 대비 만족스럽지 않았습니다.', '디럭스룸', 'family'),
(22, 7, NULL, 3.5, '방음이 좀 아쉬웠지만 전반적으로 괜찮았어요.', '스탠다드룸', 'family'),
(23, 8, NULL, 3.0, '전반적으로 평범한 숙박이었습니다.', '스탠다드룸', 'couple'),
(24, 8, NULL, 4.5, '시설이 매우 좋았습니다.', '디럭스룸', 'family'),
(25, 8, NULL, 2.0, '청소가 제대로 되지 않았습니다.', '스탠다드룸', 'business'),
(2, 9, NULL, 5.0, '완벽한 숙박이었습니다!', '스위트룸', 'family'),
(3, 9, NULL, 3.5, '좋은 경험이었습니다.', '디럭스룸', 'couple'),
(4, 9, NULL, 1.0, '에어컨이 고장나서 매우 불편했습니다.', '스탠다드룸', 'business'),
(5, 10, NULL, 4.0, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'couple'),
(6, 10, NULL, 2.5, '평범한 숙박이었습니다.', '디럭스룸', 'family'),
(7, 10, NULL, 3.0, '가격 대비 만족스러웠어요.', '스탠다드룸', 'business'),
(8, 11, NULL, 3.5, '전반적으로 만족스러운 숙박이었습니다.', '스위트룸', 'couple'),
(9, 11, NULL, 1.5, '시설은 좋았지만 직원 서비스가 매우 아쉬웠어요.', '디럭스룸', 'family'),
(10, 12, NULL, 4.5, '모든 것이 완벽했습니다!', '스위트룸', 'couple'),
(11, 12, NULL, 2.0, '좋은 숙박이었습니다.', '디럭스룸', 'family'),
(12, 13, NULL, 3.0, '평범한 숙박이었습니다.', '스위트룸', 'business'),
(13, 13, NULL, 4.0, '시설은 좋았어요.', '디럭스룸', 'couple'),
(14, 14, NULL, 2.5, '전반적으로 만족스러웠습니다.', '스위트룸', 'family'),
(15, 14, NULL, 3.5, '가격 대비 괜찮았어요.', '디럭스룸', 'couple'),
(16, 15, NULL, 4.0, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'business'),
(17, 15, NULL, 1.5, '평범한 숙박이었습니다.', '디럭스룸', 'family'),
(18, 16, NULL, 5.0, '완벽한 숙박이었습니다!', '스위트룸', 'couple'),
(19, 16, NULL, 2.0, '좋은 경험이었습니다.', '디럭스룸', 'family'),
(20, 17, NULL, 3.5, '시설은 좋았지만 직원들이 좀 아쉬웠어요.', '스위트룸', 'business'),
(21, 17, NULL, 4.0, '전반적으로 만족스러웠습니다.', '디럭스룸', 'couple'),
(22, 18, NULL, 2.5, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'family'),
(23, 18, NULL, 3.0, '평범한 숙박이었습니다.', '디럭스룸', 'couple'),
(24, 19, NULL, 4.5, '모든 것이 완벽했습니다!', '스위트룸', 'business'),
(25, 19, NULL, 1.5, '좋은 숙박이었습니다.', '디럭스룸', 'family'),
(2, 20, NULL, 3.0, '시설은 좋았지만 가격이 좀 비쌌어요.', '스위트룸', 'couple'),
(3, 20, NULL, 4.0, '전반적으로 만족스러웠습니다.', '디럭스룸', 'family'),
(4, 21, NULL, 2.5, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'business'),
(5, 21, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'couple'),
(6, 22, NULL, 4.0, '완벽한 숙박이었습니다!', '스위트룸', 'family'),
(7, 22, NULL, 1.0, '좋은 경험이었습니다.', '디럭스룸', 'couple'),
(8, 23, NULL, 3.0, '시설은 좋았지만 직원들이 좀 아쉬웠어요.', '스위트룸', 'business'),
(9, 23, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'family'),
(10, 24, NULL, 2.0, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'couple'),
(11, 24, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'family'),
(12, 25, NULL, 4.0, '모든 것이 완벽했습니다!', '스위트룸', 'business'),
(13, 25, NULL, 1.5, '좋은 숙박이었습니다.', '디럭스룸', 'couple'),
(14, 26, NULL, 3.0, '시설은 좋았지만 가격이 좀 비쌌어요.', '스위트룸', 'family'),
(15, 26, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'couple'),
(16, 27, NULL, 2.5, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'business'),
(17, 27, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'family'),
(18, 28, NULL, 4.0, '완벽한 숙박이었습니다!', '스위트룸', 'couple'),
(19, 28, NULL, 1.0, '좋은 경험이었습니다.', '디럭스룸', 'family'),
(20, 29, NULL, 3.0, '시설은 좋았지만 직원들이 좀 아쉬웠어요.', '스위트룸', 'business'),
(21, 29, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'couple'),
(22, 30, NULL, 2.0, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'family'),
(23, 30, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'couple'),
(24, 31, NULL, 4.0, '모든 것이 완벽했습니다!', '스위트룸', 'business'),
(25, 31, NULL, 1.5, '좋은 숙박이었습니다.', '디럭스룸', 'family'),
(2, 32, NULL, 3.0, '시설은 좋았지만 가격이 좀 비쌌어요.', '스위트룸', 'couple'),
(3, 32, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'family'),
(4, 33, NULL, 2.5, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'business'),
(5, 33, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'couple'),
(6, 34, NULL, 4.0, '완벽한 숙박이었습니다!', '스위트룸', 'family'),
(7, 34, NULL, 1.0, '좋은 경험이었습니다.', '디럭스룸', 'couple'),
(8, 35, NULL, 3.0, '시설은 좋았지만 직원들이 좀 아쉬웠어요.', '스위트룸', 'business'),
(9, 35, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'family'),
(10, 36, NULL, 2.0, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'couple'),
(11, 36, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'family'),
(12, 37, NULL, 4.0, '모든 것이 완벽했습니다!', '스위트룸', 'business'),
(13, 37, NULL, 1.5, '좋은 숙박이었습니다.', '디럭스룸', 'couple'),
(14, 38, NULL, 3.0, '시설은 좋았지만 가격이 좀 비쌌어요.', '스위트룸', 'family'),
(15, 38, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'couple'),
(16, 39, NULL, 2.5, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'business'),
(17, 39, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'family'),
(18, 40, NULL, 4.0, '완벽한 숙박이었습니다!', '스위트룸', 'couple'),
(19, 40, NULL, 1.0, '좋은 경험이었습니다.', '디럭스룸', 'family'),
(20, 41, NULL, 3.0, '시설은 좋았지만 직원들이 좀 아쉬웠어요.', '스위트룸', 'business'),
(21, 41, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'couple'),
(22, 42, NULL, 2.0, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'family'),
(23, 42, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'couple'),
(24, 43, NULL, 4.0, '모든 것이 완벽했습니다!', '스위트룸', 'business'),
(25, 43, NULL, 1.5, '좋은 숙박이었습니다.', '디럭스룸', 'family'),
(2, 44, NULL, 3.0, '시설은 좋았지만 가격이 좀 비쌌어요.', '스위트룸', 'couple'),
(3, 44, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'family'),
(4, 45, NULL, 2.5, '시설과 서비스 모두 좋았습니다.', '스위트룸', 'business'),
(5, 45, NULL, 3.5, '평범한 숙박이었습니다.', '디럭스룸', 'couple'),
(6, 46, NULL, 4.0, '완벽한 숙박이었습니다!', '스위트룸', 'family'),
(7, 46, NULL, 1.0, '좋은 경험이었습니다.', '디럭스룸', 'couple'),
(8, 47, NULL, 3.0, '시설은 좋았지만 직원들이 좀 아쉬웠어요.', '스위트룸', 'business'),
(9, 47, NULL, 4.5, '전반적으로 만족스러웠습니다.', '디럭스룸', 'family');

-- hotels 테이블의 rating 업데이트
UPDATE hotels h
SET h.rating = (
    SELECT ROUND(AVG(r.rating), 1)
    FROM reviews r
    WHERE r.hotel_id = h.hotel_id
);

-- 호텔 부대시설 데이터 추가
INSERT INTO hotel_facilities (hotel_id, pool, spa, fitness, restaurant, parking, wifi) VALUES
(1, 1, 1, 0, 1, 0, 1),
(2, 0, 1, 1, 1, 0, 1),
(3, 1, 0, 1, 0, 1, 1),
(4, 1, 1, 0, 1, 1, 1),
(5, 0, 1, 1, 1, 0, 1),
(6, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 0, 0, 1, 1),
(8, 0, 1, 1, 1, 0, 1),
(9, 1, 0, 1, 1, 1, 1),
(10, 1, 1, 0, 1, 0, 1),
(11, 0, 1, 1, 0, 1, 1),
(12, 1, 0, 1, 1, 0, 1),
(13, 1, 1, 0, 1, 1, 1),
(14, 0, 0, 1, 1, 0, 1),
(15, 1, 0, 1, 1, 1, 1),
(16, 1, 1, 0, 0, 1, 1),
(17, 0, 1, 1, 1, 0, 1),
(18, 1, 0, 1, 1, 1, 1),
(19, 1, 1, 0, 1, 1, 1),
(20, 0, 1, 1, 0, 0, 1),
(21, 1, 0, 1, 1, 0, 1),
(22, 1, 0, 0, 1, 1, 1),
(23, 0, 1, 1, 1, 0, 1),
(24, 1, 0, 1, 1, 1, 1),
(25, 1, 1, 0, 0, 1, 1),
(26, 0, 1, 1, 1, 0, 1),
(27, 1, 0, 1, 1, 1, 1),
(28, 1, 1, 0, 1, 0, 1),
(29, 0, 1, 1, 0, 1, 1),
(30, 1, 0, 1, 1, 0, 1),
(31, 1, 1, 0, 1, 1, 1),
(32, 0, 1, 1, 1, 0, 1),
(33, 1, 0, 1, 1, 1, 1),
(34, 1, 1, 0, 0, 1, 1),
(35, 0, 1, 1, 1, 0, 1),
(36, 1, 0, 1, 1, 1, 1),
(37, 1, 1, 0, 1, 0, 1),
(38, 0, 1, 1, 0, 1, 1),
(39, 1, 0, 1, 1, 0, 1),
(40, 1, 1, 0, 1, 1, 1),
(41, 0, 1, 1, 1, 0, 1),
(42, 1, 0, 1, 1, 1, 1),
(43, 1, 1, 0, 0, 1, 1),
(44, 0, 1, 1, 1, 0, 1),
(45, 1, 0, 1, 1, 1, 1),
(46, 1, 1, 0, 1, 0, 1),
(47, 0, 1, 1, 0, 1, 1);

-- 이벤트 댓글 더미 데이터
INSERT INTO event_comments (user_id, comment, created_at) VALUES
(2, '호텔 시설이 정말 깔끔했고, 직원들의 친절한 서비스가 인상적이었어요. 홈페이지에서 예약도 간편하게 할 수 있었습니다.', '2025-05-01 10:15:23'),
(3, '홈페이지에서 부산 호텔 타임딜을 발견했는데, 정말 좋은 가격에 예약할 수 있었어요. 호텔 수영장도 너무 좋았습니다.', '2025-05-01 14:30:45'),
(4, '일본 호텔 예약이 홈페이지에서 너무 간편했어요. 위치도 좋고 호텔 레스토랑의 음식이 정말 맛있었습니다.', '2025-05-01 09:20:12'),
(5, '홈페이지의 리뷰 시스템이 정말 도움이 되었어요. 다른 이용자들의 후기를 보고 호텔을 선택할 수 있어서 좋았습니다.', '2025-05-02 16:45:30'),
(6, '호텔 뷰가 정말 멋졌고, 홈페이지에서 제공하는 사진과 실제가 거의 동일했어요. 예약 과정도 매우 간단했습니다.', '2025-05-02 11:10:15'),
(7, '홈페이지에서 이벤트 알림을 받아 참여했는데, 정말 좋은 경험이었어요. 호텔 스파 시설도 최고였습니다.', '2025-05-02 13:25:40'),
(8, '호텔 직원분들이 정말 친절했고, 홈페이지의 실시간 예약 확인 기능이 매우 편리했습니다.', '2025-05-03 15:40:22'),
(9, '홈페이지의 필터 기능으로 원하는 조건의 호텔을 쉽게 찾을 수 있었어요. 부산 호텔의 가성비가 정말 좋았습니다.', '2025-05-03 10:55:18'),
(10, '일본 호텔 예약이 홈페이지에서 너무 간편했어요. 호텔의 위치가 관광지와 가까워서 정말 좋았습니다.', '2025-05-03 14:20:33'),
(11, '홈페이지의 디자인이 깔끔하고 보기 좋았어요. 호텔의 조식이 정말 맛있었습니다.', '2025-05-01 09:35:27'),
(12, '호텔 시설이 정말 깔끔했고, 홈페이지에서 제공하는 상세 정보가 매우 도움이 되었어요.', '2025-05-01 16:50:42'),
(13, '홈페이지의 모바일 버전이 정말 잘 만들어져 있어서 이동 중에도 편하게 예약할 수 있었어요.', '2025-05-02 11:15:55'),
(14, '호텔 직원분들의 서비스가 최고였고, 홈페이지의 실시간 문의 기능이 매우 유용했습니다.', '2025-05-02 13:30:10'),
(15, '홈페이지에서 부산 호텔의 특가 정보를 확인하고 예약했는데, 정말 만족스러운 숙박이었어요.', '2025-05-03 15:45:25'),
(16, '일본 호텔의 위치가 정말 좋았고, 홈페이지의 지도 기능으로 주변 관광지를 쉽게 찾을 수 있었어요.', '2025-05-03 10:00:38'),
(17, '홈페이지의 예약 취소 정책이 명확해서 좋았어요. 호텔의 피트니스 센터 시설도 최고였습니다.', '2025-05-01 14:15:50'),
(18, '호텔의 뷰가 정말 멋졌고, 홈페이지에서 제공하는 가상 투어가 실제와 거의 동일했어요.', '2025-05-01 09:30:15'),
(19, '홈페이지의 이벤트 알림을 받아 참여했는데, 정말 좋은 경험이었어요. 호텔의 와이파이 속도도 빠르고 안정적이었습니다.', '2025-05-02 16:45:30'),
(20, '호텔 직원분들이 정말 친절했고, 홈페이지의 실시간 체크인/체크아웃 기능이 매우 편리했습니다.', '2025-05-02 11:10:45'),
(21, '홈페이지가 직관적이고 사용하기 편리했어요. 특히 호텔 검색 기능이 정말 좋았습니다.', '2025-05-03 13:25:20'),
(22, '호텔의 위치가 정말 좋았어요. 주변에 관광지가 많아서 여행하기 편했어요.', '2025-05-03 15:40:35'),
(23, '호텔의 조식이 정말 맛있었어요. 다양한 메뉴가 있어서 매일 다른 것을 먹을 수 있었어요.', '2025-05-01 10:55:50'),
(24, '호텔의 수영장이 정말 깔끔했어요. 특히 야간 조명이 아름다웠습니다.', '2025-05-02 14:20:15'),
(25, '호텔의 스파 시설이 최고였어요. 피로가 확 풀렸어요.', '2025-05-02 09:35:30'),
(26, '호텔의 룸서비스가 정말 빠르고 맛있었어요. 특히 피자와 파스타가 인상적이었어요.', '2025-05-03 16:50:45');

