<!DOCTYPE html>
<html lang="en" style="margin-bottom: 0px">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title ?></title>

  <!-- Bootstrap -->
  <link href="<?php asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php asset('gentelella/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php asset('gentelella/build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php route('Home/index') ?>" class="site_title"><i class="fa fa-coffee"></i> <span>ITI Cafeteria</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php uploads("images/users/{$_SESSION['user']['image']}") ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>
                <?php
                if (isset($_SESSION['user']['name'])) {
                  echo $_SESSION['user']['name'];
                } else {
                  echo "User";
                }
                ?>
              </h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-coffee"></i> Order <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php route('Cart/index') ?>">Show Products</a></li>
                    <li><a href="<?php route('Cart/create') ?>">Order Now</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-credit-card"></i> My Orders <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="#">My Orders</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php uploads("images/users/{$_SESSION['user']['image']}") ?>" alt="">
                  <?php
                  if (isset($_SESSION['user']['name'])) {
                    echo $_SESSION['user']['name'];
                  } else {
                    echo "User";
                  }
                  ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="<?php route('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main" style="min-height: 95vh;">
        <!-- COOOOOOOOOOOONTENT--!>
        <?php

        if (!empty($cart_items)) {
        ?>

  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="product-thumbnail text-center">Image</th>
          <th class="product-name text-center">Product</th>
          <th class="product-price text-center">Price</th>
          <th class="product-quantity text-center">Quantity</th>
          <th class="product-total text-center">Total</th>
          <th class="product-remove text-center">Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php

          foreach ($cart_items as $key => $product) {

            echo "
                <tr>

                <td hidden >
                  <input name='order_products_id' value=" . "{$product['cart_item_id']}" . " />
                </td>

                  <td class='product-thumbnail text-center'  style='max-width: 100px'>
                    <img src='";
            echo uploads("images/products/{$product['image']}");
            echo "' alt='Image' class='img-fluid' />
                  </td>

                  <td class='product-name text-center align-middle'>
                    <h2 class='h5 text-black'> {$product['name']} </h2>
                  </td>

                  <td class='text-center align-middle'>
                    <h2> $product[2] </h2>
                  </td>

                  <td class='align-middle'>
                    <div class='d-flex justify-content-center align-items-center' >
                        <div class='input-group mb-3' style='max-width: 150px'>
                          <div class='input-group-prepend'>

                            <button class='btn btn-outline-primary decrease-quantity-button js-btn-minus' type='submit'>
                              &minus;
                            </button>
                          </div>

                        <input type='text' class='form-control text-center product-count' 
                          disabled value='$product[4]' />

                        <div class='input-group-append'>
                          <button class='btn btn-outline-primary increase-quantity-button js-btn-plus' type='submit'>
                          &plus;
                          </button>
                        </div>

                      </div>
                    </div>
                  </td>

                  <td class='text-center align-middle'> {$product['price']}  </td>

                  <td class='d-flex justify-content-center justify-content-center'>
                    <div class='d-flex justify-content-center justify-content-center'>
                      <form action='https://localhost/iti-php-cafeteria/public/Cart/delete' method='POST' 
                        class='d-flex justify-content-center justify-content-center'> 
                        <input type='hidden' name='order_products_id' value=" . "{$product['cart_item_id']}" . " />
                        <button type='submit' class='btn btn-primary delete-button'>
                        X
                        </button>
                      </form>
                    </div>
                    
                  </td>
                </tr>
              ";
          };

        ?>
      </tbody>
    </table>
    <div class="d-flex justify-content-between">
      <div>
        <h3>Total Price :</h3>
      </div>
      <div id="totalPrice">
        <h3>
          <?php echo $totalPrice ?>
        </h3>
      </div>
    </div>
    <form action="https://localhost/iti-php-cafeteria/public/Cart/checkout" method="GET">
      <button type="submit" class="btn btn-primary checkoutBtn" style="width: 120px;">CheckOut</button>
    </form>
  </div>

<?php
        } else {
?>
  <h1 class="text-center text-danger my-5">Cart Is Empty</h1>
<?php
        }


?>


<!-- JavaScript AJAX For INC & DEC Quantity -->

        <script>
          //Handling Inc Button
          let incButtons = document.querySelectorAll(".increase-quantity-button");
          incButtons.forEach(element => {
            element.addEventListener('click', function(e) {

              let cart_item_id = this.parentNode.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.value;
              let productCountInput = this.parentNode.parentNode.querySelector('input');

              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'https://localhost/iti-php-cafeteria/public/Cart/increase', true);
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
              xhr.responseType = 'json';
              xhr.onload = function() {
                if (xhr.status === 200) {
                  productCountInput.value = xhr.response[0]["quantity"];
                  document.querySelector("#totalPrice > h3").innerHTML = xhr.response[1];
                } else {
                  console.log('Error: ' + xhr.statusText);
                }
              };
              var params = "cart_item_id=" + cart_item_id;
              xhr.send(params);
            });
          });


          //Handling Dec Button
          let decButtons = document.querySelectorAll(".decrease-quantity-button");
          decButtons.forEach(element => {

            element.addEventListener("click", function(e) {
              let cart_item_id = this.parentNode.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.value;
              let productCountInput = this.parentNode.parentNode.querySelector('input');

              if (productCountInput.value <= 1) {
                e.stopPropagation();
              } else {

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'https://localhost/iti-php-cafeteria/public/Cart/decrease', true);

                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.responseType = 'json';

                xhr.onload = function() {
                  if (xhr.status === 200) {
                    productCountInput.value = xhr.response[0]["quantity"];
                    document.querySelector("#totalPrice > h3").innerHTML = xhr.response[1];
                  } else {
                    console.log('Error: ' + xhr.statusText);
                  }
                };
                var params = "cart_item_id=" + cart_item_id;
                xhr.send(params);

              }


            })
          });


          //Handling Input Specific Product Number
          let productsCountInput = document.querySelectorAll(".product-count");
          productsCountInput.forEach(function(element) {
            element.addEventListener("blur", function() {
              let order_products_id = element.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.value;

              var xhr = new XMLHttpRequest();

              // Set the HTTP method and URL for the request
              xhr.open('POST', 'https://localhost/iti-php-cafeteria/public/Cart/getAllProducts', true);

              // Set the response type to JSON
              xhr.responseType = 'json';
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

              // Define the callback function to handle the response
              xhr.onload = function() {
                if (xhr.status === 200) {
                  element.value = xhr.response[0]["product_count"];

                }
              };
              let params = `product_count=${element.value}&order_products_id=${order_products_id}`;
              // Send the request
              xhr.send(params);
            })
          });

          //Handling delete Button
          let deleteButtons = document.querySelectorAll(".delete-button");
          deleteButtons.forEach(element => {
            element.addEventListener("click", function(e) {
              e.preventDefault();
              let cart_item_id = element.parentNode.querySelector("input").value;

              var xhr = new XMLHttpRequest();

              // Set the HTTP method and URL for the request
              xhr.open('POST', 'https://localhost/iti-php-cafeteria/public/Cart/delete', true);

              // Set the response type to JSON
              xhr.responseType = 'json';
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

              xhr.onload = function() {
                if (xhr.status === 200) {
                  element.parentNode.parentNode.parentNode.parentNode.remove();
                }
              };

              let params = `cart_item_id=${cart_item_id}`;
              // Send the request
              xhr.send(params);

            })
          });

          // let checkoutBtn = document.querySelector(".checkoutBtn");
          // checkoutBtn.addEventListener("click", function(e) {
          //   var xhr = new XMLHttpRequest();

          //   // Set the HTTP method and URL for the request
          //   xhr.open('POST', 'http://localhost/iti-php-cafeteria/public/Cart/checkout', true);

          //   // Set the response type to JSON
          //   xhr.responseType = 'json';
          //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          //   xhr.onload = function() {
          //     if (xhr.status === 200) {
          //       content = document.querySelector(".container");
          //       content.remove();
          //     }
          //   };

          //   let params = `cart_item_id=${cart_item_id}`;
          //   // Send the request
          //   xhr.send(params);

          // })
        </script>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Made with <span style="color: #e25555;">&hearts;</span> By ITI Mansoura - Intake 43
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php asset('gentelella/vendors/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php asset('gentelella/vendors/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?php asset('gentelella/vendors/nprogress/nprogress.js') ?>"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php asset('gentelella/build/js/custom.min.js') ?>"></script>

  <!-- Extra JS -->
  <?= $extra_js ?>
</body>

</html>