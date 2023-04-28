<?php include(VIEWS . 'include/header.php') ?>
<a href="<?php route('product/index') ?>">All Products</a>
<h1>Products Index</h1>

<ul>
    <?php
    foreach ($data['allData'] as $product) {
        echo "<li>{$product['name']}</li>";
    }
    ?>
</ul>
<?php include(VIEWS . 'include/footer.php') ?>