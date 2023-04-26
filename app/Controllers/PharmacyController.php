<?php

class PharmacyController
{
    public function index()
    {
        return View::load('Pharmacy/index', [
            'pharmacies' => Pharmacy::getAll()
        ]);
    }
}