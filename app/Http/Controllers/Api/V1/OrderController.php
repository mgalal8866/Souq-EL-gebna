<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositoryinterface\OrderRepositoryinterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderRepositry;
    public function __construct(OrderRepositoryinterface $orderRepositry)
    {
        $this->orderRepositry = $orderRepositry;
    }
    function please_order(Request $request)
    {
        return $this->orderRepositry->please_order($request);
    }


    function get_order_user()
    {
        return $this->orderRepositry->get_order_user();
    }

    function get_suborder_by_main_id($id)
    {

        return $this->orderRepositry->get_suborder_by_main_id($id);
    }
    function get_order_by_statu(Request $request)
    {
        return $this->orderRepositry->get_order_by_statu($request->statu);
    }
    function change_statu(Request $request)
    {
        return $this->orderRepositry->change_statu($request->all());
    }
    function get_order_details(Request $request)
    {
        return $this->orderRepositry->get_order_details($request->suborder_id);
    }
}
