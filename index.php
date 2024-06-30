<?php

require_once './vendor/autoload.php';


use Ghosty\Component\HttpFoundation\Request;

$request = new Request();
echo '<pre>';
print_r($request->getQuery()->get('sex'));
