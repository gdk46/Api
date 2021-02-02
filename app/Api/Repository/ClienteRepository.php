<?php

namespace Api\Repository;

use ConnectDb\Database\Connect;
use Crud\Database\Crud;

class ClienteRepository
{

    private string $table = 'cliente';

    public function __construct()
    {
        $this->db   = new Connect();
        $connection = $this->db->getConnect();

        $this->crud = new Crud($connection);
    }
}
