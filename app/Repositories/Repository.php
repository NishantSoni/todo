<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
    /**
     * Object of particular model
     *
     * @var object
     */
    protected $model;

    /**
     * Method to get all the records from the database.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Method to create new record.
     *
     * @param array $attributes
     * @return collection
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Method to insert multiple records at once.
     *
     * @param array $records
     * @return mixed
     */
    public function insertMultipleRows(array $records)
    {
        return $this->model->insert($records);
    }

    /**
     * Method to find record by its primary key.
     *
     * @param int $id
     * @return collection
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Method to update existing record.
     * It will not use "mass update" via eloquent, so that it will fire eloquent events while updating.
     *
     * @param int $id
     * @param array $attributes
     * @return boolean
     */
    public function update($id, array $attributes)
    {
        $currentModel = $this->find($id);

        return $currentModel->update($attributes);
    }

    /**
     * Method to update existing record via where condition.
     * It will use "mass update" via eloquent, so it will not fire eloquent events while updating.
     *
     * @param array $where
     * @param array $attributes
     * @return boolean
     */
    public function updateWhere(array $where, array $attributes)
    {
        return $this->model->where($where)->update($attributes);
    }

    /**
     * Method to delete a record.
     * It will not use "mass delete" via eloquent.
     *
     * @param int $id
     * @return boolean
     */
    public function delete($id)
    {
        $currentModel = $this->find($id);

        return $currentModel->delete();
    }
}
