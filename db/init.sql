-- 0. 데이터베이스 생성 및 사용
CREATE DATABASE IF NOT EXISTS kisia_hotel DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kisia_hotel;

-- 1. users (회원 정보)
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_admin BOOLEAN DEFAULT FALSE
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
    facility_id INT PRIMARY KEY AUTO_INCREMENT,
    hotel_id INT,
    facility_name VARCHAR(50) NOT NULL,
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