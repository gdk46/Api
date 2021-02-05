<?php

namespace Api\Http;

use Config\Env;

class UriHttp
{
   
    /**
     * Take resource to composer endpoints
     * 
     * @return array
     */
    public static function getEndpoint(): array
    {
        $urls = self::getUrl();

        $endpoint = [];
        
        $endpoint['route']    = strtoupper($urls[0]);
        $endpoint['resource'] = $urls[1] ?? null;
        $endpoint['id']       = $urls[2] ?? null;
        $endpoint['method']   = $_SERVER['REQUEST_METHOD'];

        return $endpoint;
    }

    /**
     * 
     * @return false|string
     */
    public static function getUrl()
    {
        $uri = str_replace(Env::ROOT_API, '', $_SERVER['REQUEST_URI']);
        return explode('/', trim($uri, '/'));
    }
}