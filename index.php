<?php
use Http\UriHttp;
use Util\JsonUtil;

require_once "../../autoload.php";

try {
    // Captura e trata a URL
    $requestValidator = new Http\RequestValidatorHttp(UriHttp::getEndpoint());

    // trata a requisição e 
    $json = new JsonUtil();
    $json->toArrayReturn($requestValidator->processRequest());

} catch (Exception $exception) {
    echo $exception->getMessage();
}