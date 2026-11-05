CREATE DATABASE IF NOT EXISTS udn CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE udn;
CREATE TABLE IF NOT EXISTS sinhvien(
  masv VARCHAR(20) PRIMARY KEY,
  hoten VARCHAR(120) NOT NULL,
  lop VARCHAR(30) NOT NULL,
  diachi VARCHAR(120) DEFAULT '',
  matkhau VARCHAR(255) NOT NULL DEFAULT '1234'
);
INSERT INTO sinhvien(masv,hoten,lop,diachi,matkhau) VALUES
('S01','Nguyễn Hưng Nguyễn','TUD','Cao Bằng','1234'),
('S02','Lê Hoàng Nhi','TUD','Bắc Cạn','1234'),
('S03','Lê Thị Thúy Hằng','SPT','Lạng Sơn','1234')
ON DUPLICATE KEY UPDATE hoten=VALUES(hoten),lop=VALUES(lop),diachi=VALUES(diachi),matkhau=VALUES(matkhau);
-- Tài khoản mẫu: S01 / 1234
