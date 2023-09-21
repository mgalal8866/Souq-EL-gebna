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
            // ->when('user', function ($q) {
            //     $q->where('region', '1');
            // })
            ->with(['brand', 'category', 'user'])->get();

        // WhereHas('category', function ($q) use ($data) {
        //     $q->whereIn('id', $data['category_ids']);
        //     // $q->where('id', $data['category_ids']);
        // })->get();

        $tt =
            [
                'item'       => $item,
                'count'      => $item->count(),
                'store'      => $item->pluck('user.store_name', 'user_id'),
                'category'   => $item->pluck('category.name', 'category_id'),
                'brand'      => $item->pluck('brand.name', 'brand_id')
            ];
        return Resp(new ItemsResource2($tt), 'success');
    }
}
