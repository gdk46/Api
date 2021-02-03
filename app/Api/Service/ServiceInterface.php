<?php

namespace Api\Service;

interface ServiceInterface
{
    /**
     * Retrieve the representation of a resource. 
     *
     * @return void
     */
    public function get(string $query = null);

    /**
     * Create new resource
     *
     * @return void
     */
    public function post(array $dataArr);

    /**
     * Modify an existing resource. 
     *
     * @return void
     */
    public function put(array $dataArr);

    /**
     * Delete an existing resource. 
     *
     * @param int $id Identifier
     * @return void
     */
    public function delete(int $id);
    
    /**
     * Check which HTTP methods a given resource supports
     *
     * @return void
     */
    public function options();
}
