<!-- Title and Extra CSS -->
<?php
$title = "All Products";
ob_start();
?>

<style>
    .x_content {
        padding-top: 20px;
        display: flex;
    }

    .products {
        margin: 10px;
        min-height: 70vh;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
    }

    img {
        width: 100px;
        display: block;
        border-radius: 50%;
        margin: auto;
    }

    img:hover {
        cursor: pointer;
    }

    .menu-price {
        font-size: 1.5rem;
        color: #33211D;
        background-color: #DA9F5B;
        border-radius: 10px;
        width: fit-content;
        margin: auto;
        margin-top: 10px;
        padding: 5px 12px;
        text-align: center;
        position: absolute;
        top: 0px;
        right: 0px;
    }

    .product-name {
        text-align: center;
        font-weight: bold;
    }
</style>
<?php
$extra_css = ob_get_clean();
?>

<!-- Main Content -->
<?php
ob_start();
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3 class="">All Products</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                
                    <div class="products">
                        <?php
                        foreach ($products as $product) {
                            echo "<div class='col-4 col-sm-3'>
                                    <img class='w-100 rounded-circle mb-3 mb-sm-0' src='";
                            echo uploads("images/products/{$product['image']}");
                            echo "' alt='product'>
                                    <h5 class='menu-price'>" . round($product['price'], 0) . " LE</h5>
                                    <p class='product-name'>{$product['name']}</p>
                                </div>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
?>

<!-- Extra JS -->
<?php
ob_start();
?>

<?php
if (isset($url)) {
    echo "<script>history.replaceState({}, '', '" . BASE_URL . $url . "')</script>;";
}
?>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/user.php') ?>