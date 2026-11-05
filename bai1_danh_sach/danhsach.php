<?php
require_once __DIR__ . '/inc/connect.inc';
$result = mysqli_query($con, 'SELECT DISTINCT lop FROM sinhvien ORDER BY lop');
$classes = [];
while ($row = mysqli_fetch_assoc($result)) $classes[] = $row['lop'];
?>
<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ajax - Danh sách lớp</title>
<style>
body{font:14px Arial,sans-serif;margin:30px;color:#222}
h2{color:#173b75} select{padding:7px;margin:10px 0}
table{border-collapse:collapse;background:#f4f4f4;min-width:520px}
th,td{border:1px solid #aaa;padding:8px 12px;text-align:left}
.hd{background:navy;color:white} #ds{margin-top:18px}
</style>
<script>
function sendajax(){
  const lop = document.getElementById('lop').value;
  const box = document.getElementById('ds');
  if(!lop){ box.textContent='Vui lòng chọn lớp.'; return; }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState === 4){
      box.innerHTML = xhr.status === 200 ? xhr.responseText : 'Không thể tải dữ liệu.';
    }
  };
  xhr.open('GET','ds.php?lop='+encodeURIComponent(lop),true);
  xhr.send();
}
</script>
</head>
<body>
<h2>In danh sách sinh viên theo từng lớp</h2>
<label for="lop">Chọn lớp: </label>
<select id="lop" onchange="sendajax()">
<option value="">-- Chọn lớp --</option>
<?php foreach($classes as $lop): ?>
<option value="<?= htmlspecialchars($lop) ?>"><?= htmlspecialchars($lop) ?></option>
<?php endforeach; ?>
</select>
<div id="ds">Danh sách sinh viên sẽ hiển thị tại đây.</div>
</body>
</html>
