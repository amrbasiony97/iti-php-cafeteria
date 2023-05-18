<?php include(VIEWS . 'include/header.php') ?>


<form action="<?php route('product/store') ?>" method="POST" enctype="multipart/form-data">
    <div class='form-group'>
        <label for='productName'>Product Name</label>
        <input type='text' class='form-control' name='productName' aria-describedby='emailHelp' placeholder='Enter Product name'>
    </div>
    <div class='form-group'>
        <label for='price'>Price</label>
        <input type='number' class='form-control' name='price' placeholder='price'>
    </div>
    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Product Picture</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file"  name="image" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <button type='submit' class='btn btn-primary'>Submit</button>
</form>