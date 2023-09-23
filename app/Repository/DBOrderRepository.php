<?php

namespace App\Repository;

use App\Models\order;
use Illuminate\Database\Eloquent\Model;

use App\Repositoryinterface\OrderRepositoryinterface;

class DBOrderRepository implements OrderRepositoryinterface
{

    protected Model $model;
    public function __construct(order $model)
    {
        $this->model = $model;
    }

}
