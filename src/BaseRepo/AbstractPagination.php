<?php namespace ShekarSiri\BaseRepo;


class AbstractPagination
{
    public function pagination($total = 10)
    {
        $models = $this->model->paginate($total);
        return $models;
    }
}