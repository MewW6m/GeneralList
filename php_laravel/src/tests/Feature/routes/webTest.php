<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebTest extends TestCase
{
    public function testGetListRoute()
    {
        $response = $this->get('/api/zaiko/list');
        $response->assertStatus(200);
    }

    public function testGetDetailRoute()
    {
        $response = $this->get('/api/zaiko');
        $response->assertStatus(200);
    }

    public function testPostDetailRoute()
    {
        $response = $this->post('/api/zaiko');
        $response->assertStatus(200);
    }

    public function testPatchDetailRoute()
    {
        $response = $this->patch('/api/zaiko');
        $response->assertStatus(200);
    }

    public function testDeleteDetailRoute()
    {
        $response = $this->delete('/api/zaiko');
        $response->assertStatus(200);
    }
}