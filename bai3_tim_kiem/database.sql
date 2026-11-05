CREATE DATABASE IF NOT EXISTS udn CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE udn;
CREATE TABLE IF NOT EXISTS hocphan(mahp VARCHAR(20) PRIMARY KEY, tenhp VARCHAR(150) NOT NULL, sotc INT DEFAULT 3);
INSERT INTO hocphan(mahp,tenhp,sotc) VALUES
('HP01','Lập trình Web nâng cao',3),
('HP02','Lập trình trực quan',3),
('HP03','Lập trình ĐTDĐ',2),
('HP04','Cơ sở dữ liệu',3),
('HP05','Mạng máy tính',3)
ON DUPLICATE KEY UPDATE tenhp=VALUES(tenhp),sotc=VALUES(sotc);
