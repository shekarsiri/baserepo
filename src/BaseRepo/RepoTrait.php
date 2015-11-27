<?php


namespace ShekarSiri\BaseRepo;


trait RepoTrait
{
    /**
     * @param       $key
     * @param       $value
     * @param string $operator
     * @param array $with
     * @return mixed
     */
    public function getBy($key, $value, $operator = '=', array $with = array())
    {
        return $this->make($with)->where($key, $operator, $value)->first();
    }

    public function count()
    {
        return $this->model->count();
    }
}