<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

/**
 * ItemRepositoryクラス
 */
class ItemRepository {

    /**
     * 全てのアイテムを検索します。
     *
     * @param stdClass $findOneDto 検索条件を含むオブジェクト
     * @return Collection 検索結果のコレクション
     */
    public function findAll(stdClass $findOneDto) : Collection {
        $itemList = DB::table('item_masters')
        ->where('id', '=', $findOneDto->id)
        ->where('enable', '=', 1)
        ->get();
        return $itemList;
    }

    /**
     * 一つのアイテムを検索します。
     *
     * @param stdClass $findOneDto 検索条件を含むオブジェクト
     * @return object 検索結果のアイテム
     */
    public function findOne(stdClass $findOneDto) : object {
        $item = DB::table('item_masters')
        ->where('id', '=', $findOneDto->id)
        ->where('enable', '=', 1)
        ->sole();
        return $item;
    }
}