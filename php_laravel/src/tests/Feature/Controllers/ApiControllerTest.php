<?php

namespace Tests\Unit;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ZaikoListRequest;
use App\Http\Requests\ZaikoRequest;
use App\Services\ZaikoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected $apiController;

    public function setUp(): void
    {
        parent::setUp();
        $this->apiController = new ApiController(new ZaikoService());
    }

    public function testGetList()
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

        $result = $this->apiController->getList($request);
        $this->assertIsArray($result);
        $this->assertEquals('0', $result['status']);
    }

    public function testGetDetail()
    {
        $request = new ZaikoRequest();
        $request->merge(['id' => 1]);

        $result = $this->apiController->getDetail($request);
        $this->assertIsArray($result);
        $this->assertEquals('0', $result['status']);
    }

    public function testPostDetail()
    {
        $request = new ZaikoRequest();
        $request->merge([
            'id' => 1,
            'status' => 'active',
            'itemCode' => 'item1',
            'enable' => true
        ]);

        $result = $this->apiController->postDetail($request);
        $this->assertIsArray($result);
        $this->assertEquals('0', $result['status']);
    }

    public function testPatchDetail()
    {
        $request = new ZaikoRequest();
        $request->merge([
            'id' => 1,
            'status' => 'inactive',
            'itemCode' => 'item1',
            'enable' => false
        ]);

        $result = $this->apiController->patchDetail($request);
        $this->assertIsArray($result);
        $this->assertEquals('0', $result['status']);
    }

    public function testDeleteDetail()
    {
        $request = new ZaikoRequest();
        $request->merge(['id' => 1]);

        $result = $this->apiController->deleteDetail($request);
        $this->assertIsArray($result);
        $this->assertEquals('0', $result['status']);
    }
}