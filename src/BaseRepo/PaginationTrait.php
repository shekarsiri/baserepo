<?php namespace ShekarSiri\BaseRepo;


trait PaginationTrait
{
    public function pagination($total = 10, array $with = [], array $query = [], array $columns = ['*'])
    {
        //WITH Relations
        $model = $this->make($with);

        //QUERY
        $model = $model->where(function ($q) use ($query) {
            foreach ($query as $key => $val) {
                if ($val && array_key_exists($key, $this->queries) && $key != 'page') {
                    switch ($this->queries[$key]) {
                        case '=':
                            $q->where($key, $val);
                            break;

                        case 'like':
                            $q->where($key, 'LIKE', '%' . $val . '%');
                            break;

                        case 'in':
                            $q->whereIn($key, $val);
                            break;

                        case 'whereHas':
                            $q->whereHas($key, function ($q) use ($val) {
                                $q->where($val[0], $val[1]);
                            });
                            break;

                        default:
                            $q->where($key, $val);
                            break;
                    }
                }
            }
        });

        //SELECTS
        $model = $model->select($columns);


        //PAGINATE
        $model = $model->paginate($total);

        return $model;
    }
}