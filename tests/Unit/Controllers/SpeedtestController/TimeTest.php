<?php

namespace Tests\Unit\Controllers\SpeedtestController;

use App\Http\Controllers\SpeedtestController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * SpeedtestController
     *
     * @var SpeedtestController
     */
    private $controller;

    public function setUp() : void
    {
        parent::setUp();

        $this->controller = new SpeedtestController();
    }

    public function testTime()
    {
        $resp = $this->controller->time(5)->original;

        $this->assertArrayHasKey('method', $resp);
        $this->assertArrayHasKey('data', $resp);
        $this->assertArrayHasKey('days', $resp);
    }

    public function testTimeInvalidInput()
    {
        $resp = $this->controller->time('test')->original;

        $this->assertArrayHasKey('method', $resp);
        $this->assertArrayHasKey('error', $resp);
    }
}
