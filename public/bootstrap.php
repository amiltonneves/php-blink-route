<?php

session_start();
require '../vendor/autoload.php';

try {
    require '../App/Routes/Routes.php';
} catch (\Exception $e) {
    echo $e->getMessage();
}