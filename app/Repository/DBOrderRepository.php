<?php

namespace App\Repository;

use App\Http\Resources\OrderResource;
use App\Models\order;
use Illuminate\Database\Eloquent\Model;

use App\Repositoryinterface\OrderRepositoryinterface;

class DBOrderRepository implements OrderRepositoryinterface
{

    protected Model $model;
    public function __construct(order $model)
    {
        $this->model = $model;
    }
    public function please_order($data)
    {
        $neworder = $this->model->create([
            'user_id'  => auth('api')->user()->id,
            'subtotal' => $data['data']['subtotal'],
            'discount' => $data['data']['discount'],
            'total'    => $data['data']['total'],
        ]);
        foreach ($data['invo'] as $item) {
            $neworder->orderdetails->create([
                'item_id'  => $item['item_id'],
                'qty'      => $item['qty'],
                'price'    => $item['price'],
                'subtotal' => $item['subtotal'],
                'discount' => $item['discount'],
                'total'    => $item['total'],
            ]);
        }
    }
    public function get_order_user()
    {
        $orderuser = $this->model->where(['user_id' => auth('api')->user()->id])->get();
        return  Resp(OrderResource::collection($orderuser), 'success');
    }
}
