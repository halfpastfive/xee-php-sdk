<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 07/10/2016
 * Time: 18:10
 */

namespace HPF\Xee\Model;


class Token
{

    protected $accessToken;
    protected $refreshToken;
    protected $expiresIn;
    protected $expiresAt;

    public function __construct($accessTokenString, $refreshTokenString, $expiresIn, $expiresAt)
    {
        $this->accessToken = $accessTokenString;
        $this->refreshToken = $refreshTokenString;
        $this->expiresIn = $expiresIn;
        $this->expiresAt = $expiresAt;
    }
}