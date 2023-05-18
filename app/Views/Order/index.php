<!-- Title and Extra CSS -->
<?php
$title = "Orders";
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
if (isset($url)) {
  echo "<script>history.replaceState({}, '', '".BASE_URL.$url."')</script>;";
}
?>

<?php
$extra_js = ob_get_clean();
?>

<?php include('app/Views/Layouts/user.php') ?>