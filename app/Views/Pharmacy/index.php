<?php include(VIEWS.'include/header.php') ?>
<a href="<?php route('pharmacy/index') ?>">Pharmacy</a>
    <h1>hello world</h1>

<ul>
    <?php 
        foreach($pharmacies as $pharmacy){
            echo "<li>{$pharmacy['name']}</li>";

        }
    ?>
    </ul>
<?php include(VIEWS.'include/footer.php') ?>