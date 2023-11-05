<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Services\ZaikoService;
use Illuminate\Routing\Controller as BaseController;

/**
 * ApiControllerクラス
 */
class ApiController extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;

    private ZaikoService $zaikoService;

    /**
     * ApiControllerクラスのコンストラクタ
     *
     * @param ZaikoService $zaikoService 在庫サービス
     */
    public function __construct(ZaikoService $zaikoService)
    {
        $this->zaikoService = $zaikoService;
    }

    /**
     * 在庫リストを取得します。
     *
     * @param ZaikoListRequest $request 在庫リストリクエスト
     * @return array 在庫リスト
     */
    public function getList(ZaikoListRequest $request) : array {
        $zaikoList = $this->zaikoService->getZaikoList($request);
        return [
            'status' => '0', 
            'result' => $zaikoList
        ];
    }

    /**
     * 在庫詳細を取得します。
     *
     * @param ZaikoRequest $request 在庫リクエスト
     * @return array 在庫詳細
     */
    public function getDetail(ZaikoRequest $request) : array {
        $zaiko = $this->zaikoService->getZaiko($request);
        return [
            'status' => '0', 
            'result' => $zaiko
        ];
    }
    /**
     * 在庫を登録します。
     *
     * @param ZaikoRequest $request 在庫リクエスト
     * @return array 登録結果
     */

    public function postDetail(ZaikoRequest $request) : array {
        $this->zaikoService->registZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }

    /**
     * 在庫を更新します。
     *
     * @param ZaikoRequest $request 在庫リクエスト
     * @return array 更新結果
     */
    public function patchDetail(ZaikoRequest $request) : array {
        $this->zaikoService->updateZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }

    /**
     * 在庫を削除します。
     *
     * @param ZaikoRequest $request 在庫リクエスト
     * @return array 削除結果
     */
    public function deleteDetail(ZaikoRequest $request) : array {
        $this->zaikoService->deleteZaiko($request);
        return [
            'status' => '0', 
            'result' => ""
        ];
    }
}