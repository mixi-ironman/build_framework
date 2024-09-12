<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Product;

class ProductController extends Controller{

    public function index()
    {
        $products = Product::all();
        // echo "<pre>"; 
        // print_r($products);
        // echo "</pre>";

        $this->view('products/index',['products' => $products]);
    }

    public function create() {
        $this->view('products/create');
    }

    public function store() {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $description  = isset($_POST['description']) ? $_POST['description'] : '';
        $price  = isset($_POST['price']) ? $_POST['price'] : '';
        $quantity  = isset($_POST['quantity']) ? $_POST['quantity'] : '';

        $name = $this->validateInput($name);
        $description  = $this->validateInput($description);
        $price  = $this->validateInput($price);
        $quantity  = $this->validateInput($quantity);

        // Xử lý ảnh
        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Lấy đường dẫn tạm thời của tệp
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            // Xác định tên tệp mới 
            $fileName = $_FILES['photo']['name'];
            $fileNameComponent = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameComponent));

            // Xác định loại ảnh hợp lệ
            // $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
            // if (in_array($fileExtension, $allowedExtensions)) {

                // Xác định thư mục lưu trữ
                $uploadFileDir = 'uploads/';
                // thư mục lưu trữ cố định
                $dest_path = $uploadFileDir . uniqid() . '.' . $fileExtension;

                // Di chuyển tệp từ thư mục tạm thời đến thư mục lưu trữ
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $photo = $dest_path;
                    
                } else {
                    // echo "<script>alert('Lỗi khi tải ảnh lên.');</script>";
                    // echo "<script>window.location.href='" . $this->site_path . "student/create';</script>";

                    return;
                }
            // } else {
            //     // echo "<script>alert('Định dạng ảnh không hợp lệ.');</script>";
            //     // echo "<script>window.location.href='" . $this->site_path . "student/create';</script>";

            //     return;
            // }
        }
        
        $_SESSION['flash_message'] = [
            'message' => 'Thêm Sản phẩm thành công!',
            'type' => 'success'
        ];

        // Chèn sản phẩm vào cơ sở dữ liệu
        Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $photo,
        ]);

        header('Location: ' .BASE_PATH. 'product/index');
    }

    // public function show($studentId =null){

    //     if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['studentId'])) {
    //         $studentId = $_GET['studentId'];
    //         $studentModel = $this->student;
    //         $student = $studentModel->getById($studentId);
    //         // echo "<pre>"; 
    //         // print_r($student);
    //         // echo "</pre>";
    //         echo json_encode([
    //             'status' => 'success',
    //             'studentId' => $studentId,
    //             'student' => $student
    //         ]);
    //     }
    // }
    
    public function edit($id) {
        $product = Product::find($id);

        $this->view('products/edit', ['product' => $product]);

    }

    public function update($id) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $description  = isset($_POST['description']) ? $_POST['description'] : '';
        $price  = isset($_POST['price']) ? $_POST['price'] : '';
        $quantity  = isset($_POST['quantity']) ? $_POST['quantity'] : '';

        $name = $this->validateInput($name);
        $description  = $this->validateInput($description);
        $price  = $this->validateInput($price);
        $quantity  = $this->validateInput($quantity);
    
        // Lấy thông tin sinh viên hiện tại
        $product = Product::find($id);
    
        // Xử lý ảnh nếu có
        $photo = $product->photo; // Giữ lại ảnh cũ
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Lấy đường dẫn tạm thời của tệp
            $fileTmpPath = $_FILES['photo']['tmp_name'];
    
            // Xác định tên tệp mới 
            $fileName = $_FILES['photo']['name'];
            $fileNameComponent = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameComponent));
    
            // Xác định loại ảnh hợp lệ
            // $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
            // if (in_array($fileExtension, $allowedExtensions)) {
                // Xác định thư mục lưu trữ
                $uploadFileDir = 'uploads/';
                $dest_path = $uploadFileDir . uniqid() . '.' . $fileExtension;
    
                // Di chuyển tệp từ thư mục tạm thời đến thư mục lưu trữ
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Nếu ảnh mới được tải lên thành công, xóa ảnh cũ nếu có
                    if ($photo && file_exists($photo)) {
                        unlink($photo); // Xóa file cũ
                    }
                    // Cập nhật đường dẫn của ảnh mới
                    $photo = $dest_path;
                } else {
                    echo "<script>alert('Lỗi khi tải ảnh lên.');</script>";
                    // echo "<script>window.location.href='" . $this->site_path . "student/edit/$id';</script>";

                    return;
                }
            // } else {
            //     echo "<script>alert('Định dạng ảnh không hợp lệ.');</script>";
            //     // echo "<script>window.location.href='" . $this->site_path . "student/edit/$id';</script>";

            //     return;
            // }
        }

        $_SESSION['flash_message'] = [
            'message' => 'Sửa thông tin sinh viên thành công!',
            'type' => 'success'
        ];
    
        // Cập nhật thông tin sinh viên
        if ($photo) {
            Product::where('id', $id)->update([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $photo,
            ]);
        } else {
            Product::where('id', $id)->update([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity,
            ]);
        }
    
        header('Location: ' . BASE_PATH . 'product/index');
    }
    
    public function delete($id) {
        Product::destroy($id);

        $_SESSION['flash_message'] = [
            'message' => 'Xóa sinh viên thành công!',
            'type' => 'success'
        ];

        header('Location: '. BASE_PATH .'product/index');
    }

 }
