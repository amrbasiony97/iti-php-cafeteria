<!-- Title and Extra CSS -->
<?php
$title = "Edit User";
ob_start();
?>

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php asset('gentelella/vendors/toastr/toastr.min.css') ?>">

<?php
$extra_css = ob_get_clean();
?>

<!-- Main Content -->
<?php
ob_start();
?>

<div class="">
    <div class="page-title d-flex justify-content-between align-items-center">
        <div class="title_left">
            <h3 class="m-0">Edit User</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form action="<?php route('user/update') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
                        <input value="<?php echo $user['id'] ?>" name="id" type="hidden" />
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo $user['name'] ?>" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name" placeholder="both name(s) e.g John Doe" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo $user['email'] ?>" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Password
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password2" class="control-label col-md-3">Confirm Password
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password2" type="password" name="password2" data-validate-length="6,8" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_number">Room Number</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php if (!empty($user['room_number'])) echo $user['room_number'] ?>" type="number" id="room_number" name="room_number" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ext">Ext.</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php if (!empty($user['ext'])) echo $user['ext'] ?>" type="number" id="ext" name="ext" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Profile Picture</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
?>

<!-- Extra JS -->
<?php
ob_start();
?>

    <!-- validator -->
    <script src="<?php asset('gentelella/vendors/validator/validator.js') ?>"></script>

    <!-- Toastr -->
    <script src="<?php asset('gentelella/vendors/toastr/toastr.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        <?php
        if (isset($errors)) {
            foreach ($errors as $error) { ?>
                toastr["error"]("<?php echo $error ?>", "Error")

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
    <?php   }
        }
        ?>


    });
</script>
    
<?php
if (isset($url)) {
  echo "<script>history.replaceState({}, '', '".BASE_URL.$url."')</script>;";
}
?>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/admin.php') ?>