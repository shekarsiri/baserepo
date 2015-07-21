<?php


namespace ShekarSiri\BaseRepo;


trait CrudableTrait
{
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
}