<?php

function getHash()
{
    $hash = '';
    for($i=0;$i<7;$i++) {
        $hash .= rand(0, 10);
    }

    return $hash;
}