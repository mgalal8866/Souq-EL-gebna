<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositoryinterface\ItemsRepositoryinterface;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    private $itemsRepositry;
    public function __construct(ItemsRepositoryinterface $itemsRepositry)
    {
        $this->itemsRepositry = $itemsRepositry;
    }

    public function search(Request $request)
    {
        return $this->itemsRepositry->search($request->all());
     
    }
}
