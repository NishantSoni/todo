<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository
{
    /**
     * To initialize class objects/variables.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
