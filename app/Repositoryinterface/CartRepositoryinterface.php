<?php
namespace App\Repositoryinterface;

interface CartRepositoryinterface{


    public function getusercart();
    public function add_to_cart($request);
    public function del_from_cart($request);

}

