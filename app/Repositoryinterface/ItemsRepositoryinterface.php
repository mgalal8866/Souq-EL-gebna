<?php
namespace App\Repositoryinterface;

interface ItemsRepositoryinterface{

    public function search($data);
    public function createitem($data);
    public function getitembyuser();
    public function change_active_item($id);
    public function get_item_by_store($id);

}

