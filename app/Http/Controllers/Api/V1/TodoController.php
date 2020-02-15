<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseApiController;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Services\TodoService;
use Illuminate\Http\Response;

class TodoController extends BaseApiController
{
    /** @var $todoService */
    private $todoService;

    /**
     * TodoController constructor.
     *
     * @param TodoService $todoService
     */
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(TodoStoreRequest $request)
    {
        $result = $this->todoService->createTodo($request);
        if ($result) {
            return $this->sendResponse($result, Response::HTTP_OK, 'success');
        }

        return $this->sendResponse([], Response::HTTP_UNPROCESSABLE_ENTITY, 'error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(TodoUpdateRequest $request, $id)
    {
        $result = $this->todoService->updateTodo($request, $id);
        if ($result) {
            return $this->sendResponse([], Response::HTTP_OK, 'success');
        }

        return $this->sendResponse([], Response::HTTP_UNPROCESSABLE_ENTITY, 'error');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
