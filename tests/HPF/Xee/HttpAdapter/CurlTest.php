<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 29/10/2016
 * Time: 00:35
 */

namespace HPF\Xee\HttpAdapter;


class CurlTest extends \PHPUnit_Framework_TestCase
{

    public function testGet()
    {
        $adapter = new Curl();
        $res = $adapter->get('https://sandbox.xee.com/v3/users/2',['Authorization: Bearer 1AZDZD234']);

        $this->assertNotNull($res);
        $this->assertInternalType('array', $res);
        $this->assertArrayHasKey('id', $res);
        $this->assertArrayHasKey('lastName', $res);

    }
}