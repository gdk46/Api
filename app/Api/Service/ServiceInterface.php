<?php

namespace Api\Service;

interface ServiceInterface
{
        /**
     * Retrieve the representation of a resource. 
     */
    public static function create(array $postArray);

    /**
     * Retrieve the representation of a resource. 
     */
    public static function list();

    /**
     * Retrieve the representation of a resource. 
     */
    public static function delete(int $id);

    /**
     * Retrieve the representation of a resource. 
     */
    public static function update(array $putArray, int $id);

    
}