<?php
$link = mysqli_connect('localhost', 'root', '', 'udn');
if (!$link) {
    http_response_code(500);
    exit('Không thể kết nối CSDL: ' . htmlspecialchars(mysqli_connect_error()));
}
mysqli_set_charset($link, 'utf8mb4');
$term = trim($_GET['term'] ?? '');
if ($term !== '') {
    $sql = 'SELECT tenhp FROM hocphan WHERE tenhp LIKE ? ORDER BY tenhp LIMIT 20';
    $stmt = mysqli_prepare($link, $sql);
    $like = $term . '%';
    mysqli_stmt_bind_param($stmt, 's', $like);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = htmlspecialchars($row['tenhp'], ENT_QUOTES, 'UTF-8');
            echo '<p data-value="' . $name . '">' . $name . '</p>';
        }
    } else {
        echo '<p>Không tìm thấy kết quả nào</p>';
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
