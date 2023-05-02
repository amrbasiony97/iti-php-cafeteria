<!-- Title and Extra CSS -->
<?php
$title = "All Users";
ob_start();
?>

<!-- iCheck -->
<link href="<?php asset('gentelella/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
<!-- Datatables -->
<link href="<?php asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

<!-- Toastr -->
<link rel="stylesheet" href="<?php asset('gentelella/vendors/toastr/toastr.min.css') ?>">

<style>
    table img {
        width: 50px;
        border-radius: 50%;
    }

    td {
        vertical-align: middle !important;
    }
</style>
<?php
$extra_css = ob_get_clean();
?>

<!-- Main Content -->
<?php
ob_start();
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3 class="">All Users</h3>
        </div>

        <div style="display: flex; justify-content: end;">
            <a class="btn btn-success" href="<?php route('User/create') ?>" role="button">Add User</a>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Room</th>
                                <th>Image</th>
                                <th>Ext.</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>{$user['name']}</td>";
                                echo "<td>{$user['email']}</td>";
                                echo "<td>{$user['room_number']}</td>";
                                echo "<td>
                                        <img src='";
                                echo uploads("images/users/{$user['image']}");
                                echo "' alt='user'>
                                      </td>";
                                echo "<td>{$user['ext']}</td>";
                                echo "<td>
                                        <a class='btn btn-primary' href='";
                                echo route("User/edit/{$user['id']}'");
                                echo "role='button'>
                                            <i class='fa fa-pencil'></i>
                                        </a>
                                        <button type='button' class='btn btn-danger delete-btn' data-toggle='modal' data-target='.delete-modal' 
                                        data-id='{$user['id']}' data-name='{$user['name']}'>
                                            <i class='fa fa-trash'></i>
                                        </button>
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Delete User</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="msg"></p>
                                </div>
                                <div class="modal-footer">
                                    <form action="" method="POST" id="delete-form">
                                        <input type="hidden" name="id">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
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

<!-- iCheck -->
<script src="<?php asset('gentelella/vendors/iCheck/icheck.min.js') ?>"></script>
<!-- Datatables -->
<script src="<?php asset('gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/jszip/dist/jszip.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?php asset('gentelella/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>

<!-- Toastr -->
<script src="<?php asset('gentelella/vendors/toastr/toastr.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        <?php if (isset($success)) { ?>
            toastr["success"]("<?php echo $success ?>")
            <?php   }
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
        } ?>

        $('.delete-btn').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('.modal-body .msg').html(`Are you sure you want to delete user: <strong>${name}</strong>?`);
            $('#delete-form').attr('action', `<?php echo route("user/destroy") ?>`);
            $("#delete-form input[name='id']").val(id);
            console.log($('#delete-form').attr('action'));
            console.log($("#delete-form input[name='id']").val());
        })
    });
</script>

<?php
if (isset($url)) {
    echo "<script>history.pushState(null, null, '$url');</script>";
}
?>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/app.php') ?>