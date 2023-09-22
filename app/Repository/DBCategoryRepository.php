<?php

namespace App\Repository;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\CategoryResource;
use App\Repositoryinterface\CategoryRepositoryinterface;


class DBCategoryRepository implements CategoryRepositoryinterface
{
    protected Model $model;
    public function __construct(category $model)
    {
        $this->model = $model;
    }
    public function getcategory()
    {
        $category = $this->model->get();
        return Resp(CategoryResource::collection($category), 'success');
    }
  }
