<?php

namespace Api\Service;

use Api\Repository\ClienteRepository;

class ClienteService
{
    private array $method = ['post', 'get', 'put', 'delete', 'option'];


    public function __construct()
    {
        
    }

    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Retrieve the representation of a resource. 
     *
     * @return void
     */
    public function get(string $query = null)
    {
        if ($id) {
            return User::select($id);
        } else {
            return User::selectAll();
        }
    }


    /**
     * Create new resource
     *
     * @return void
     */
    public function post($dataArr)
    {
        
    }


    /**
     * Modify an existing resource. 
     *
     * @return void
     */
    public function put($dataArr)
    {
        
    }

    /**
     * Delete an existing resource. 
     *
     * @param int $id Identifier
     * @return void
     */
    public function delete(int $id)
    {
       
    }

    /**
     * Check which HTTP methods a given resource supports
     *
     * @return void
     */
    public function options()
    {
        return $this->getMethod();
    }
}
