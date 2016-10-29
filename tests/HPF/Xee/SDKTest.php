<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 10/10/2016
 * Time: 16:40
 */

namespace HPF\Xee;


class SDKTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAuthenticationUrl()
    {
        $uri = "http://localhost";
        $sdk = new SDK("testClient", "testSecret", $uri);

        $this->assertEquals("https://cloud.xee.com/v1/auth/auth?client_id=testClient&redirect_uri=".urlencode($uri), $sdk->getAuthenticationUrl());
    }

    public function testGetAuthenticationUrlWithEnvStaging()
    {
        $uri = "http://localhost";
        $sdk = new SDK("testClient", "testSecret", $uri, "staging");

        $this->assertEquals("https://staging.xee.com/v1/auth/auth?client_id=testClient&redirect_uri=".urlencode($uri), $sdk->getAuthenticationUrl());
    }

    public function testGetAuthenticationUrlWithState()
    {
        $uri = "http://localhost";
        $sdk = new SDK("testClient", "testSecret", $uri);

        $this->assertEquals("https://cloud.xee.com/v1/auth/auth?client_id=testClient&redirect_uri=".urlencode($uri)."&state=az123456", $sdk->getAuthenticationUrl('az123456'));
    }

}