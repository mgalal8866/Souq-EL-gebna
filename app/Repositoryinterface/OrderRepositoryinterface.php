<?php

namespace App\Repositoryinterface;

interface OrderRepositoryinterface
{


    public function get_order_user();

    public function get_suborder_by_main_id($id);
    public  function please_order($data);
    public  function get_order_by_statu($statu);
    public  function change_statu($request);
    public  function get_order_details($id);
}
