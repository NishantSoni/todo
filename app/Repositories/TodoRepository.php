<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository extends Repository
{
    /**
     * To initialize class objects/variables.
     *
     * @param Todo $model
     */
    public function __construct(Todo $model)
    {
        $this->model = $model;
    }
}
