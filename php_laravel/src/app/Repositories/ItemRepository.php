<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class ItemRepository {

    public function findAll(stdClass $findOneDto) : Collection {
        $itemList = DB::table('item_masters')
        ->where('id', '=', $findOneDto->id)
        ->where('enable', '=', 1)
        ->get();
        return $itemList;
    }

    public function findOne(stdClass $findOneDto) : object {
        $item = DB::table('item_masters')
        ->where('id', '=', $findOneDto->id)
        ->where('enable', '=', 1)
        ->sole();
        return $item;
    }
}