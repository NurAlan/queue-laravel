<?php

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $usegment) {
            if (Route::is($usegment)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}
