<?php

namespace Api\Http;

use Util\JsonUtil;
// use Repository\TokensAutorizadosRepository;

class RequestValidatorHttp
{
    private array $request;
    // private array $dataFromRequest;
    // private object $token;

    public function __construct($request = [])
    {
        $this->request = $request;
        // $this->token = new TokensAutorizadosRepository();
    }
    
    /**
     * 
     */
    public function processRequest()
    {
        $retorno = utf8_encode('Rota nao permitida!');
        if (in_array($this->request['method'], ['GET', 'POST', 'DELETE', 'PUT', 'OPITION'], true)) {
            // $retorno = $this->directRequest();
            $retorno = "ok";
        }

        return $retorno;
    }

    /**
     * 
     */
    private function directRequest()
    {
        if ($this->request['method'] !== "GET" && $this->request['method'] !== "DELETE") {
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
        }

        $this->TokensAutorizadosRepository->validarToken(getallheaders()['Authorization']);
        $metodo = $this->request['method'];
        return $this->$metodo();
    }

}