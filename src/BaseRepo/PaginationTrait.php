<?php namespace ShekarSiri\BaseRepo;


trait PaginationTrait
{
    public function pagination($total = 10, array $query = [], array $columns = ['*'])
    {
        $models = $this->model->paginate($total);
        return $models;
    }
}