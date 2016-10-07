<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 07/10/2016
 * Time: 12:20
 */

namespace HPF\Xee;


use HPF\Xee\Model\Token;

class SDK
{
    const BASE_URL = '%s.xee.com';
    const AUTH_ROUTE = '%s/auth/auth?client_id=%s&redirect_uri=%s';
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $clientSecret;
    /**
     * @var string
     */
    protected $redirectUri;

    /**
     * @var array|null
     */
    protected $scope = array();
    /**
     * @var string
     */
    protected $host;

    /**
     * SDK constructor.
     *
     * @param string $clientId the Client ID of your application
     * @param string $clientSecret The client secret of your application
     * @param string $redirectUri The redirect uri on your server that will handle the Authorization code
     * @param string $env a switch of the environment (for future use)
     * @param array|null $scope the scope of the token
     */
    public function __construct($clientId, $clientSecret, $redirectUri, $env = 'cloud', array $scope = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->host = sprintf(self::BASE_URL, $env);

        if (is_array($scope)) {
            if (count($scope) >= 1) {
                $this->scope = $scope;
            }
        }
    }

    /**
     * Returns the Authentication form url for your app
     *
     * @param string | null $state a state 
     * @return string
     */
    public function getAuthenticationUrl($state = null)
    {
        $baseRoute = sprintf(self::AUTH_ROUTE, $this->host, $this->clientId, urlencode($this->redirectUri)
        );

        if ($state) {
            $baseRoute .= sprintf('&state=%s',$state);
        }
        return $baseRoute;
    }

    public function getUser(Token $accessToken)
    {

    }
}