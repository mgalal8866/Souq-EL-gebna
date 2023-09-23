<?php

namespace App\Repository;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\OrderDetailsRepositoryinterface;


class DBOrderDetailsRepository implements OrderDetailsRepositoryinterface
{

    protected Model $model;
    public function __construct(OrderDetails $model)
    {
        $this->model = $model;
    }

}
