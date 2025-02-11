<?php
session_start();
if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    echo "<script>window.location = '../index.php';</script>";
}
// delete_product_turnoff.php
include '../connect.php'; // kết nối database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    $sql = "DELETE FROM sp WHERE MASP = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        echo "<h3 class='text-success'>Xóa thành công!</h3>";
    } else {
        echo "<h3 class='text-danger'>Lỗi: </h3>" . $stmt->error;
    }

    $stmt->close();
}

// Nạp sản phẩm
$sql = "SELECT MASP, TENSP, status FROM sp";
$result = $connect->query($sql);

//Nạp sản phẩm dựa trên thanh tìm kiếm
$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// Fetch products based on search query
$sql = "SELECT MASP, TENSP, status FROM sp WHERE TENSP LIKE ?";
$stmt = $connect->prepare($sql);
$searchTerm = '%' . $searchQuery . '%';
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Xóa sản phẩm</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5 mx-auto w-auto">
    <a href="admin.php">
    <h2>Về trang admin</h2>
    </a>
        <h2>Xóa-sửa-tắt sản phẩm</h2>
        <form method="GET" action="delete_update_toggle_product.php" class="my-3">
            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" class="w-50" value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['MASP']); ?></td>
                    <td><?php echo htmlspecialchars($row['TENSP']); ?></td>
                    <td><?php echo htmlspecialchars($row['status'] == 1 ? 'Active' : 'Inactive'); ?></td>
                    <td>
                        <form method="POST"
                            action="delete_update_toggle_product.php"
                            style="display:inline;">
                            <input type="hidden"
                                name="product_id"
                                value="<?php echo $row['MASP']; ?>">
                            <button type="submit">Xóa</button>
                        </form>
                        <form method="GET"
                            action="update_product.php"
                            style="display:inline;">
                            <input type="hidden"
                                name="product_id"
                                value="<?php echo $row['MASP']; ?>">
                            <button type="submit">Sửa</button>
                        </form>
                        <form method="POST"
                            action="toggle_status.php"
                            style="display:inline;">
                            <input type="hidden"
                                name="product_id"
                                value="<?php echo $row['MASP']; ?>">
                            <button type="submit"><?php echo $row['status'] == 1 ? 'Tắt' : 'Bật'; ?></button>
                        </form>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <?php
    $connect->close();
        ?>
    </div>
</body>

</html>

