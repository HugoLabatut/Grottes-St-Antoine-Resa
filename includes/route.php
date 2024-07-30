<?php
require_once('urlconfig.php');

$currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // http://site.fr/pages/...
$request = str_replace($url, '', $currentUrl);
$request = str_replace('/', '', $request);
$request = strtolower($request); // url en minuscule





