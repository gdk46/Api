<?php

namespace Api\Repository;

use ConnectDb\Database\Connect;
use Crud\Database\Crud;
use Config\Env;

use InvalidArgumentException;

class TokenRepository
{
    private string $table = 'tokens_autorizados';
    private Connect $db;
    private Crud $crud;

    public function __construct()
    {
        $this->db   = new Connect(Env::DB_FEATURE);
        $this->crud = new Crud($this->db->getConnect());
    }

    /**
     * Validate token
     *
     * @param string $token
     * @return string|boll
     */
    public function token(string $token)
    {
        if (!empty($token)) {
            $token = $this->sanitizeToken($token);
            $validate = $this->validateToken($token);
            
            if (gettype($validate) == "array") {
                return true;
            }else{
                return "Token inexistente";
            }

        } else {
            throw new InvalidArgumentException('informe um Token!');
        }
    }

    /**
     * Clean token
     *
     * @param string $token Element to be cleaned
     * @return string
     */
    private function sanitizeToken(string $token): string
    {
        $token = trim($token);
        $token = strip_tags($token);
        $token = preg_replace('/[^[:alpha:]_]/', '', $token);
        return $token;
    }

    /**
     * Verify token in Database
     * 
     * @param string $token Element to be validated
     * @return string|boll
     */
    private function validateToken(string $token)
    {
        $sql = "WHERE token = '{$token}'";
        $result = $this->crud->read($this->table, $sql);
        
        return $result;
    }
}
