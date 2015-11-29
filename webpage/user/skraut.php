<?php
session_start();
session_destroy();

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('http://tsuts.tskoli.is/2t/2408982179/gru/', false);

?>