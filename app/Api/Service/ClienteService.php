<?php

namespace Api\Service;

use Api\Repository\ClienteRepository;
use Api\Service\ServiceInterface;

class ClienteService implements ServiceInterface
{
    private ClienteRepository $repository;

    public function __construct()
    {
        $this->repository = new ClienteRepository();
    }

    /**
     * Retrieve the representation of a resource. 
     *
     * @return void
     */
    public function get(string $query = null)
    {
        $this->repository::list();
    }

    /**
     * Create new resource
     *
     * @return void
     */
    public function post(array $dataArr)
    {
        $this->repository::create($dataArr);
    }

    /**
     * Modify an existing resource. 
     *
     * @return void
     */
    public function put(array $dataArr)
    {
        $this->repository::update($dataArr);
    }

    /**
     * Delete an existing resource.
     *
     * @param int $id Identifier
     * @return void
     */
    public function delete(int $id)
    {
        $this->repository::delete($id);
    }

    /**
     * Check which HTTP methods a given resource supports
     *
     * @return void
     */
    public function options()
    {
        return [
            "metohd" => ["post", "get", "put", "delete", "option"],
            "endpoits" => [
                "post" => "aplicacao/cliente/",
                "get" => [
                    "All" => "aplicacao/cliente/get/"
                ],
                "put" => "aplicacao/cliente/put/",
                "delete" => "aplicacao/cliente/delete/{id}",
                "option" => "aplicacao/cliente/option/",
            ],
        ];
    }
}
