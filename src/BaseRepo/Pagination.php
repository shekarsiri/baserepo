<?php namespace ShekarSiri\BaseRepo;


interface Pagination
{
    public function pagination($total, array $query = [], array $columns = ['*']);
}