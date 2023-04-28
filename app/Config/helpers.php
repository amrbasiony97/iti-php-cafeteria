<?php

function route($url = "") 
{
    echo BASE_URL.$url;
}

function asset($url = "")
{
    echo '../public/assets/'.$url;
}