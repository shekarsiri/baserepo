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
        $operator = strtolower($operator);
        switch ($operator) {
            case '=':
            case '>':
                return $this->make($with)->where($key, $operator, $value)->get();
                break;
            case 'like':
                return $this->make($with)->where($key, 'LIKE', '%' . $value . '%')->get();
                break;
        }
    }

    public function count()
    {
        return $this->model->count();
    }
}