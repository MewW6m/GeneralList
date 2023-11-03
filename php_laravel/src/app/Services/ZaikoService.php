<?php

namespace App\Services;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Repositories\ZaikoRepository;
use stdClass;

class ZaikoService {

    private $zaikoRepository;

    public function __construct(ZaikoRepository $zaikoRepository)
    {
        $this->zaikoRepository = $zaikoRepository;
    }

    public function getZaikoList(ZaikoListRequest $request) {
        $findAllDto = new stdClass();
        return $this->zaikoRepository->findAll($findAllDto);
    }

    public function getZaiko(ZaikoRequest $request) {
        $findOneDto = new stdClass();
        $findOneDto->id = $request->input('id');
        return $this->zaikoRepository->findOne($findOneDto);
    }
    public function registZaiko(ZaikoRequest $request) {
        $registOneDto = new stdClass();
        $registOneDto->id = $request->input('id');
        $registOneDto->status = $request->input('status');
        $registOneDto->itemCode = $request->input('itemCode');
        $registOneDto->registUser = 1;
        $registOneDto->updateUser = 1;
        $registOneDto->enable = $request->input('enable');
        $registOneDto->createAt = date('Y-m-d H:i:s');
        $registOneDto->updateAt = date('Y-m-d H:i:s');
        $this->zaikoRepository->registOne($registOneDto);
    }

    public function updateZaiko(ZaikoRequest $request) {
        $updateOneDto = new stdClass();
        $updateOneDto->id = $request->input('id');
        $updateOneDto->status = $request->input('status');
        $updateOneDto->itemCode = $request->input('itemCode');
        $updateOneDto->updateUser = 1;
        $updateOneDto->enable = $request->input('enable');
        $updateOneDto->updateAt = date('Y-m-d H:i:s');
        $this->zaikoRepository->updateOne($updateOneDto);
    }

    public function deleteZaiko(ZaikoRequest $request) {
        $deleteOneDto = new stdClass();
        $deleteOneDto->id = $request->input('id');
        $this->zaikoRepository->deleteOne($deleteOneDto);
    }
}