<?php

namespace Api\Http;

use Api\Repository\Repository;

class DispatcherHttp
{
    private Repository $repository;

    public function __construct(array $endpoint)
    {
        $this->repository = new Repository($endpoint);
    }

    /**
     * Make the dispatch 
     *
     * @return void
     */
    public function callDispatcher()
    {
        return $this->repository->validateRoute();
    }
    
}