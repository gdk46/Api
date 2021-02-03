<?php

namespace Api\Repository;

use ConnectDb\Database\Connect;
use Crud\Database\Crud;

use Api\Repository\RepositoryInterface;

class UsuarioRepository implements RepositoryInterface
{
    private string $table = 'user';

    public function __construct()
    {
        $this->db   = new Connect();
        $connection = $this->db->getConnect();

        $this->crud = new Crud($connection);
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function create(array $postArray)
    {
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function list()
    {
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function delete(int $id)
    {
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function update(array $putArray)
    {
    }

    /**
     * Retrieve the representation of a resource. 
     */
    public static function query(string $query)
    {
    }
}
