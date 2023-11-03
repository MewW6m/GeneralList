<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use stdClass;

class ItemRepository {

    public function findAll(stdClass $findOneDto) {
        $itemList = DB::table('item_masters')
        ->where('id', '=', $findOneDto->id)
        ->where('enable', '=', 1)
        ->get();
        return $itemList;
    }

    public function findOne(stdClass $findOneDto) {
        $item = DB::table('item_masters')
        ->where('id', '=', $findOneDto->id)
        ->where('enable', '=', 1)
        ->sole();
        return $item;
    }
}