<?php

if (!function_exists('active_link')) {
    function active_link(string $route, string $active = 'active'): string
    {
        return request()->routeIs($route) ? $active : '';
    }
}

if (!function_exists('trans_date')) {
    function trans_date(\Illuminate\Support\Carbon $date = null): string
    {
        return $date ? $date->isoFormat('DD.MM.YYYY') : '';
    }
}
