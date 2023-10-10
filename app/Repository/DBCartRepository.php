<?php

namespace App\Repository;


use App\Models\items;
use App\Models\Cart\CartMain;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Cart\CartMainResource;
use App\Models\Cart\CartItem;
use App\Repositoryinterface\CartRepositoryinterface;

class DBCartRepository implements CartRepositoryinterface
{

    protected Model $model;
    public function __construct(CartMain $model)
    {
        $this->model = $model;
    }
    public function getusercart()
    {
        $cartuser = $this->model->where(['user_id' => auth('api')->user()->id])->with(['cartsub', 'cartsub.cartitem'])->get();
        return  Resp(CartMainResource::collection($cartuser), 'success');
    }
    public function del_from_cart($request)
    {

        $q = CartItem::whereHas('cartsub', function ($qq) {
            $qq->whereHas('cartmain', function ($qqq) {
                return  $qqq->where('cart_mains.user_id', auth('api')->user()->id);
            });
        })->where( 'item_id' , $request->item_id)->first();
        if ($q != null) {
            $q->delete();
        }
        return $q == true ? Resp('', 'success') : Resp('', 'error', 301, false);

    }

    public function add_to_cart($request)
    {
        // $addtocart =   $this->model->updateOrCreate(['user_id' => auth('api')->user()->id, 'item_id' => $request->item_id], ['user_id' => auth('api')->user()->id]);
        // return  Resp($addtocart, 'success');
        $items = items::with('user')->find($request->item_id);
        if ($items->price_offer > 0) {
            $price      = $items->price_offer;
            $qty        = $request->qty;
            $subtotal   = $request->qty * $items->price_salse;
            $discount   = ($request->qty * $items->price_salse) - ($request->qty * $items->price_offer);
            $total      = $request->qty * $items->price_offer;
        } else {
            $price      = $items->price_salse;
            $qty        = $request->qty;
            $subtotal   = $request->qty * $items->price_salse;
            $discount   = 0;
            $total      = $request->qty * $items->price_salse;
        };
        $cartmain =   $this->model->updateOrCreate(['user_id' => auth('api')->user()->id], ['user_id' => auth('api')->user()->id]);
        $cartsub = $cartmain->cartsub()->updateOrCreate([
            'store_id' => $items->user_id
        ]);
        $cartsub->cartitem()->updateOrCreate(['item_id'  =>  $items->id], [
            'cart_item_price'      => $price,
            'cart_item_qty'        => $qty,
            'cart_item_subtotal'   => $subtotal,
            'cart_item_discount'   => $discount,
            'cart_item_total'      => $total

        ]);
        return  Resp(new CartMainResource($cartmain), 'success');
    }
}
