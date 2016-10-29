<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 28/10/2016
 * Time: 18:01
 */

namespace HPF\Xee\HttpAdapter;


interface HttpAdapterInterface
{

    public function get($url, $headers = array());
}