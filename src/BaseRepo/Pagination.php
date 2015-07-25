<?php namespace ShekarSiri\BaseRepo;


interface Pagination
{
    public function pagination($total = 10, array $with = [], array $query = [], array $columns = ['*'])
}