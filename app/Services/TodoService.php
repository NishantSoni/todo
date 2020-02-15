<?php

namespace App\Services;

use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Repositories\TodoRepository;

class TodoService
{
    /** @var $todoRepository */
    private $todoRepository;

    /**
     * ToDoService constructor.
     *
     * @param TodoRepository $todoRepository
     */
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @param TodoStoreRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function createTodo(TodoStoreRequest $request)
    {
        return $this->todoRepository->create(
            $request->only('name', 'category_id', 'is_completed')
        );
    }

    public function updateTodo(TodoUpdateRequest $request, $id)
    {
        return $this->todoRepository->update($id, $request->only('name', 'category_id', 'is_completed'));
    }
}
