<?php
session_start();
if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    echo "<script>window.location = '../index.php';</script>";
}
// add_product.php
include '../connect.php'; // kết nối database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $brandId = $_POST['brand_id'];
    $categoryId = $_POST['category_id'];
    $price = $_POST['price'];
    $storage = $_POST['storage'];
    $dvt = $_POST['dvt'];
    $madein = $_POST['nuocsx'];
    $image = $_POST['image'];
    $status = 1;

    $sql = "INSERT INTO sp (TENSP, brand_id, category_id, GIA, DUNGLUONG, DVT, NUOCSX, HINHANH, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssissssi", $productName, $brandId, $categoryId, $price, $storage, $dvt, $madein, $image, $status);

    if ($stmt->execute()) {
        echo "<h3 class='text-success'>Thêm sản phẩm thành công!</h3>";
    } else {
        echo "<h3 class='text-danger'>Lỗi: </h3>" . $stmt->error;
    }

    $stmt->close();
    
}

// Nạp thương hiệu và loại
$brands = $connect->query("SELECT brand_id, brand_title FROM brands");
$categories = $connect->query("SELECT category_id, category_title FROM categories");
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="w-25 mx-auto my-5">
        <h2>Thêm sản phẩm mới</h2>
        <form method="POST"
            action="add_product.php">
            <table class="table table-striped table-hover table-bordered w-">
                <tr>
                    <td><label for="product_name">Tên Sản Phẩm:</label></td>
                    <td><input type="text"
                            id="product_name"
                            name="product_name"
                            required></td>
                </tr>
                <tr>
                    <td><label for="brand_id">Thương Hiệu:</label></td>
                    <td>
                        <select id="brand_id"
                            name="brand_id"
                            required>
                            <?php while ($row = $brands->fetch_assoc()): ?>
                            <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_title']; ?></option>
                            <?php endwhile;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="category_id">Danh Mục:</label></td>
                    <td>
                        <select id="category_id"
                            name="category_id"
                            required>
                            <?php while ($row = $categories->fetch_assoc()): ?>
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_title']; ?>
                            </option>
                            <?php endwhile;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="price">Giá:</label></td>
                    <td><input type="number"
                            id="price"
                            name="price"
                            required></td>
                </tr>
                <tr>
                    <td><label for="storage">Dung Lượng:</label></td>
                    <td>
                        <select id="storage"
                            name="storage"
                            required>
                            <option value="128GB">128GB</option>
                            <option value="32GB">32GB</option>
                            <option value="64GB">64GB</option>
                            <option value="256GB">256GB</option>
                            <option value="None">None</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="dvt">Đơn Vị Tính:</label></td>
                    <td>
                        <select id="dvt"
                            name="dvt"
                            required>
                            <option value="Cai">Cái</option>
                            <option value="vnd">VND</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="nuocsx">Nước Sản Xuất:</label></td>
                    <td>
                        <select id="nuocsx"
                            name="nuocsx"
                            required>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Japan">Japan</option>
                            <option value="America">America</option>
                            <option value="China">China</option>
                            <option value="Korean">Korean</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">URL Hình Ảnh:</label></td>
                    <td><input type="text"
                            id="image"
                            name="image"
                            class="w-100"
                            required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-success w-100 fw-bold">Thêm sản phẩm</button></td>
                </tr>
            </table>
        </form>
        <a href="admin.php">
            <h2 class="my-5">Về trang admin</h2>
        </a>
    </div>
</body>

</html>