<?php namespace ShekarSiri\BaseRepo;


abstract class AbstractPagination
{
    public function pagination($total = 10)
    {
        $models = $this->model->paginate($total);
        return $models;
    }
}