<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /** @var $categoryRepository */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories with the todo_items from the database.
     *
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categoryRepository->getAll();
    }
}
