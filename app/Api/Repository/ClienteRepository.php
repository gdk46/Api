<?php

namespace Api\Repository;

use Api\Service\ClienteService;

class ClienteRepository
{
    private ClienteService $service;
    private bool $authRequest = True;
    private array $verbAccepted = ['GET', 'POST', 'PUT', 'DELETE'];

    public function __construct()
    {
        $this->service = new ClienteService();
    }

    /**
     * Authorization to use resources
     *
     * @return boolean
     */
    public function getAuthRequest(): bool
    {
        return $this->authRequest;
    }

    /**
     * Verbs HTTP Accepted in request
     *
     * @return array
     */
    public function getVerbAccepted(): array
    {
        return $this->verbAccepted;
    }

    /**
     * Retrieve the representation of a resource. 
     *
     * @return void
     */
    public function get()
    {
        $this->service::list();
    }

    /**
     * Create new resource
     *
     * @return void
     */
    public function post(array $dataArr)
    {
        $this->service::create($_POST);
    }

    /**
     * Modify an existing resource. 
     *
     * @return void
     */
    public function put(array $dataArr)
    {
        $id = "";
        $this->service::update($dataArr, $id);
    }

    /**
     * Delete an existing resource.
     *
     * @param int $id Identifier
     * @return void
     */
    public function delete(int $id)
    {
        $this->service::delete($id);
    }

}
