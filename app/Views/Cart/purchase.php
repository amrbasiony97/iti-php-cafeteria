<!-- Title and Extra CSS -->
<?php
$title = "My Cart";
ob_start();
?>

<style>
  img {
    width: 100px;
  }
</style>

<?php
$extra_css = ob_get_clean();
?>

<!-- Main Content -->
<?php
ob_start();
?>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0">
        <a href="<?php route('Home/index') ?>">Home</a>
        <span class="mx-2 mb-0">/</span>
        <strong class="text-black">Cart</strong>
      </div>
    </div>
  </div>
</div>

<?php

if (!empty($products)) {
?>

  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="product-thumbnail text-center">Image</th>
          <th class="product-name text-center">Product</th>
          <th class="product-price text-center">Price</th>
          <th class="product-quantity text-center">Quantity</th>
          <!-- <th class="product-total text-center">Total</th>           
                          <td class='text-center align-middle'> {$product['price']}  </td>
-->
          <th class="product-remove text-center">Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php

        foreach ($products as $key => $product) {

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

                    <td class='d-flex justify-content-center justify-content-center'>
                      <div class='d-flex justify-content-center justify-content-center'>
                        <form action='https://localhost/iti-php-cafeteria/public/Cart/delete' method='POST' 
                          class='d-flex justify-content-center justify-content-center'> 
                          <input type='hidden' name='order_products_id' value=" . "{$product['cart_item_id']}" . " />
                          <button type='submit' class='btn btn-danger delete-button'>
                            <i class='fa fa-trash'></i>
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

<?php
$content = ob_get_clean();
?>

<!-- Extra JS -->
<?php
ob_start();
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

<?php
if (isset($url)) {
  echo "<script>history.replaceState({}, '', '" . BASE_URL . $url . "')</script>;";
}
?>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/user.php') ?>