<?php

namespace App\Helpers;

if (!function_exists('iduser')) {
    function iduser()
    {
        $session = \Config\Services::session();
        return $session->get('iduser');
    }
}
