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
    }

    public function editCheckStatus()
    {
        if (isset($_POST['id'])) {
            $id  = $_POST['id'];
            $checkOrder =  Database::select_one('orders', $id);
            if ($checkOrder['status'] == 'processing') {
                $queryData = [];
                $queryData['status'] = 'out for delivery';
                $result = Database::update('orders', $_POST['id'], $queryData);
                $allChecks  =  Database::select('orders');
                View::load('Check/index', $data =  [
                    'allChecks' => $allChecks
                ]);
            } else if ($checkOrder['status'] == 'out for delivery') {
                $queryData = [];
                $queryData['status'] = 'done';
                $result = Database::update('orders', $_POST['id'], $queryData);
                $allChecks  =  Database::select('orders');
                View::load('Check/index', $data =  [
                    'allChecks' => $allChecks
                ]);
            }
        } else {
            $allChecks  =  Database::select('orders');
            View::load('Check/index', $data =  [
                'allChecks' => $allChecks
            ]);
        }
    }
}
