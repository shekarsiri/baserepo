<?php namespace ShekarSiri\BaseRepo;


interface Crudable
{
    /**
     * @param array $with
     *
     * @return mixed
     */
    public function all(array $with = []);

    /**
     * @param       $id
     * @param array $with
     *
     * @return mixed
     */
    public function find($id, array $with = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);


    public function firstOrCreate(array $data);

    /**
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    //public function order($by, $order);
}