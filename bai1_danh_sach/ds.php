<?php
require_once __DIR__ . '/inc/connect.inc';

$lop = trim($_GET['lop'] ?? '');
if ($lop === '') {
    exit('<p>Vui lòng chọn lớp.</p>');
}

$stmt = mysqli_prepare($con, 'SELECT masv, hoten, diachi FROM sinhvien WHERE lop = ? ORDER BY masv');
mysqli_stmt_bind_param($stmt, 's', $lop);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

echo '<table><thead><tr class="hd"><th>TT</th><th>Mã số</th><th>Họ tên</th><th>Địa chỉ</th></tr></thead><tbody>';
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>' . $i++ . '</td><td>' . htmlspecialchars($row['masv']) .
         '</td><td>' . htmlspecialchars($row['hoten']) . '</td><td>' .
         htmlspecialchars($row['diachi']) . '</td></tr>';
}
if ($i === 1) echo '<tr><td colspan="4">Không có sinh viên trong lớp này.</td></tr>';
echo '</tbody></table>';
mysqli_stmt_close($stmt);
