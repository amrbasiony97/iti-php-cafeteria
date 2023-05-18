<?php
if (!isset($_SESSION['user'])) {
    header("Location: /iti-php-cafeteria/public/auth/login");
}

class CheckController
{
    public function index()
    {
        $allChecks  =  Database::select('orders');
        View::load('Check/index', $data =  [
            'allChecks' => $allChecks
        ]);
    } // FIXME


    public function editCheckStatus()
    {
        $id  = $_POST['id'] ; 
        $checkOrder =  Database::select_one('orders', $id);
        if ($checkOrder['status'] == 'processing') {
            // TODO >> change the status for the out for delivery  ; 
            $queryData = [];
            $queryData['status'] = 'out for delivery';
            $result = Database::update('orders', $_POST['id'], $queryData);
            $allChecks  =  Database::select('orders');
            View::load('Check/index', $data =  [
                'allChecks' => $allChecks
            ]);
        } else if ($checkOrder['status'] == 'out for delivery') {
            // Todo make it done 
            $queryData = [];
            $queryData['status'] = 'done';
            $result = Database::update('orders', $_POST['id'], $queryData);
            $allChecks  =  Database::select('orders');
            View::load('Check/index', $data =  [
                'allChecks' => $allChecks
            ]);
        }

        // todo >> redirect to the home of the checks again ! 
    }
}
