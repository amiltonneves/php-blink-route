<?php

function redirect($to)
{
    return header('Location: ' . $to);
}

function setMessageAndRedirect($index, $message, $redirectTo = '/login')
{
    setFlash($index, $message);
    return redirect($redirectTo);
}
