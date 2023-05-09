<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria | Login</title>

    <style>
      body{
        background: #F3904F;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #3B4371, #F3904F);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #3B4371, #F3904F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      }

      .card{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body style="background-image: url('<?php asset('images/2.jpg') ?>');background-repeat: no-repeat;background-size: cover;  background-attachment: fixed;">

    <div class="container mt-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 m-auto mt-5">
          <?php 
          if(!empty($errors)){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <ul>
              <?php
                foreach($errors as $error){
                  ?>
                  <li><?= $error ?></li>
                  <?php
                } 
              ?>
              </ul>
            </div>
          <?php
          } 
          ?>
          
          <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function (alert) {
              new bootstrap.Alert(alert)
            })
          </script>
            

          <!-- From Card -->
          <div class="card mt-5">
            <h4 class="card-header text-center">Login</h4>
            <div class="card-body">
              <form action="<?php route('auth/applyLogin') ?>" method="POST">
                <!-- Email input -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="<?php if(!empty($data)) {echo $data['email'];} ?>" aria-describedby="helpId">
                </div>

                <!-- Password input -->
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="helpId">
                </div>
                <!-- Submit button -->
                <hr>
                <div class="d-flex justify-content-between align-items-baseline">
                  <button type="submit" class="btn btn-primary">Login</button>
                  <a href="">Register?</a>
                </div>
              </form>

            </div>
          </div>
          <!-- End OF Form Card -->
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>