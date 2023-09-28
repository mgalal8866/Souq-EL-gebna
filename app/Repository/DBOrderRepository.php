<?php

namespace App\Repository;

use App\Http\Resources\MainOrderResource;
use App\Models\MainOrder;
use Illuminate\Database\Eloquent\Model;

use App\Repositoryinterface\OrderRepositoryinterface;

class DBOrderRepository implements OrderRepositoryinterface
{

    protected Model $model;
    public function __construct(MainOrder $model)
    {
        $this->model = $model;
    }
    public function please_order($data)
    {
        $Mainorder = $this->model->create([
            'user_id'  => auth('api')->user()->id,
            'main_subtotal' => $data['main']['main_subtotal'],
            'main_discount' => $data['main']['main_discount'],
            'main_total'    => $data['main']['main_total'],
        ]);
        foreach ($data['sub'] as $subitem) {
            $suborder =   $Mainorder->suborder()->create([
                'store_id'      => $subitem['store_id'],
                'sub_subtotal'  => $subitem['sub_subtotal'],
                'sub_discount'  => $subitem['sub_discount'],
                'sub_total'     => $subitem['sub_total']
            ]);
            foreach ($subitem['details'] as $details) {
                $suborder->orderdetails()->create([
                    'item_id'           => $details['item_id'],
                    'details_price'     => $details['details_price'],
                    'details_qty'       => $details['details_qty'],
                    'details_discount'  => $details['details_discount'],
                    'details_subtotal'  => $details['details_subtotal'],
                    'details_total'  => $details['details_total'],
                ]);
            }
        }


        return  Resp(new MainOrderResource($Mainorder), 'success');
    }
    public function get_order_user()
    {
        $orderuser = $this->model->where(['user_id' => auth('api')->user()->id])->get();
        return  Resp(MainOrderResource::collection($orderuser), 'success');
    }
}
