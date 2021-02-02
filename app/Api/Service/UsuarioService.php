<?php

namespace Api\Service;

use Api\Repository\UsuarioRepository;

class UsuarioService
{   
    private UsuarioRepository $user;

    public function __construct()
    {
        $this->user = new UsuarioRepository();
    }

    /**
     * Retrieve the representation of a resource. 
     *
     * @return void
     */
    public function get()
    {
        $this->user::list();
    }

    /**
     * Create new resource
     *
     * @return void
     */
    public function post()
    {
        $this->user::create($_POST);
    }

    /**
     * Modify an existing resource. 
     *
     * @return void
     */
    public function put()
    {
        $this->user::update($_POST);
    }

    /**
     * Delete an existing resource.
     *
     * @param int $id Identifier
     * @return void
     */
    public function delete(int $id)
    {
        $this->user::delete($id);
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
                "post" => "aplicacao/user/",
                "get" => [
                    "All" => "aplicacao/user/get/"
                ],
                "put" => "aplicacao/user/put/",
                "delete" => "aplicacao/user/delete/{id}",
                "option" => "aplicacao/user/option/",
            ],
        ];
    }
}
