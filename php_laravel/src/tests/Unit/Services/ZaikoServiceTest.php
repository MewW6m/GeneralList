<?php

namespace Tests\Unit;

use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Services\ZaikoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ZaikoServiceTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected $zaikoService;

    public function setUp(): void
    {
        parent::setUp();
        $this->zaikoService = new ZaikoService();
    }

    public function testGetZaikoList()
    {
        $request = new ZaikoListRequest();
        $request->merge([
            'id' => 1,
            'status' => 'active',
            'itemCode' => 'item1',
            'itemName' => 'Item 1',
            'sort' => 'id',
            'order' => 'asc'
        ]);

        $result = $this->zaikoService->getZaikoList($request);
        $this->assertIsArray($result);
    }

    public function testGetZaiko()
    {
        $request = new ZaikoRequest();
        $request->merge(['id' => 1]);

        $result = $this->zaikoService->getZaiko($request);
        $this->assertNotNull($result);
    }

    public function testRegistZaiko()
    {
        $request = new ZaikoRequest();
        $request->merge([
            'id' => 1,
            'status' => 'active',
            'itemCode' => 'item1',
            'enable' => true
        ]);

        $this->zaikoService->registZaiko($request);

        // データベースに新しいレコードが追加されたことを確認
        $this->assertDatabaseHas('zaikos', ['id' => 1]);
    }

    public function testUpdateZaiko()
    {
        $request = new ZaikoRequest();
        $request->merge([
            'id' => 1,
            'status' => 'inactive',
            'itemCode' => 'item1',
            'enable' => false
        ]);

        $this->zaikoService->updateZaiko($request);

        // データベースのレコードが更新されたことを確認
        $this->assertDatabaseHas('zaikos', ['id' => 1, 'status' => 'inactive']);
    }

    public function testDeleteZaiko()
    {
        $request = new ZaikoRequest();
        $request->merge(['id' => 1]);

        $this->zaikoService->deleteZaiko($request);

        // データベースからレコードが削除されたことを確認
        $this->assertDatabaseMissing('zaikos', ['id' => 1]);
    }
}