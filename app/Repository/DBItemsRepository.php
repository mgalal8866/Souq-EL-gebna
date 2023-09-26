<?php

namespace App\Repository;

use App\Models\items;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemsResource;
use App\Http\Resources\ItemsResource2;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\ItemsStoreResource;
use App\Repositoryinterface\ItemsRepositoryinterface;

class DBItemsRepository implements ItemsRepositoryinterface
{
    protected Model $model;
    public function __construct(items $model)
    {
        $this->model = $model;
    }
    public function search($data)
    {
        $item = $this->model->active_admin()->active()->where('name', 'LIKE', "%" .  $data['search'] . "%")
            ->whereIn('category_id', $data['category_ids'])->WhereHas('user', function ($q) use ($data) {
                $q->where('city_id', $data['city_id']);
            })
            ->with(['brand', 'category', 'comments', 'user'])->get();

        $result = [
            'item'       => $item,
            'count'      => $item->count(),
            'brand'      => $item->pluck('brand'),
            'category'   => $item->pluck('category')
        ];
        return Resp(new ItemsResource2($result), 'success');
    }
    public function edititem($data)
    {
        Log::error($data);
        Log::error( auth('api')->user()->id);
        $result1 =  $this->model->where(['id' => $data['id'], 'user_id' => auth('api')->user()->id])->first();
        $result =  $result1->update([
            'name'        => $data['name'],
            'img'         => (isset($data['img']) == true) ? uploadimages('item', $data['img'] ?? null) : $result1->img ?? null,
            'category_id' => $data['category_id'],
            'brand_id'    => $data['brand_id'],
            'min_qty'     => $data['min_qty'],
            'max_qty'     => $data['max_qty'],
            'stock_qty'   => $data['stock_qty'],
            'price_salse' => $data['price_salse'],
            'price_offer' => $data['price_offer'],
            'exp_date'    => $data['exp_date'],
            'pro_date'    => $data['pro_date'],
            'description' => $data['description']
        ]);

        if ($result != null) {
            return Resp(new ItemsResource($result1), 'success');
        } else {
            return Resp($result, 'error', 301);
        }
    }
    public function createitem($data)
    {
        $result =  $this->model->create([
            'name'        => $data['name'],
            'user_id'     => auth('api')->user()->id,
            'img'         => uploadimages('item', $data['img'] ?? null) ?? null,
            'category_id' => $data['category_id'],
            'brand_id'    => $data['brand_id'],
            'min_qty'     => $data['min_qty'],
            'max_qty'     => $data['max_qty'],
            'stock_qty'   => $data['stock_qty'],
            'price_salse' => $data['price_salse'],
            'price_offer' => $data['price_offer'],
            'exp_date'    => $data['exp_date'],
            'pro_date'    => $data['pro_date'],
            'description' => $data['description']
        ]);
        if ($result != null) {
            return Resp(new ItemsResource($result), 'success');
        } else {
            return Resp('', 'error', 301);
        }
    }
    public function getitembyuser()
    {
        $result = $this->model->active_admin()->where('user_id', auth('api')->user()->id)->get();
        if ($result != null) {
            return Resp(ItemsResource::collection($result), 'success');
        } else {
            return Resp('', 'error', 301);
        }
    }
    public function change_active_item($id)
    {
        $result = $this->model->where(['user_id' => auth('api')->user()->id, 'id' => $id])->first();
        if ($result != null) {
            if ($result->active == 1) {

                $result->update(['active' => '0']);
                return Resp(new ItemsResource($result), 'تم ايقاف تفعيل المنتج');
            } else {

                $result->update(['active' => '1']);
                return Resp(new ItemsResource($result), 'تم تفعيل المنتج');
            }
        } else {
            return Resp('', 'error', 301);
        }
    }
    public function get_item_by_category($id)
    {

        $result = $this->model->active_admin()->active()->where(['category_id' => $id])->get();
        if ($result != null) {
            if ($result != null) {
                return Resp(ItemsResource::collection($result), 'success');
            } else {
                return Resp('', 'error', 301);
            }
        } else {
            return Resp('', 'error', 301);
        }
    }
    public function get_item_by_store($id)
    {

        $result = $this->model->active_admin()->active()->where(['user_id' => $id])->get();
        if ($result != null) {
            if ($result != null) {
                return Resp(ItemsStoreResource::collection($result), 'success');
            } else {
                return Resp('', 'error', 301);
            }
        } else {
            return Resp('', 'error', 301);
        }
    }
}
