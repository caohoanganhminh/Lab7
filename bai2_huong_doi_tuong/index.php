<!doctype html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OOP with PHP</title>
<link rel="stylesheet" href="style.css">
<script>
function ajax(){
  const value = document.getElementById('chon').value;
  const box = document.getElementById('info');
  if(!value){ box.style.display='none'; box.innerHTML=''; return; }
  box.style.display='block';
  box.innerHTML='Đang tải dữ liệu...';
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState===4) box.innerHTML = xhr.status===200 ? xhr.responseText : 'Lỗi tải dữ liệu.';
  };
  xhr.open('GET','showTable.php?chon='+encodeURIComponent(value),true);
  xhr.send();
}
</script>
</head>
<body>
<main>
<h1>OOP with PHP</h1>
<select id="chon" onchange="ajax()">
<option value="">-- Chọn --</option>
<option value="giaovien">Giáo viên</option>
<option value="sinhvien">Sinh viên</option>
<option value="hocphan">Học phần</option>
</select>
<hr>
<div id="info" style="display:none"></div>
</main>
</body>
</html>
