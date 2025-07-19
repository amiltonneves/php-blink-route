<?php


function dd($dump)
{
    echo "<body style='font-size:20px'>";
    var_dump($dump);
    echo '</body>';
    die();
}
