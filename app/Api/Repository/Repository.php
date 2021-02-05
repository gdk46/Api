<?php

namespace Api\Repository;

use Api\Repository\ClienteRepository;
use Api\Repository\UsuarioRepository;

use InvalidArgumentException;

class Repository
{
    private $repository;
    private string $resource;

    public function __construct(array $endpoint)
    {
        $this->resource = $endpoint;
    }

    public function validateRoute()
    {
        $retorno = null;
        $method = $this->resource['method'];

        switch ($this->resource['route']) {
            case 'CLIENTE':
                $this->repository = new ClienteRepository($this->resource);
                $retorno = $this->setMethodRepository($method);

                break;
            
            case 'USUARIO':
                $this->repository = new UsuarioRepository($this->resource);
                $retorno = $this->setMethodRepository($method);
                break;

            default:
                throw new InvalidArgumentException('recurso inexistente');
                break;
        }

        return $retorno;
    }

    /**
     * Validate a method for a route
     * @return boolean
     */
    private function validateMethodRoute(): bool
    {
        $verbAccepted = $this->repository->getVerbAccepted();
        return (in_array($this->resource['method'], $verbAccepted, true)) ? true: false;
    }

    /**
     * Route visibility
     *
     * @return boolean
     */
    private function validateAuthRoute(): bool
    {
        return $this->repository->getAuthRequest();
    }

    /**
     * Validate Permissions Auth and Route
     *
     * @return boolean|InvalidArgumentException
     */
    private function validatePermissions()
    {
        if($this->validateAuthRoute()){
            if ($this->validateMethodRoute()) {
                return true;            
            }else{
                header("HTTP/1.1 401 Unauthorized");
                throw new InvalidArgumentException('método desativada!');
            }
        }else{
            header("HTTP/1.1 401 Unauthorized");
            throw new InvalidArgumentException('Rota desativada!');
        }
    }

    /**
     * Point to the method in repository
     *
     * @param string $method
     * @return void
     */
    private function setMethodRepository(string $method)
    {
        if ($this->validatePermissions()) {
            $this->repository->$method();
        }
    }
}