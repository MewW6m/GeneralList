<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Services\ZaikoService;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;

    private ZaikoService $zaikoService;

    public function __construct(ZaikoService $zaikoService)
    {
        $this->zaikoService = $zaikoService;
    }

    public function getList(ZaikoListRequest $request) : array {
        $zaikoList = $this->zaikoService->getZaikoList($request);
        return [
            'status' => '0', 
            'result' => $zaikoList
        ];
    }

    public function getDetail(ZaikoRequest $request) : array {
        $zaiko = $this->zaikoService->getZaiko($request);
        return [
            'status' => '0', 
            'result' => $zaiko
        ];
    }

    public function postDetail(ZaikoRequest $request) : array {
        $this->zaikoService->registZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }

    public function patchDetail(ZaikoRequest $request) : array {
        $this->zaikoService->updateZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }

    public function deleteDetail(ZaikoRequest $request) : array {
        $this->zaikoService->deleteZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }
}