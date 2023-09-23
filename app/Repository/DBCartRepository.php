<?php

namespace App\Repository;

use App\Models\cart;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\CartRepositoryinterface;

class DBCartRepository implements CartRepositoryinterface
{

    protected Model $model;
    public function __construct(cart $model)
    {
        $this->model = $model;
    }
}
