<?php
session_start();
include('admin/config/Db.php');
if (!isset($_SESSION['gioHang'])) {
    // Nếu chưa tồn tại, khởi tạo một mảng rỗng
    $_SESSION['gioHang'] = array();
}
if (isset($_GET['id']) && isset($_GET['query']) && $_GET['query'] == 'themgiohang') {
    $id = $_GET['id'];
    // Lấy thông tin sản phẩm từ CSDL
    $sql = "SELECT * FROM danhmuc WHERE id = '".$id."'";
    $result = mysqli_query($mysqli, $sql);
    $product = mysqli_fetch_assoc($result);
    // Lưu thông tin sản phẩm vào mảng trong biến session
    $_SESSION['gioHang'][$_SESSION['taikhoan']][] = array(
        'hinhanh' => $product['HinhAnh'],
        'tenDanhMuc' => $product['Ten_Danh_Muc'],
        'giaTien' => $product['GiaTien']
    );
}
$sql_lk = "SELECT * FROM danhmuc ORDER BY id ASC";
$row_lk = mysqli_query($mysqli, $sql_lk);
if (isset($_SESSION['taikhoan'])) {
    $taikhoan = $_SESSION['taikhoan'];
} else {
    $taikhoan = "Guest";
}
$sql_lietke = "SELECT * FROM nguoidung ORDER BY id ASC";
$row_liet_ke = mysqli_query($mysqli, $sql_lietke);
function generateUniqueID() {
    $uniqueID = mt_rand(1, 9999);
    return $uniqueID;   
}
function madonUniqueID() {
    $madonID = mt_rand(1, 9999);
    return $madonID;
}
if (isset($_SESSION['gioHang'][$taikhoan]) && is_array($_SESSION['gioHang'][$taikhoan])) {
    foreach ($_SESSION['gioHang'][$taikhoan] as $sanPham) {
        unset($_SESSION['gioHang'][$taikhoan]);
        $id = generateUniqueID();
        $madon = madonUniqueID();
        $sql_them = "INSERT INTO donhang(`id`, `madon`, `SanPham`, `nguoidat`, `trangthai`) VALUES ('".$id."', '".$madon."', '".$sanPham['tenDanhMuc']."', '".$_SESSION['taikhoan']."', 'Không')";
        mysqli_query($mysqli,$sql_them);
        echo '<script>alert("Đã Đặt Đơn Hàng Thành Công! Chờ Xét Duyệt Và Giao Hàng"); window.location.href = "shopping-cart.php";</script>';
    }}
?>