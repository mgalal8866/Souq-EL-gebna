<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Repositoryinterface\CartRepositoryinterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartRepositry;
    public function __construct(CartRepositoryinterface $cartRepositry)
    {
        $this->cartRepositry = $cartRepositry;
    }

    function getusercart()
    {

        return $this->cartRepositry->getusercart();
    }
    function add_to_cart(Request $request)
    {
        return $this->cartRepositry->add_to_cart($request);
    }
    function del_from_cart(Request $request)
    {
        return $this->cartRepositry->del_from_cart($request);
    }

}
