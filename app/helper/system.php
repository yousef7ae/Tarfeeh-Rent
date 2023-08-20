<?php

if (!function_exists('apiError'))
{
    function apiError($error)
    {
        return response()->json(['status' => false , 'message' , $error]);
    }
}
