<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\SubOrder;
use App\Models\MainOrder;
use App\Models\OrderDetails;
use App\Models\Cart\CartMain;
use App\Enums\OrderStatusEnum;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\SubOrderResource;
use App\Http\Resources\MainOrderResource;
use App\Http\Resources\ChartOrderResource;
use App\Http\Resources\MainsubOrderResource;
use App\Http\Resources\SubOrderForStoreResource;
use App\Http\Resources\OrderDetailsForStoreResource;
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
                'sub_total'     => $subitem['sub_total'],
                'sub_statu_delivery'     => OrderStatusEnum::New
            ]);
            foreach ($subitem['details'] as $details) {
                $suborder->orderdetails()->create([
                    'item_id'           => $details['item_id'],
                    'details_price'     => $details['details_price'],
                    'details_qty'       => $details['details_qty'],
                    'details_discount'  => $details['details_discount'],
                    'details_subtotal'  => $details['details_subtotal'],
                    'details_total'     => $details['details_total'],
                ]);
            }
        }
        $cartmain =  CartMain::where('user_id', auth('api')->user()->id)->first();

        if($cartmain != null){
            $cartmain->delete();
        }

        return  Resp(new MainOrderResource($Mainorder), 'success');
    }
    public function get_order_user()
    {
        $orderuser = $this->model->where(['user_id' => auth('api')->user()->id])->get();
         if($orderuser == null){
            Resp('', 'Not Found Orders');
         }
        return  Resp(MainOrderResource::collection($orderuser), 'success');
    }
    public function get_chart_order($id)
 {
        switch ($id) {
            case 1:
                $fromdate     = Carbon::now()->today()->format('Y/m/d');
                $todate     = Carbon::now()->today()->format('Y/m/d');
                break;
            case 2:
                $fromdate     = Carbon::now()->yesterday()->format('Y/m/d');
                $todate     = Carbon::now()->yesterday()->format('Y/m/d');
                break;
            case 3:
                $fromdate     = Carbon::now()->startOfWeek()->format('Y/m/d');
                $todate       = Carbon::now()->endOfWeek()->format('Y/m/d');
                break;
            case 4:
                $fromdate     = Carbon::now()->startOfMonth()->format('Y/m/d');
                $todate       = Carbon::now()->endOfMonth()->format('Y/m/d');
                break;

        }
        $orderuser = $this->model->where(['user_id' => auth('api')->user()->id, 'created_at'=> [$fromdate, $todate]])->get();
        return  Resp(new ChartOrderResource($orderuser), 'success');
    }
    public function get_order_by_statu($statu)
    {

        $orderstatu = SubOrder::with(['main','main.user'])->where(['sub_statu_delivery' => $statu, 'store_id'=> auth('api')->user()->id])->get();

        return  Resp(SubOrderForStoreResource::collection($orderstatu), 'success');
    }
    public function change_statu($request)
    {
        $suborder = SubOrder::find($request['suborder_id']);
        $suborder->update(['sub_statu_delivery' => $request['statu']]);

        return  Resp(new SubOrderForStoreResource($suborder), 'success');
    }
    public function get_order_details($id)
    {
        $orderdetails = OrderDetails::with('suborder')->where('sub_order_id',$id)->get();
        $data = ['details'=> $orderdetails];
        return  Resp( new OrderDetailsForStoreResource($data), 'success');
    }

    public function get_suborder_by_main_id($id)
    {
        $orderuser = $this->model->where(['user_id' => auth('api')->user()->id,'id'=>$id])->first();
        return  Resp(new MainsubOrderResource($orderuser), 'success');
    }
}
