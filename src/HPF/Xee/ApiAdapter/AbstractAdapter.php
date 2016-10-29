<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 29/10/2016
 * Time: 02:12
 */

namespace HPF\Xee\ApiAdapter;
use HPF\Xee\HttpAdapter\HttpAdapterInterface;


abstract class AbstractAdapter
{

    protected $httpAdapter;
    protected $env;

    public function __construct($env, HttpAdapterInterface $httpAdapter)
    {
        $this->env = $env;
        $this->httpAdapter = $httpAdapter;
    }

    protected function getAuthHeader($accessToken)
    {
        return ["Authorization: Bearer ".$accessToken];
    }

    protected function makeUrl($endpoint) {
        return 'https://'.$this->env.'.xee.com'.$endpoint;
    }
}