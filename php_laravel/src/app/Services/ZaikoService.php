<?php
declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Repositories\ItemRepository;
use App\Repositories\ZaikoRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use stdClass;

class ZaikoService {

    private ZaikoRepository $zaikoRepository;
    private ItemRepository $itemRepository;

    public function __construct(ZaikoRepository $zaikoRepository, ItemRepository $itemRepository)
    {
        $this->zaikoRepository = $zaikoRepository;
        $this->itemRepository = $itemRepository;
    }

    public function getZaikoList(ZaikoListRequest $request) : LengthAwarePaginator {

        $findAllDto = new stdClass();
        $findAllDto->id = $request->input('id') ?? '%';
        $findAllDto->status = $request->input('status') ?? '%';
        $findAllDto->itemCode = $request->input('itemCode') ?? '%';
        $findAllDto->itemName = $request->input('itemName') ?? '%';
        $findAllDto->sort = $request->input('sort');
        $findAllDto->order = $request->input('order');
        return $this->zaikoRepository->findAll($findAllDto);
    }

    public function getZaiko(ZaikoRequest $request) : object {
        $findOneDto = new stdClass();
        $findOneDto->id = $request->input('id');
        return $this->zaikoRepository->findOne($findOneDto);
    }

    public function registZaiko(ZaikoRequest $request) : void {
        $registOneDto = new stdClass();
        $registOneDto->id = $request->input('id');
        $registOneDto->status = $request->input('status');
        $registOneDto->itemCode = $request->input('itemCode');
        $registOneDto->registUser = 1;
        $registOneDto->updateUser = 1;
        $registOneDto->enable = $request->input('enable');
        $registOneDto->createAt = date('Y-m-d H:i:s');
        $registOneDto->updateAt = date('Y-m-d H:i:s');

        $itemOneDto = new stdClass();
        $itemOneDto->id = $request->input('itemCode');
        $itemlist = $this->itemRepository->findAll($itemOneDto);
        if ($itemlist->count() == 0) {
            throw new Exception("itemCodeが存在しません。");
        }

        $this->zaikoRepository->registOne($registOneDto);
    }

    public function updateZaiko(ZaikoRequest $request) : void {
        $updateOneDto = new stdClass();
        $updateOneDto->id = $request->input('id');
        $updateOneDto->status = $request->input('status');
        $updateOneDto->itemCode = $request->input('itemCode');
        $updateOneDto->updateUser = 1;
        $updateOneDto->enable = $request->input('enable');
        $updateOneDto->updateAt = date('Y-m-d H:i:s');

        $itemOneDto = new stdClass();
        $itemOneDto->id = $request->input('itemCode');
        $itemlist = $this->itemRepository->findAll($itemOneDto);
        if ($itemlist->count() == 0) {
            throw new Exception("itemCodeが存在しません。");
        }

        $this->zaikoRepository->updateOne($updateOneDto);
    }

    public function deleteZaiko(ZaikoRequest $request) : void {
        $deleteOneDto = new stdClass();
        $deleteOneDto->id = $request->input('id');
        $this->zaikoRepository->deleteOne($deleteOneDto);
    }
}