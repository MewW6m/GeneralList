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
        $zaiko = DB::table('stocks')
        ->where('id', '=', $findOneDto->id)
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
        ->delete();
    }
}