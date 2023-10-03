<?php

namespace App\Repository;

use App\Models\cart;
use App\Http\Resources\CartResource;
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
        return Resp(CartResource::collection($getcart), 'success');
    }
    public function del_from_cart($request)
    {
        $delete =   $this->model->where(['user_id' => auth('api')->user()->id, 'item_id' =>  $request->item_id])->first();
        if($delete != null){
            $delete->delete();
        }
        return $delete == true ? Resp('', 'success') : Resp('', 'error', 301, false);
    }

    public function add_to_cart($request)
    {
        $addtocart =   $this->model->updateOrCreate(['user_id' => auth('api')->user()->id, 'item_id' => $request->item_id],['user_id' => auth('api')->user()->id, 'item_id' => $request->item_id, 'qty' => $request->qty]);
        return  Resp($addtocart, 'success');
    }
}
