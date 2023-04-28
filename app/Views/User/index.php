<!-- Title and Extra CSS -->
<?php
$title = "Users";
ob_start();
?>

<?php
$extra_css = ob_get_clean();
?>

<!-- Main Content -->
<?php
ob_start();
?>



<?php
$content = ob_get_clean();
?>

<!-- Extra JS -->
<?php
ob_start();
?>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/app.php') ?>