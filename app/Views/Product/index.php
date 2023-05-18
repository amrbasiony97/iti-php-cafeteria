<?php include(VIEWS . 'include/header.php') ?>
<a href="<?php route('product/index') ?>">All Products</a>
<a href="<?php route('product/create') ?>">Create New</a>
<h1>Products Index</h1>

<ul>
  <?php
  echo "<div class='container'>";
  echo "<div class='row'>";
  foreach ($data['allData'] as $product) {
    echo "<div class='col-md-4 col-sm-4  profile_details'>
                        <div class='well profile_view'>
                          <div class='col-sm-12'>
                            <h4 class='brief'><i>"; ?><?php echo $product['name']; ?><?php echo "</i></h4>
                            <div class='left col-md-7 col-sm-7'>
                              <p><strong>Price: </strong> "; ?><?php echo $product['price'] . "$"; ?><?php echo " </p>
                            </div>
                            <div class='right col-md-5 col-sm-5 text-center'>
                            "; ?>
  <?php echo "<img src='"; ?><?php echo uploads("images/products/{$product['image']}"); ?><?php echo "'  class='img-circle img-fluid'>"; ?><?php echo "
                            </div>
                          </div>
                          <div class=' profile-bottom text-center'>
                            <div class=' col-sm-6 emphasis'>
                            </div>
                            <div class=' col-sm-6 emphasis'>
                              <a  class='btn btn-primary btn-sm' href='" ?>
  <?php echo route("Product/show/{$product['id']}'") ?>
<?php echo "'>
                                View Product
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>";
  }
  echo "</div>";
  echo "</div>";
?>
</ul>
<?php include(VIEWS . 'include/footer.php') ?>