<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Services\ZaikoService;
use Illuminate\Routing\Controller as BaseController;

class ZaikoController extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;

    private $zaikoService;

    public function __construct(ZaikoService $zaikoService)
    {
        $this->zaikoService = $zaikoService;
    }

    public function getList(ZaikoListRequest $request) {
        $validated = $request->validated();
        $zaikoList = $this->zaikoService->getZaikoList($request);
        return [
            'total' => '0', 
            'zaikoList' => $zaikoList
        ];
    }

    public function getDetail(ZaikoRequest $request) {
        $request->validated();
        $zaiko = $this->zaikoService->getZaiko($request);
        return $zaiko;
    }

    public function postDetail(ZaikoRequest $request) {
        $request->validated();
        $this->zaikoService->registZaiko($request);
    }

    public function patchDetail(ZaikoRequest $request) {
        $request->validated();
        $this->zaikoService->updateZaiko($request);
    }

    public function deleteDetail(ZaikoRequest $request) {
        $request->validated();
        $this->zaikoService->deleteZaiko($request);
    }
}