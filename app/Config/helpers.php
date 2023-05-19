<?php

function route($url = "") 
{
    echo BASE_URL.$url;
}

function asset($url = "")
{
    echo BASE_URL.'assets'.DS.$url;
}

function uploads($url = "")
{
    echo BASE_URL.DS.'uploads'.DS.$url;
}

function generateRandomKey($length = 6){
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $key = '';

    for($i=0; $i<$length; $i++){
        $randomIndex = rand(0, strlen($characters)-1);
        $key .=$characters[$randomIndex];
    }

    return $key;
}