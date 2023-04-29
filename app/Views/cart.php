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

                    <td class='product-thumbnail text-center'  style='max-width: 100px'>
                      <img src='../../public/assets/images/30cdadfe330b0b7e41a9db8eeb3c504f.png.webp'
                       alt='Image' class='img-fluid' />
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
                        <input type='text' class='form-control text-center' 
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
                      <form action='http://localhost/php/iti-php-cafeteria/public/Order/delete' method='POST' 
                        class='text-center'> 
                        <input type='hidden' name='id' value=" . "$product[5]" . " />
                        <button type='submit' class='btn btn-primary height-auto btn-sm'>
                        X
                        </button>
                      </form>
                    </td>
                  </tr>
                ";
                };

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- @endif
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <a
                  href="{{ route('site.shop.index') }}"
                  class="btn btn-outline-primary btn-md btn-block"
                  >Continue Shopping</a
                >
              </div>
            </div>
            {{--
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input
                  type="text"
                  class="form-control py-3"
                  id="coupon"
                  placeholder="Coupon Code"
                />
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-md px-4">
                  Apply Coupon
                </button>
              </div>
            </div>
            --}}
          </div>
          @if($cart)
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black final-sub-total"
                      >{{ format_price($cart->sub_total()) }}</strong
                    >
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black final-total"
                      >{{ format_price($cart->total()) }}</strong
                    >
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button
                      class="btn btn-primary btn-lg btn-block"
                      onclick="window.location='checkout.html'"
                    >
                      Proceed To Checkout
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @else
          <h1>Your Cart is Empty</h1>
          @endif
        </div> -->
    </div>
  </div>
  <!-- @endsection @section('extra-js')
    <script>
      const formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
      });
      sub_total = 0;
      total = 0;

      $(".increase-quantity-button").on("click", function (event) {
        sub_total = 0;
        total = 0;
        event.preventDefault();

        let that = $(this);

        $.ajax({
          type: "POST",
          url: "/cart/increase",
          data: {
            medicine_id: parseInt($(this).data("medicine_id")),
            _token: "{{ csrf_token() }}",
          },
          success: function (data) {
            $.ajax({
              type: "GET",
              url: "/cart/sub_totals",
              success: function (cart) {
                $(`#item_${that.data("item_id")} .sub_total`).text(
                  formatter.format(cart[that.data("item_id")].item_total / 100)
                );
                for (const key in cart) {
                  console.log();
                  sub_total += cart[key]["item_total"];
                  total += cart[key]["item_total"];
                }
                $(".final-sub-total").text(formatter.format(sub_total / 100));
                $(".final-total").text(formatter.format(total / 100));
              },
              error: function (xhr, status, error) {},
            });
          },
          error: function (xhr, status, error) {},
        });
      });
      $(".decrease-quantity-button").on("click", function (event) {
        sub_total = 0;
        total = 0;
        event.preventDefault();

        let that = $(this);

        $.ajax({
          type: "POST",
          url: "/cart/decrease",
          data: {
            medicine_id: parseInt($(this).data("medicine_id")),
            _token: "{{ csrf_token() }}",
          },
          success: function (data) {
            $.ajax({
              type: "GET",
              url: "/cart/sub_totals",
              success: function (cart) {
                $(`#item_${that.data("item_id")} .sub_total`).text(
                  formatter.format(cart[that.data("item_id")].item_total / 100)
                );
                for (const key in cart) {
                  console.log();
                  sub_total += cart[key]["item_total"];
                  total += cart[key]["item_total"];
                }
                $(".final-sub-total").text(formatter.format(sub_total / 100));
                $(".final-total").text(formatter.format(total / 100));
              },
              error: function (xhr, status, error) {},
            });
          },
          error: function (xhr, status, error) {},
        });
      });
    </script>
    @endsection -->
</body>

</html>