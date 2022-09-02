<?php

namespace App\Tests;

use App\Service\Post\getPostService;
use PHPUnit\Framework\TestCase;

class validateGetPostTest extends TestCase
{
    public function testSuccess(): void
    {

        $postService = new getPostService();
        $result = $postService->getPost(1);

        $this->assertNotEmpty($result);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals(200, $result['statusCode']);

    }
}
