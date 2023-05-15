<?php

function getHash()
{
    $hash = '';
    for($i=0;$i<7;$i++) {
        $hash .= rand(0, 10);
    }

    return $hash;
}

function jsRedirect($page)
{
    echo '<script type="text/javascript">';
    echo 'window.location.href="'.$page.'";';
    echo '</script>';
    die();
}
