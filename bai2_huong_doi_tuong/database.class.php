<?php
class Dao {
    private mysqli $con;

    public function __construct($user, $pass, $db) {
        $host = 'localhost';
        $this->con = new mysqli($host, $user, $pass, $db);
        if ($this->con->connect_error) {
            die('Lỗi kết nối CSDL: ' . $this->con->connect_error);
        }
        $this->con->set_charset('utf8mb4');
    }

    public function query($sql) {
        $result = $this->con->query($sql);
        if (!$result) die('Lỗi truy vấn: ' . $this->con->error);
        return $result;
    }

    public function table($sql, $header) {
        $rs = $this->query($sql);
        echo '<section class="table-wrap"><h3>' . htmlspecialchars($header) . '</h3><table><thead><tr>';
        if ($rs->num_rows > 0) {
            $fields = $rs->fetch_fields();
            foreach ($fields as $field) echo '<th>' . htmlspecialchars($field->name) . '</th>';
            echo '</tr></thead><tbody>';
            while ($row = $rs->fetch_assoc()) {
                echo '<tr>';
                foreach ($row as $value) echo '<td>' . htmlspecialchars((string)$value) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
        } else {
            echo '<th>Thông báo</th></tr></thead><tbody><tr><td>Không có dữ liệu.</td></tr></tbody>';
        }
        echo '</table></section>';
        $rs->free();
    }

    public function close() { $this->con->close(); }
}
