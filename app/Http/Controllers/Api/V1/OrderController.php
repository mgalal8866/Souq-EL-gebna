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
}
