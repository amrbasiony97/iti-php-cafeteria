<?php

function route($url = "") 
{
    echo BASE_URL.$url;
}

function asset($url = "")
{
    echo BASE_URL.DS.'assets'.DS.$url;
}

function uploads($url = "")
{
    echo BASE_URL.DS.'uploads'.DS.$url;
}