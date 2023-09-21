<?php

namespace App\Repository;

use App\Models\items;
use App\Http\Resources\ItemsResource;
use App\Repositoryinterface\ItemsRepositoryinterface;


class DBItemsRepository implements ItemsRepositoryinterface
{
    public function search($data)
    {
        $item = items::get();
        return Resp(ItemsResource::collection($item),'success');
    }

  }
