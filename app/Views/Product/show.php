<?php include(VIEWS . 'include/header.php') ?>
<?php
// var_dump($product);
?>
<div class="row p-2 bg-white border rounded mt-2">
    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo uploads("images/products/{$product['image']}") ?>"></div>
    <div class="col-md-6 mt-1">
        <h5><?php
            echo $product['name'];
            ?>
        </h5>
        <div class="d-flex flex-row">
            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
        </div>

    </div>
    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
        <div class="d-flex flex-row align-items-center">
            <h4 class="mr-1">$<?php
                                echo $product['price'];
                                ?></h4><span class="strike-text">$<?php
                                                                    echo $product['price'];
                                                                    ?></span>
        </div>
        <h6 class="text-success">New Product</h6>
        <div class="d-flex flex-column mt-4">
            <a class="btn btn-primary btn-sm" href="<?php echo route("Product/edit/{$product['id']}") ?>">Edit</a>
            <form action="" method="post">
                <button class="btn btn-danger btn-sm mt-2">Delete</button>
            </form>
        </div>
    </div>
</div>