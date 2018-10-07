<?php

if (! function_exists('setActive')) {
    function setActive($name)
    {
        return Route::currentRouteName() == $name ? ' class=active' :  '';
    }
}
