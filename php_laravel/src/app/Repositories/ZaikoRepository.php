<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use stdClass;

class ZaikoRepository {
    public function findAll(stdClass $findAllDto) {
        $zaikoList = DB::table('stocks')
        ->where('id', '=', $findAllDto->id)
        ->get();
        return $zaikoList;
    }

    public function findOne(stdClass $findOneDto) {
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
        ->where('a.id', '=', $findOneDto->id)
        ->where('a.enable', '=', 1)
        ->where('b.enable', '=', 1)
        ->join('item_masters as b', 'a.itemCode', '=', 'b.id')
        ->leftjoin('users as c', 'a.registUser', '=', 'c.id')
        ->leftjoin('users as d', 'a.updateUser', '=', 'd.id')
        ->leftjoin('department_masters as e', 'c.departmentId', '=', 'e.id')
        ->leftjoin('department_masters as f', 'd.departmentId', '=', 'f.id')
        ->sole();
        return $zaiko;
    }

    public function registOne(stdClass $registOneDto) {
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

    public function updateOne(stdClass $updateOneDto) {
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

    public function deleteOne(stdClass $deleteOneDto) {
        DB::table('stocks')
        ->where('id', '=', $deleteOneDto->id)
        ->first()
        ->delete();
    }
}