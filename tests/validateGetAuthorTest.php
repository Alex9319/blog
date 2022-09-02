<?php

namespace App\Tests;

use App\Service\Author\getDetailAuthorService;
use PHPUnit\Framework\TestCase;

class validateGetAuthorTest extends TestCase
{
    public function testSuccess(): void
    {

        $AuthorService = new getDetailAuthorService();
        $result = $AuthorService->getDetails(1);

        $this->assertNotEmpty($result);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals(200, $result['statusCode']);

    }
}

