<?php

namespace Util;

use InvalidArgumentException;
use JsonException;

class JsonUtil
{
    /**
     * @param $retorno
     * @throws JsonException
     */
    public function toArrayReturn($return)
    {
        $dados = [];
        $dados['type'] = 'erro';

        if ((is_array($return) && count($return) > 0) || strlen($return) > 10) {
            $dados['type'] = 'sucesso';
            $dados['response'] = $return;
        }

        $this->toJsonReturn($dados);
    }

    /**
     * @param $json
     * @throws JsonException
     */
    private function toJsonReturn($json)
    {
        header("Content-Type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        echo json_encode($json, JSON_THROW_ON_ERROR, 1024);
        exit;
    }

    /**
     * @return array|mixed
     */
    public static function handleJsonRequestBody()
    {
        try {
            $postJson = json_decode(file_get_contents("php://input"), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new InvalidArgumentException('O Corpo da requisicao nao pode ser vazio!');
        }
        
        if (is_array($postJson) && count($postJson) > 0) {
            return $postJson;
        }
    }
}