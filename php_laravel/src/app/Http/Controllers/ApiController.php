<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Services\ZaikoService;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;

    private $zaikoService;

    public function __construct(ZaikoService $zaikoService)
    {
        $this->zaikoService = $zaikoService;
    }

    public function getList(ZaikoListRequest $request) {
        $zaikoList = $this->zaikoService->getZaikoList($request);
        return [
            'total' => '0', 
            'zaikoList' => $zaikoList
        ];
    }

    public function getDetail(ZaikoRequest $request) {
        $zaiko = $this->zaikoService->getZaiko($request);
        return [
            'status' => '0', 
            'result' => $zaiko
        ];
    }

    public function postDetail(ZaikoRequest $request) {
        $this->zaikoService->registZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }

    public function patchDetail(ZaikoRequest $request) {
        $this->zaikoService->updateZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }

    public function deleteDetail(ZaikoRequest $request) {
        $this->zaikoService->deleteZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }
}