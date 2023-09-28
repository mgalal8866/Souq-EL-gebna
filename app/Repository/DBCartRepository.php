<?php

namespace App\Repository;

use App\Models\cart;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\CartRepositoryinterface;

class DBCartRepository implements CartRepositoryinterface
{

    // protected Model $model;
    // public function __construct(cart $model)
    // {
    //     $this->model = $model;
    // }
    // public function getusercart()
    // {
    //     $getcart =   $this->model->where('user_id', auth('api')->user()->id)->get();
    //     return Resp($getcart, 'success');
    // }
    // public function del_from_cart($item_id)
    // {
    //     $delete =   $this->model->where(['user_id' => auth('api')->user()->id, 'item_id' => $item_id])->delete();
    //     return $delete == true ? Resp('', 'success') : Resp('', 'error', 301, false);
    // }

    // public function add_to_cart($item_id)
    // {
    //     $addtocart =   $this->model->create(['user_id' => auth('api')->user()->id, 'item_id' => $item_id, 'qty' => 1]);

    //     return  Resp($addtocart, 'success');
    // }
    // public function edit_qty_cart($item_id, $qty)
    // {
    //     $item = $this->model->where(['user_id' => auth('api')->user()->id, 'item_id' => $item_id])->first();
    //     $updateqty =     $item->update(['qty' => $qty]);
    //     return $updateqty == true ? Resp($item, 'success') : Resp('', 'error', 301, false);
    // }
}
