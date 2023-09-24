<?php
namespace App\Repositoryinterface;

interface CartRepositoryinterface{


    public function getusercart();
    public function add_to_cart($item_id);
    public function del_from_cart($item_id);
    public function edit_qty_cart($item_id, $qty);
}

