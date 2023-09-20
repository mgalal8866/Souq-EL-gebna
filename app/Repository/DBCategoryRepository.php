<?php

namespace App\Repository;

use App\Models\category;
use App\Http\Resources\CategoryResource;
use App\Repositoryinterface\CategoryRepositoryinterface;


class DBCategoryRepository implements CategoryRepositoryinterface
{
    public function getcategory()
    {
        $category = category::get();
        return Resp(CategoryResource::collection($category), 'success');
    }
  }
