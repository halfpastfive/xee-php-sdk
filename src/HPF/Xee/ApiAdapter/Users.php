<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 25/10/2016
 * Time: 18:19
 */

namespace HPF\Xee\ApiAdapter;




class Users extends AbstractAdapter
{
    
    public function getCurrentUser($accessToken)
    {
        return $this->httpAdapter->get($this->makeUrl('/v3/users/me'), $this->getAuthHeader($accessToken));
    }

    public function getUserById($userId, $accessToken)
    {
        return $this->httpAdapter->get($this->makeUrl('/v3/users/'.(int)$userId), $this->getAuthHeader($accessToken));

    }

    public function getCars($userId, $accessToken)
    {
        return $this->httpAdapter->get($this->makeUrl('/v3/users/'.(int)$userId.'/cars'), $this->getAuthHeader($accessToken));
    }
}