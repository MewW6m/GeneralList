<?php

namespace Tests\Unit;

use App\Repositories\ZaikoRepository;
use stdClass;
use Tests\TestCase;

class ZaikoRepositoryTest extends TestCase
{
    public function testFindAll()
    {
        $repository = new ZaikoRepository();

        $dto = new stdClass();
        $dto->sort = 'id';
        $dto->order = 'asc';

        $result = $repository->findAll($dto);

        $this->assertNotEmpty($result);
    }

    public function testFindOne()
    {
        $repository = new ZaikoRepository();

        $dto = new stdClass();
        $dto->id = 1; // 仮のID

        $result = $repository->findOne($dto);

        $this->assertNotNull($result);
    }
}