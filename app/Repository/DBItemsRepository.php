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
            ->whereIn('category_id', $data['category_ids'])->WhereHas('user', function ($q) use ($data) {
                $q->where('city_id', $data['city_id']);
            })
            ->with(['brand', 'category', 'user'])->get();
        $result = [
            'item'       => $item,
            'count'      => $item->count(),
            'brand'      => $item->pluck('brand'),
            'category'   => $item->pluck('category')
        ];
        return Resp(new ItemsResource2($result), 'success');
    }
    public function createitem($data)
    {
       $result =  items::create([
            'name'        => $data['name'],
            'user_id'     => auth('api')->user()->id,
            'category_id' => $data['category_id'],
            'brand_id'    => $data['brand_id'],
            'min_qty'     => $data['min_qty'],
            'max_qty'     => $data['max_qty'],
            'price_salse' => $data['price_salse'],
            'price_offer' => $data['price_offer'],
            'exp_date'    => $data['exp_date'],
            'pro_date'    => $data['pro_date'],
            'description' => $data['description']
        ]);
        if($result != null){
            return Resp( new ItemsResource($result),'success');
        }else{
            return Resp( '','error',301);

        }
    }
}
