<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 25/10/2016
 * Time: 13:58
 */
require __DIR__."/vendor/autoload.php";

$sdk = new \HPF\Xee\SDK("DsQOmMt36dDcF6I4Bka0","pBVlDrEh6OtbYzTQR6EB","http://localhost:8000/","sandbox");

$url = $sdk->getAuthenticationUrl();
header("location:". $url);