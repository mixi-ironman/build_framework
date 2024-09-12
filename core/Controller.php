<?php

namespace Core;

class Controller {
   
    public function view($view, $data = []) {
        // Đường dẫn tới view cụ thể
        $content = '../app/Views/' . $view . '.php';
        
        require_once '../app/Views/layouts/dashboard.php';
    }
    

    // Hàm để kiểm tra dữ liệu đầu vào
    function validateInput($data) {
        $data = trim($data); // Xóa khoảng trắng đầu và cuối chuỗi
        $data = stripslashes($data); // Xóa các dấu gạch chéo
        $data = htmlspecialchars($data); // Chuyển đổi ký tự đặc biệt thành HTML entities
        return $data;
    }

}
