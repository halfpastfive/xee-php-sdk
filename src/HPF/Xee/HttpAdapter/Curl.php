<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 28/10/2016
 * Time: 17:51
 */

namespace HPF\Xee\HttpAdapter;


class Curl implements HttpAdapterInterface
{

    protected $options = [
        CURLOPT_RETURNTRANSFER => true,                 // return web page
        CURLOPT_HEADER         => false,                 // Use headers to get the http response code
        CURLOPT_FOLLOWLOCATION => true,                 // follow redirects
        CURLOPT_MAXREDIRS      => 10,                   // stop after 10 redirects
        CURLOPT_ENCODING       => "",                   // handle compressed
        CURLOPT_USERAGENT      => "HPF/Xee-php-sdk",    // name of client
        CURLOPT_AUTOREFERER    => true,                 // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,                  // time-out on connect
        CURLOPT_TIMEOUT        => 120,                  // time-out on response
    ];




    public function get($url, $headers = array())
    {

        $ch = $this->getInitializedCurlHandler($url);
        if (0 < count($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $rawRes = curl_exec($ch);
        if (curl_errno($ch)) {
            //Curl error (probably a server error or timeout
            throw new \Exception("Curl error : ". curl_error($ch));
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (200 != $httpCode) {
            throw New \Exception("BAD CODE : $httpCode. content : ".var_export($rawRes, true));
        }
        curl_close($ch);

        /*TODO gestion d'erreurs.
         * Faut-il gérer le transport ici et le parsing plus haut ?
         * Nope : si code http != 200, lancer une exception : penser extensibilité : si guzzle, il faudra catcher les
         * exceptions pour err 400 et 500.
         * Donc dans tous les cas, lancer une HttpAdapterException.
         */

        if (false === $rawRes) {

            throw new \Exception("Invalid request");
        }

        $decodedRes = json_decode($rawRes, true);
        if (null === $decodedRes) {
            throw new \Exception("Could not parse json");
        }
        return $decodedRes;

    }

    protected function getInitializedCurlHandler($url)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $this->options);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);

        return $ch;
    }

}
