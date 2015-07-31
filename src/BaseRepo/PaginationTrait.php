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
                    
                    $type = $this->queries[$key];
                    if (!is_array($type)) {
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

                            default:
                                $q->where($key, $val);
                                break;
                        }
                    } else if (is_array($type)) {
                        switch ($type['type']) {
                            case 'whereHas':
                                $q->whereHas($type['relation'], function ($q) use ($type, $val) {
                                    $q->where($type['column'], $val);
                                });
                                break;
                        }
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