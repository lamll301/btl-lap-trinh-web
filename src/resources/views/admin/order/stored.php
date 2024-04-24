<?php
    include '../../../../config/connect.php';
    if (isset($_GET['key'])) {
        $key = $_GET['key'];
        $sql = "SELECT * FROM orders WHERE customer_name LIKE '%$key%' OR id LIKE '%$key%'";
        $stmt = $conn -> prepare($sql);
        $query = $stmt -> execute();
    }
    else {
        $sql = "SELECT * FROM orders";
        $stmt = $conn -> prepare($sql);
        $query = $stmt -> execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../../../public/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="app">
        <?php include '../header.php'; ?>

        <div class="container">
            <div class="mt-4">
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <h3>Tất cả đơn hàng</h3>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày tạo đơn</th>
                            <th scope="col">Cập nhật mới nhất</th>
                            <th scope="col" colspan="4"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($query) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "
                                <tr>
                                    <th scope='row'>". $row['id'] ."</th>
                                    <td>". $row['customer_name'] ."</td>
                                    <td>". $row['customer_number'] ."</td>
                                    <td>đ". preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $row['total_price']) ."</td>
                                    <td>". $row['createdAt'] ."</td>
                                    <td>". $row['updatedAt'] ."</td>
                                    <td>
                                        <a href='/watch-shop/src/resources/views/admin/order/detail.php?id=". $row['id'] ."' class='btn btn-primary' type='submit'>Chi tiết</a>
                                    </td>
                                    <td>
                                        <a href='' class='btn btn-primary' type='submit' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#delete-prod-modal'>Xóa</a>
                                    </td>
                                </tr>
                                ";
                            }
                        }
                    ?>
                    
                    </tbody>
                </table>
            </div>

            <div id="delete-prod-modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa sản phẩm?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-delete" type="button" class="btn btn-danger">Xoá bỏ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
                </div>
            </div>
            </div>

            <form name="delete-form" method="POST"></form>

            <script>

                document.addEventListener('DOMContentLoaded', function() {

                    var id;
                    var deleteForm = document.forms['delete-form'];
                    var btnDelete = document.getElementById('btn-delete');

                    // when dialog confirm clicked
                    $('#delete-prod-modal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget);
                        id = button.data('id');
                    });
                    // when delete prod btn click 
                    btnDelete.onclick = function () {
                        deleteForm.action = '/watch-shop/src/resources/views/admin/order/delete_order.php?id=' + id;
                        deleteForm.submit();
                    }
                });
            </script>
        </div>

        <?php include '../footer.php'; ?>
    </div>
    <script src="../../../../public/js/jquery-3.7.0.min.js"></script>
    <script src="../../../../public/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

