<?php

namespace Api\Service;

use ConnectDb\Database\Connect;
use Crud\Database\Crud;
use Config\Env;

use Api\Service\ServiceInterface;

class UsuarioService implements ServiceInterface
{
    private Connect $db;
    private    Crud $crud;
    private  string $table = 'user';

    public function __construct()
    {
        $this->db   = new Connect(Env::DB_FEATURE);
        $this->crud = new Crud($this->db->getConnect());
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function create(array $postArray)
    {
        self::$crud->create(self::$table, $postArray);
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function list()
    {
        self::$crud->read(self::$table);
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function delete(int $id)
    {
        self::$crud->delete(self::$table, "WHERE id = {$id}");
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function update(array $putArray, int $id)
    {
        self::$crud->update(self::$table, $putArray, "WHERE id = {$id}");
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function query(string $query)
    {  
    }
}
