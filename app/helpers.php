<?php

// Notification message
if (! function_exists('setAlert')) {
    function setAlert($type, $message)
    {
        return [
            'type'=> $type,
            'message'=> $message
        ];
    }
}