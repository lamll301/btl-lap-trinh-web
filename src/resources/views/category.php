
<?php
    include '../../config/connect.php';
    if (isset($_GET['key'])) {
        $key = $_GET['key'];
        $sql = "SELECT * FROM watch WHERE name LIKE '%$key%'";
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort === 'asc') {
                $sql .= " ORDER BY current_price ASC";
            } elseif ($sort === 'desc') {
                $sql .= " ORDER BY current_price DESC";
            }
        }
        $stmt_watch = $conn -> prepare($sql);
        $query = $stmt_watch -> execute();
    }
    else {
        $category_id = $_GET['id'];
        $category_slug = $_GET['slug'];
        $sql = "SELECT * FROM watch WHERE category_slug LIKE '%$category_slug%'";
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort === 'asc') {
                $sql .= " ORDER BY current_price ASC";
            } elseif ($sort === 'desc') {
                $sql .= " ORDER BY current_price DESC";
            }
        }
        $stmt_watch = $conn -> prepare($sql);
        $query = $stmt_watch -> execute();
        // this.category
        $sql_category = "SELECT * FROM category WHERE id = '$category_id'";
        $stmt_category = $conn -> prepare($sql_category);
        $query_category = $stmt_category -> execute();
        if ($query_category) {
            $category = $stmt_category->fetch(PDO::FETCH_ASSOC);
        }
        $sql_categories = "SELECT * FROM category WHERE type = (SELECT type FROM category WHERE id = '$category_id') AND id != '$category_id'";
        $stmt_categories = $conn -> prepare($sql_categories);
        $query_categories = $stmt_categories -> execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/css/base.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/vendor/open-iconic-master/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" href="../../public/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="app">
        <?php include 'header.php'; ?>

        <div class="container">
            <div class="tab-pane grid">
                <div class="grid__row app__content ">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fa-solid fa-list fa-sm"></i>
                                Danh mục
                            </h3>

                            <ul class="category-list">
                                <?php
                                    if (isset($_GET['key'])) {

                                    }
                                    else {
                                        echo "
                                        <li class='category-item category-item--active'>
                                            <a href='/watch-shop/src/resources/views/category.php?id=".$category['id']."&slug=".$category['slug']."' class='category-item__link'>". $category['name'] ."</a>
                                        </li>
                                        ";
                                        if ($query_categories) {
                                            while ($row = $stmt_categories->fetch(PDO::FETCH_ASSOC)) {
                                                echo "
                                                <li class='category-item'>
                                                    <a href='/watch-shop/src/resources/views/category.php?id=".$row['id']."&slug=".$row['slug']."' class='category-item__link'>".$row['name']."</a>
                                                </li>
                                                ";
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                    </div>

                    <div class="grid__column-10">
                        <div class="home-filter">
                            <span class="home-filter-name">
                                <!-- {{#if (areNotUndefined keySearch)}}
                                
                                    Chúng tôi đã tìm thấy {{total}} kết quả cho "{{keySearch}}"
                                {{else}} -->
                                <?php 
                                if (isset($_GET['key'])) {
                                    echo "Chúng tôi đã tìm thấy ".$stmt_watch->rowCount()." kết quả cho '".$_GET['key']."'";
                                }
                                else echo $category['name'] . " Cao Cấp"; 
                                ?>
                                <!-- {{/if}} -->
                            </span>
                            <div class="home-filter-below">
                                <span class="home-filter-search"><?php echo $stmt_watch->rowCount(); ?> mặt hàng được tìm thấy chỉ trong Cao cấp</span>
                                <div class="home-filter-below-left">
                                    <span class="home-filter__label">Sắp xếp theo:</span>
                                    <div class="select-input">
                                        <span class="select-input__label">Phù hợp nhất</span>
                                        <i class="fa-solid fa-chevron-down select-input__icon"></i>
                                        <!-- list options -->
                                        <ul class="select-input__list">
                                            <li class="select-input__item select-input__item--active">
                                                <a href="#" class="select-input__link" data-sort-type="default">Phù hợp nhất</a>
                                            </li>
                                            <li class="select-input__item">
                                                <a href="" id="asc-link" class="select-input__link">Giá từ thấp tới cao</a>
                                            </li>
                                            <li class="select-input__item">
                                                <a href="" id="desc-link" class="select-input__link">Giá từ cao xuống thấp</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="home-product">
                            <div class="grid__row product-list">
                                <!-- product item -->
                                <?php
                                if ($query) {
                                    while ($row = $stmt_watch->fetch(PDO::FETCH_ASSOC)) {
                                        echo "
                                        <div class='grid__column-2-4'>
                                            <a class='home-product-item' href='/watch-shop/src/resources/views/product.php?id=".$row['id']."'>
                                                <div class='home-product-item__img' style='background-image: url(\"" . $row['avatar'] . "\");'></div>
                                                <h4 class='home-product-item__name'>Đồng hồ ". $row['name'] ."</h4>
                                                <div class='home-product-item__price'>
                                                    <span class='home-product-item__price-old'>đ". preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $row['old_price']) ."</span>
                                                    <span class='home-product-item__price-curr'>đ". preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $row['current_price']) ."</span> 
                                                </div>
                                                <div class='home-product-item__action'>
                                                    <div class='home-product-item__rating'>
                                                        <i class='home-product-item__star--gold fa-solid fa-star fa-sm'></i>
                                                        <i class='home-product-item__star--gold fa-solid fa-star fa-sm'></i>
                                                        <i class='home-product-item__star--gold fa-solid fa-star fa-sm'></i>
                                                        <i class='home-product-item__star--gold fa-solid fa-star fa-sm'></i>
                                                        <i class='fa-solid fa-star fa-sm'></i>
                                                    </div>
                                                    <span class='home-product-item__sold'>Còn lại: ". $row['stock_quantity'] ." cái.</span>
                                                </div>
                                                <div class='home-product-item__origin'>
                                                    <span class='home-product-item__origin-name'>". $row['origin'] ."</span>
                                                </div>
                                                <div class='home-product-item__favourite'>
                                                    <span class=''>Yêu thích</span>
                                                </div>
                                                <div class='home-product-item__sale-off'>
                                                    <span class='home-product-item__sale-off-percent'>". $row['discount'] ."%</span>
                                                    <span class='home-product-item__sale-off-label'>GIẢM</span>
                                                </div>
                                            </a>
                                        </div>
                                        ";
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        
                        <ul class="pagination home-product__pagination">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fa-solid fa-chevron-left"></i>
                                </a>
                            </li>

                            <li class="pagination-item pagination-item--active">
                                <a href="" class="pagination-item__link">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">2</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">3</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">4</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">5</a>
                            </li>
                            <li class="pagination-item pagination-item-3-dots">
                                <a href="" class="pagination-item__link">...</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">20</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <script src="../../public/js/jquery-3.7.0.min.js"></script>
    <script src="../../public/js/main.js"></script>
</body>
</html>

<script>
    const sortLinks = document.querySelectorAll('.select-input__link');
    const sortLabel = document.querySelector('.select-input__label');
    document.getElementById('asc-link').addEventListener('click', function(e) {
        e.preventDefault(); 
        var currentUrl = window.location.href;
        if (currentUrl.indexOf('&sort=') !== -1) {
            currentUrl = currentUrl.replace(/&sort=[^&]*/, '');
        }
        var newUrl = currentUrl + '&sort=asc';
        window.location.href = newUrl;

        sortLinks.forEach(link => link.parentElement.classList.remove('select-input__item--active'));
        this.parentElement.classList.add('select-input__item--active');
        sortLabel.textContent = 'Giá từ thấp tới cao';
    });

    document.getElementById('desc-link').addEventListener('click', function(e) {
        e.preventDefault(); 
        var currentUrl = window.location.href;
        if (currentUrl.indexOf('&sort=') !== -1) {
            currentUrl = currentUrl.replace(/&sort=[^&]*/, '');
        }
        var newUrl = currentUrl + '&sort=desc';
        window.location.href = newUrl;

        sortLinks.forEach(link => link.parentElement.classList.remove('select-input__item--active'));
        this.parentElement.classList.add('select-input__item--active');
        sortLabel.textContent = 'Giá từ cao xuống thấp';
    });
</script>

