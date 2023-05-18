<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h1>Checks Index</h1>
<ul>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th># Order Id</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['allChecks'] as $checkingOrder) :
                if ($checkingOrder['status'] == "out for delivery") :
            ?>
                    <tr class="table-warning">
                        <td><?php echo $checkingOrder['id'];  ?></td>
                        <td><?php echo $checkingOrder['status'];  ?></td>
                        <td>
                            <form>
                                <button type="submit" class="btn btn-warning">To Done</button>
                                <input type="text" value=" <?php echo $checkingOrder['id'];  ?>" style="display:none">
                            </form>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
                <?php
                if ($checkingOrder['status'] == 'processing') :
                ?>
                    <tr class="table-secondary">
                        <td><?php echo $checkingOrder['id'];  ?></td>
                        <td><?php echo $checkingOrder['status'];  ?></td>
                        <td>
                            <form>
                                <button type="submit" class="btn btn-danger">To Delivery</button>
                                <input type="text" value=" <?php echo $checkingOrder['id'];  ?>" style="display:none">
                            </form>
                        </td>
                    </tr>
                <?php
                endif;
                ?>

            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</ul>