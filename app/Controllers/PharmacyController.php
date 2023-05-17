<?php

class PharmacyController
{
    public function index()
    {
        return View::load('Pharmacy/index', [
            'pharmacies' => Database::select('pharmacies')
        ]);
    }
}