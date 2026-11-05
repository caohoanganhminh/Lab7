<?php
session_start();
require_once __DIR__ . '/connect.php';

$user = trim($_GET['user'] ?? '');
$pass = $_GET['pass'] ?? '';
if ($user === '' || $pass === '') {
    exit('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.');
}

$stmt = mysqli_prepare($con, 'SELECT masv, hoten, lop FROM sinhvien WHERE masv = ? AND matkhau = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['code'] = $row['masv'];
    $_SESSION['info'] = $row['hoten'] . ' - ' . $row['lop'];
    echo 'Đăng nhập thành công. Xin chào ' . htmlspecialchars($row['hoten']) .
         ' - Lớp ' . htmlspecialchars($row['lop']) . '. ';
    echo '<a href="logout.php">Đăng xuất</a>';
} else {
    echo 'Bạn đã nhập thông tin sai!';
}
mysqli_stmt_close($stmt);
mysqli_close($con);
