<?php

namespace App\Repositories;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use stdClass;

/**
 * ZaikoRepositoryクラス
 */
class ZaikoRepository {
    /**
     * 全ての在庫を検索します。
     *
     * @param stdClass $findAllDto 検索条件を含むオブジェクト
     * @return LengthAwarePaginator 検索結果のページネーション
     */
    public function findAll(stdClass $findAllDto) : LengthAwarePaginator {
        $zaikoList = DB::table('stocks as a')
        ->addSelect('a.id')
        ->addSelect('a.status')
        ->addSelect('a.itemCode')
        ->addSelect('b.name')
        ->addSelect('a.createAt')
        ->addSelect('a.updateAt')
        ->leftjoin('item_masters as b', 'a.itemCode', '=', 'b.id')
        ->where('a.id', 'like', $findAllDto->id)
        ->where('a.itemCode', 'like', $findAllDto->itemCode)
        ->where('b.name', 'like', $findAllDto->itemName)
        ->where('a.status', 'like', $findAllDto->status)
        ->where('a.enable', '=', 1)
        ->where('b.enable', '=', 1)
        ->orderBy($findAllDto->sort, $findAllDto->order)
        ->paginate(30);
        return $zaikoList;
    }

    /**
     * 一つの在庫を検索します。
     *
     * @param stdClass $findOneDto 検索条件を含むオブジェクト
     * @return object 検索結果の在庫
     */
    public function findOne(stdClass $findOneDto) : object {
        $zaiko = DB::table('stocks as a')
        ->addSelect('a.id')
        ->addSelect('a.itemCode')
        ->addSelect('b.name')
        ->addSelect('a.status')
        ->addSelect('c.name as cname')
        ->addSelect('d.name as dname')
        ->addSelect('c.email as cemail')
        ->addSelect('d.email as demail')
        ->addSelect('e.name as ename')
        ->addSelect('f.name as fname')
        ->addSelect('a.enable')
        ->addSelect('a.createAt')
        ->addSelect('a.updateAt')
        ->leftjoin('item_masters as b', 'a.itemCode', '=', 'b.id')
        ->leftjoin('users as c', 'a.registUser', '=', 'c.id')
        ->leftjoin('users as d', 'a.updateUser', '=', 'd.id')
        ->leftjoin('department_masters as e', 'c.departmentId', '=', 'e.id')
        ->leftjoin('department_masters as f', 'd.departmentId', '=', 'f.id')
        ->where('a.id', '=', $findOneDto->id)
        ->where('a.enable', '=', 1)
        ->where('b.enable', '=', 1)
        ->sole();
        return $zaiko;
    }

    /**
     * 一つの在庫を登録します。
     *
     * @param stdClass $registOneDto 登録する在庫の情報を含むオブジェクト
     * @return void
     */
    public function registOne(stdClass $registOneDto) : void {
        DB::table('stocks')->insert([
            'id' => $registOneDto->id,
            'status' => $registOneDto->status,
            'itemCode' => $registOneDto->itemCode,
            'registUser' => $registOneDto->registUser,
            'updateUser' => $registOneDto->updateUser,
            'enable' => $registOneDto->enable,
            'createAt' => $registOneDto->createAt,
            'updateAt' => $registOneDto->updateAt,
        ]);
    }

    /**
     * 一つの在庫を更新します。
     *
     * @param stdClass $updateOneDto 更新する在庫の情報を含むオブジェクト
     * @return void
     */
    public function updateOne(stdClass $updateOneDto) : void {
        DB::table('stocks')
        ->where('id', '=', $updateOneDto->id)
        ->update([
            'id' => $updateOneDto->id,
            'status' => $updateOneDto->status,
            'itemCode' => $updateOneDto->itemCode,
            'updateUser' => $updateOneDto->updateUser,
            'enable' => $updateOneDto->enable,
            'updateAt' => $updateOneDto->updateAt,
        ]);
    }

    /**
     * 一つの在庫を削除します。
     *
     * @param stdClass $deleteOneDto 削除する在庫の情報を含むオブジェクト
     * @return void
     */
    public function deleteOne(stdClass $deleteOneDto) : void {
        DB::table('stocks')
        ->where('id', '=', $deleteOneDto->id)
        ->delete();
    }
}