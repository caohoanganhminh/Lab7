<?php
require_once __DIR__ . '/database.class.php';
$allowed = ['giaovien' => 'DANH SÁCH GIÁO VIÊN',
            'sinhvien' => 'DANH SÁCH SINH VIÊN',
            'hocphan' => 'DANH SÁCH HỌC PHẦN'];
$table = $_GET['chon'] ?? '';
if (!array_key_exists($table, $allowed)) {
    http_response_code(400);
    exit('Danh mục không hợp lệ.');
}
$dao = new Dao('root', '', 'udn');
$dao->table("SELECT * FROM `$table`", $allowed[$table]);
$dao->close();
