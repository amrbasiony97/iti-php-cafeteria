<!-- Title and Extra CSS -->
<?php
$title = "Users";
ob_start();
?>

<!-- iCheck -->
<link href="<?php asset('vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">

<!-- Datatables -->
<link href="<?php asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

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
    <div class="page-title d-flex justify-content-between align-items-center">
        <div class="title_left">
            <h3 class="m-0">All Users</h3>
        </div>

        <div class="title_right d-flex justify-content-end">
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
                            foreach($users as $user)
                            {
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
                                        <a class='btn btn-primary' href=";
                                        echo route("User/edit/{$user['id']}");
                                        echo "role='button'>
                                            <i class='fa fa-pencil'></i>
                                        </a>
                                        <a class='btn btn-danger' href=";
                                        echo route("User/delete/{$user['id']}");
                                        echo "role='button'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                      </td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                    </table>
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
<script src="<?php asset('vendors/iCheck/icheck.min.js') ?>"></script>

<!-- Datatables -->
<script src="<?php asset('vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
<script src="<?php asset('vendors/datatables.net-scroller/js/datatables.scroller.min.js') ?>"></script>
<script src="<?php asset('vendors/jszip/dist/jszip.min.js') ?>"></script>
<script src="<?php asset('vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?php asset('vendors/pdfmake/build/vfs_fonts.js') ?>"></script>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/app.php') ?>