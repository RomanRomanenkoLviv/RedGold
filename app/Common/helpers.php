<?php
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

if (! function_exists('static_asset')) {
    /**
     * Get the path to front static file
     *
     * @param  string  $path
     * @return string
     */
    function static_asset($path)
    {
        throw new \Exception('Function [static_asset] is deprecated, use asset() instead');
    }
}
