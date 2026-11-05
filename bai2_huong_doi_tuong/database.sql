CREATE DATABASE IF NOT EXISTS udn CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE udn;
CREATE TABLE IF NOT EXISTS sinhvien(masv VARCHAR(20) PRIMARY KEY, hoten VARCHAR(120), lop VARCHAR(30), diachi VARCHAR(120), matkhau VARCHAR(255));
CREATE TABLE IF NOT EXISTS giaovien(magv VARCHAR(20) PRIMARY KEY, hoten VARCHAR(120), bomon VARCHAR(120), email VARCHAR(120));
CREATE TABLE IF NOT EXISTS hocphan(mahp VARCHAR(20) PRIMARY KEY, tenhp VARCHAR(150), sotc INT);
INSERT INTO sinhvien VALUES
('S01','Nguyễn Hưng Nguyễn','TUD','Cao Bằng','1234'),
('S02','Lê Hoàng Nhi','TUD','Bắc Cạn','1234'),
('S03','Lê Thị Thúy Hằng','SPT','Lạng Sơn','1234')
ON DUPLICATE KEY UPDATE hoten=VALUES(hoten);
INSERT INTO giaovien VALUES
('GV01','Nguyễn Văn An','Công nghệ thông tin','an@example.com'),
('GV02','Trần Thị Bình','Toán','binh@example.com')
ON DUPLICATE KEY UPDATE hoten=VALUES(hoten);
INSERT INTO hocphan VALUES
('HP01','Lập trình Web nâng cao',3),
('HP02','Lập trình trực quan',3),
('HP03','Lập trình ĐTDĐ',2)
ON DUPLICATE KEY UPDATE tenhp=VALUES(tenhp);
