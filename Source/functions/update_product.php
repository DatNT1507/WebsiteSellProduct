<?php
session_start();
if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    echo "<script>window.location = '../index.php';</script>";
}
// update_product.php
include '../connect.php'; // Include your database connection file

$product = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $brandId = $_POST['brand_id'];
    $categoryId = $_POST['category_id'];
    $price = $_POST['price'];
    $storage = $_POST['storage'];
    $dvt = $_POST['dvt'];
    $madein = $_POST['nuocsx'];
    $image = $_POST['image'];

    $sql = "UPDATE sp SET TENSP = ?, brand_id = ?, category_id = ?, GIA = ?, DUNGLUONG = ?, DVT = ?, NUOCSX = ?, HINHANH = ? WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssissssi", $productName, $brandId, $categoryId, $price, $storage, $dvt, $madein, $image, $productId);

    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật sản phẩm thành công!')</script>";
    } else {
        echo "<h3 class='text-danger'>Lỗi: </h3>" . $stmt->error;
    }

    $stmt->close();

    // Fetch the updated product details
    $sql = "SELECT * FROM sp WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
} elseif (isset($_GET['product_id'])) {
    // Fetch product details if product_id is passed as a query parameter
    $productId = $_GET['product_id'];
    $sql = "SELECT * FROM sp WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

// Fetch brands and categories for the dropdowns
$brands = $connect->query("SELECT brand_id, brand_title FROM brands");
$categories = $connect->query("SELECT category_id, category_title FROM categories");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Sản Phẩm</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container w-25 mx-auto my-5">
        <h2>Cập nhật sản phẩm</h2>
        <?php if ($product): ?>
        <form method="POST"
            action="update_product.php">
            <input type="hidden"
                name="product_id"
                value="<?php echo htmlspecialchars($product['MASP']); ?>">
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td><label for="product_name">Tên Sản Phẩm:</label></td>
                    <td><input type="text"
                            id="product_name"
                            name="product_name"
                            value="<?php echo htmlspecialchars($product['TENSP']); ?>"
                            required></td>
                </tr>
                <tr>
                    <td><label for="brand_id">Thương Hiệu:</label></td>
                    <td>
                        <select id="brand_id"
                            name="brand_id"
                            required>
                            <?php while ($row = $brands->fetch_assoc()): ?>
                            <option value="<?php echo $row['brand_id']; ?>"
                                <?php if ($row['brand_id'] == $product['brand_id']) {
                                echo 'selected';
                            }
                            ?>>
                                <?php echo $row['brand_title']; ?>
                            </option>
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
                            <option value="<?php echo $row['category_id']; ?>"
                                <?php if ($row['category_id'] == $product['category_id']) {
        echo 'selected';
        }
        ?>>
                                <?php echo $row['category_title']; ?>
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
                            value="<?php echo htmlspecialchars($product['GIA']); ?>"
                            required></td>
                </tr>
                <tr>
                    <td><label for="storage">Dung Lượng:</label></td>
                    <td>
                        <select id="storage"
                            name="storage"
                            required>
                            <option value="128GB"
                                <?php if ($product['DUNGLUONG'] == '128GB') {
        echo 'selected';
        }
        ?>>128GB</option>
                            <option value="32GB"
                                <?php if ($product['DUNGLUONG'] == '32GB') {
        echo 'selected';
        }
        ?>>32GB</option>
                            <option value="64GB"
                                <?php if ($product['DUNGLUONG'] == '64GB') {
        echo 'selected';
        }
        ?>>64GB</option>
                            <option value="256GB"
                                <?php if ($product['DUNGLUONG'] == '256GB') {
        echo 'selected';
        }
        ?>>256GB</option>
                            <option value="None"
                                <?php if ($product['DUNGLUONG'] == 'None') {
        echo 'selected';
        }
        ?>>None</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="dvt">Đơn Vị Tính:</label></td>
                    <td>
                        <select id="dvt"
                            name="dvt"
                            required>
                            <option value="Cai"
                                <?php if ($product['DVT'] == 'Cai') {
        echo 'selected';
        }
        ?>>Cái</option>
                            <option value="vnd"
                                <?php if ($product['DVT'] == 'vnd') {
        echo 'selected';
        }
        ?>>VND</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="nuocsx">Nước Sản Xuất:</label></td>
                    <td>
                        <select id="nuocsx"
                            name="nuocsx"
                            required>
                            <option value="Vietnam"
                                <?php if ($product['NUOCSX'] == 'Vietnam') {
        echo 'selected';
        }
        ?>>Vietnam</option>
                            <option value="Japan"
                                <?php if ($product['NUOCSX'] == 'Japan') {
        echo 'selected';
        }
        ?>>Japan</option>
                            <option value="America"
                                <?php if ($product['NUOCSX'] == 'America') {
        echo 'selected';
        }
        ?>>America</option>
                            <option value="China"
                                <?php if ($product['NUOCSX'] == 'China') {
        echo 'selected';
        }
        ?>>China</option>
                            <option value="Korean"
                                <?php if ($product['NUOCSX'] == 'Korean') {
        echo 'selected';
        }
        ?>>Korean</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">URL Hình Ảnh:</label></td>
                    <td><input type="text"
                            id="image"
                            name="image"
                            value="<?php echo htmlspecialchars($product['HINHANH']); ?>"
                            required
                            class="w-100"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-success btn-lg fw-bold w-100">Cập nhật </button></td>
                </tr>
            </table>
        </form>
        <?php else: ?>
        <p>Sản phẩm không tồn tại.</p>
        <?php endif;?>
        <?php
$connect->close();
?>

<a href="admin.php"><h2>Về trang admin</h2></a>
        </div>
        
</body>

</html>

