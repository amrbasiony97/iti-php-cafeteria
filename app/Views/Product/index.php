<?php include(VIEWS . 'include/header.php') ?>
<a href="<?php route('product/index') ?>">All Products</a>
<h1>Products Index</h1>

<ul>
    <?php
    echo "<div class='container'>" ; 
    echo "<div class='row'>" ; 
    foreach ($data['allData'] as $product) {
        echo "<div class='col-md-4 col-sm-4  profile_details'>
                        <div class='well profile_view'>
                          <div class='col-sm-12'>
                            <h4 class='brief'><i>RRRRRR</i></h4>
                            <div class='left col-md-7 col-sm-7'>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                            </div>
                            <div class='right col-md-5 col-sm-5 text-center'>
                              <img src='images/img.jpg' alt='' class='img-circle img-fluid'>
                            </div>
                          </div>
                          <div class=' profile-bottom text-center'>
                            <div class=' col-sm-6 emphasis'>
                             
                            </div>
                            <div class=' col-sm-6 emphasis'>
                              <button type='button' class='btn btn-success btn-sm'> <i class='fa fa-user'>
                                </i> <i class='fa fa-comments-o'></i> </button>
                              <button type='button' class='btn btn-primary btn-sm'>
                                <i class='fa fa-user'> </i> View Product
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>";
    }
     echo "</div>" ; 
     echo "</div>" ; 
    ?>
</ul>
<?php include(VIEWS . 'include/footer.php') ?>