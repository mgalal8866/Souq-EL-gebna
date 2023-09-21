<?php

namespace App\Repository;

use App\Models\items;
use App\Http\Resources\ItemsResource;
use App\Http\Resources\ItemsResource2;
use App\Repositoryinterface\ItemsRepositoryinterface;


class DBItemsRepository implements ItemsRepositoryinterface
{
    public function search($data)
    {
        $item = items::where('name', 'LIKE', "%" .  $data['search'] . "%")
            ->whereIn('category_id', $data['category_ids'])
            ->with(['brand', 'category', 'user'])->get();
        $result =[
                'item'       => $item,
                'count'      => $item->count(),
                'brand'      => $item->pluck('brand')->unique(),
                'category'   => $item->pluck('category')
            ];
        return Resp(new ItemsResource2($result), 'success');
    }
}
