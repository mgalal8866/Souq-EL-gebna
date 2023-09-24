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
    public function getusercart()
    {
        $getcart =   $this->model->where('user_id', auth('api')->user()->id)->get();
        return Resp($getcart, 'success', true);
    }
    public function del_from_cart($item_id)
    {
        $delete =   $this->model->where(['user_id' => auth('api')->user()->id, 'id' => $item_id])->first();
        return $delete->delete() == true ? Resp('', 'success') : Resp('', 'error', 301, false);
    }

    public function add_to_cart($item_id)
    {
        $addtocart =   $this->model->create(['user_id' => auth('api')->user()->id, 'id' => $item_id]);

        return  Resp($addtocart, 'success', true);
    }
    public function edit_qty_cart($item_id, $qty)
    {
        $addtocart =   $this->model->update(['user_id' => auth('api')->user()->id, 'id' => $item_id], ['qty' => $qty]);

        return  Resp($addtocart, 'success', true);
    }
}
