<?php

namespace Api\Http;

use Api\Http\DispatcherHttp;
use Api\Repository\TokenRepository;
use Util\JsonUtil;

class RequestValidatorHttp
{
    private array $endpoint;
    private TokenRepository $tokensAutorizadosRepository;
    private DispatcherHttp $dispatcher;

    public function __construct($request = [])
    {
        $this->endpoint = $request;
        $this->tokensAutorizadosRepository = new TokenRepository();
        $this->dispatcher = new DispatcherHttp($this->endpoint);
    }
    
    /**
     * 
     */
    public function processRequest()
    {
        $retorno = utf8_encode('Rota nao permitida!');
        $method  = ['GET', 'POST', 'DELETE', 'PUT', 'OPITION'];

        if (in_array($this->endpoint['method'], $method, true)) {
            // $retorno = $this->directRequest();
        }

        return $retorno;
    }

    /**
     * 
     */
    /* private function directRequest()
    {
        if ($this->endpoint['method'] !== "GET" && $this->endpoint['method'] !== "DELETE") {
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
        }

        // $this->tokensAutorizadosRepository->token(getallheaders()['Authorization']);
        return $this->dispatcher->callDispatcher();
    } */
 
}