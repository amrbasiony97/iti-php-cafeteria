<?php
$title = "Order List";
ob_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <title>Document</title>
</head>

<body>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="{{ route('site.landing-page') }}">Home</a>
          <span class="mx-2 mb-0">/</span>
          <strong class="text-black">Cart</strong>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12" method="post">
          <div class="site-blocks-table">
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

                foreach ($products as $key => $product) {

                  echo "
                  <tr>
                  <td>
                    <input type='hidden' name='order_products_id' value=" . "$product[5]" . " />
                  </td>
                    <td class='product-thumbnail text-center'  style='max-width: 100px'>
                      <img src=";
                  echo uploads("images/products/{$user['image']}");
                  echo "alt='Image' class='img-fluid' />
                    </td>

                    <td class='product-name text-center align-middle'>
                      <h2 class='h5 text-black'> $product[1] </h2>
                    </td>

                    <td class='text-center align-middle'>
                      <h2> $product[2] </h2>
                    </td>

                    <td class='align-middle'>
                    <div class='text-center' >
                        <div class='input-group mb-3' style='max-width: 150px'>
                          <div class='input-group-prepend'>
                        <button class='btn btn-outline-primary decrease-quantity-button js-btn-minus' type='submit'>
                          &minus;
                        </button>
                        </div>
                        <input type='text' class='form-control text-center product-count' 
                          placeholder='' aria-label='Example text with button addon' aria-describedby='button-addon1' value='$product[4]' />
                        <div class='input-group-append'>
                          <button class='btn btn-outline-primary increase-quantity-button js-btn-plus' type='submit'>
                          &plus;
                          </button>
                        </div>
                      </div>
                    </div>
                    </td>

                    <td class='text-center align-middle'> $product[3]  </td>

                    <td>
                      <form action='https://localhost/iti-php-cafeteria/public/Order/delete' method='POST' 
                        class='text-center'> 
                        <input type='hidden' name='order_products_id' value=" . "$product[5]" . " />
                        <button type='submit' class='btn btn-primary height-auto btn-sm delete-button'>
                        X
                        </button>
                      </form>
                    </td>
                  </tr>
                ";
                };

                ?>
                <div>
                  <div>Total Price</div>
                  <div></div>
                </div>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- JavaScript AJAX For INC & DEC Quantity -->

  <script>
    //Handling Inc Button
    let incButtons = document.querySelectorAll(".increase-quantity-button");
    incButtons.forEach(element => {
      element.addEventListener('click', function() {

        let order_products_id = this.parentNode.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.value;
        let productCountInput = this.parentNode.parentNode.querySelector('input');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/iti-php-cafeteria/public/Order/increase', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.responseType = 'json';
        xhr.onload = function() {
          if (xhr.status === 200) {
            productCountInput.value = xhr.response[0]["product_count"];
          } else {
            console.log('Error: ' + xhr.statusText);
          }
        };
        var params = "order_products_id=" + order_products_id;
        xhr.send(params);
      });
    });


    //Handling Dec Button
    let decButtons = document.querySelectorAll(".decrease-quantity-button");
    decButtons.forEach(element => {
      element.addEventListener("click", function() {
        let order_products_id = this.parentNode.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.value;
        let productCountInput = this.parentNode.parentNode.querySelector('input');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/iti-php-cafeteria/public/Order/decrease', true);

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.responseType = 'json';

        xhr.onload = function() {
          if (xhr.status === 200) {
            productCountInput.value = xhr.response[0]["product_count"];
          } else {
            console.log('Error: ' + xhr.statusText);
          }
        };
        var params = "order_products_id=" + order_products_id;
        xhr.send(params);
      })
    });


    //Handling Input Specific Product Number
    let productsCountInput = document.querySelectorAll(".product-count");
    productsCountInput.forEach(function(element) {
      element.addEventListener("blur", function() {
        let order_products_id = element.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.value;

        var xhr = new XMLHttpRequest();

        // Set the HTTP method and URL for the request
        xhr.open('POST', 'http://localhost/iti-php-cafeteria/public/Order/getAllProducts', true);

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
        let order_products_id = element.parentNode.querySelector("input").value;

        console.log(order_products_id);

        var xhr = new XMLHttpRequest();

        // Set the HTTP method and URL for the request
        xhr.open('POST', 'http://localhost/iti-php-cafeteria/public/Order/delete', true);

        // Set the response type to JSON
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
          if (xhr.status === 200) {
            element.parentNode.parentNode.parentNode.remove();
          }
        };

        let params = `order_products_id=${order_products_id}`;
        // Send the request
        xhr.send(params);

      })
    });
  </script>
</body>

</html>