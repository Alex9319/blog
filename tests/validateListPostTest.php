<?php

namespace App\Tests;

use App\Service\Post\listService;
use PHPUnit\Framework\TestCase;

class validateListPostTest extends TestCase
{
    public function testSuccess(): void
    {

        $listService = new listService();
        $result = $listService->listPost();

        $this->assertNotEmpty($result);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals(200, $result['statusCode']);

    }
}
