<?php namespace ShekarSiri\BaseRepo;


class AbstractRepositoryEloquent
{
    /**
     * @var
     */
    protected $model;


    /**
     * @param array $with
     *
     * @return mixed
     */
    public function make(array $with = array())
    {
        return $this->model->with($with);
    }

    /**
     * @param array $with
     *
     * @return mixed
     */
    public function all(array $with = array())
    {
        $entity = $this->make($with);

        return $entity->get();
    }

    /**
     * @param       $id
     * @param array $with
     *
     * @return mixed
     */
    public function find($id, array $with = array())
    {
        $entity = $this->make($with);

        return $entity->findOrFail($id);
    }

    /**
     * @param       $key
     * @param       $value
     * @param array $with
     *
     * @return mixed
     */
    public function getBy($key, $value, array $with = array())
    {
        return $this->make($with)->where($key, '=', $value)->get();
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $model = $this->model->create($data);

        return $model;
        // TODO: Implement create() method.
    }

    /**
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data)
    {
        $model = $this->model->find($id);
        $model->fill($data);
        $model->save();

        return $model;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    public function count()
    {
        return $this->model->count();
    }

    /**
     * @param int $page
     * @param int $limit
     * @param array $with
     *
     * @return StdClass
     */
    public function getByPage($page = 1, $limit = 10, $with = array())
    {
        $result = new StdClass;
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $query = $this->make($with);
        $users = $query->skip($limit * ($page - 1))
            ->take($limit)
            ->get();
        $result->totalItems = $this->model->count();
        $result->items = $users->all();

        return $result;
    }
}