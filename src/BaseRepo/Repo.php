<?php


namespace ShekarSiri\BaseRepo;


interface Repo
{
    public function getBy($key, $value, $operator = '=', array $with = array());

    public function count();
}