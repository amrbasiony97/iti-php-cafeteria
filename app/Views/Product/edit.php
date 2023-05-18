<?php include(VIEWS . 'include/header.php') ?>
<?php 
var_dump($product) ; 
?>
<form action="<?php route('product/update') ?>" method="POST" enctype="multipart/form-data">
    <div class='form-group'>
        <label for='productName'>Product Name</label>
        <input type='text' class='form-control' name='productName' value=<?php 
        echo $product['name'] ; 
        ?>
        >
        <input type="text" name="id" value="<?php echo $product['id'] ?>
        "style="display:none">
    </div>
    <div class='form-group'>
        <label for='price'>Price</label>
        <input type='number' class='form-control' name='price' value=<?php 
        echo $product['price'] ; 
        ?>
        >
    </div>
    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Product Picture</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file"  name="image" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <button type='submit' class='btn btn-primary'>Update</button>
</form>