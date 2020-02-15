<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseApiController;
use App\Services\CategoryService;
use Illuminate\Http\Response;

class CategoryController extends BaseApiController
{
    /** @var $categoryService */
    private $categoryService;

    /**
     * TodoController constructor.
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Get all the categories;
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = $this->categoryService->getCategories();
        if ($result) {
            return $this->sendResponse($result, Response::HTTP_OK, 'success');
        }

        return $this->sendResponse([], Response::HTTP_UNPROCESSABLE_ENTITY, 'error');
    }
}
