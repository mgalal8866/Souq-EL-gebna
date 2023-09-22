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
    public function createitem(Request $request)
    {
        return $this->itemsRepositry->createitem($request->all());

    }
    public function getitembyuser()
    {
        return $this->itemsRepositry->getitembyuser();

    }
    public function change_active_item($id)
    {
        return $this->itemsRepositry->change_active_item($id);

    }
    public function get_item_by_store($id)
    {
        return $this->itemsRepositry->get_item_by_store($id);

    }
}
