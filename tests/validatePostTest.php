<?php

namespace App\Tests;

use App\Service\Validate\validateService;
use PHPUnit\Framework\TestCase;

class validatePostTest extends TestCase
{
    public function testSuccess(): void
    {

        $array = [
            "title" => "Lorem ipsum",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis vulputate quam, sed dictum nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ullamcorper auctor felis ac ultricies. Sed sit amet justo metus. Aliquam cursus consectetur erat id pretium. Proin tortor purus, feugiat nec ante sit amet, vestibulum hendrerit diam. Quisque consequat scelerisque nisi nec semper. Aliquam volutpat volutpat ligula a varius. Phasellus hendrerit et tellus a tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in nulla quis odio aliquet auctor. Aliquam feugiat mauris nec vulputate porttitor. Curabitur tempor, arcu et ullamcorper aliquam, sem diam vulputate erat, posuere tempor urna ligula eget tortor. Maecenas molestie risus sit amet euismod maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus.",
            "idAuthor" => 5
        ];

        $example = [
            'data'       => null,
            'error'      => null,
            'status'     => true,
            'statusCode' => 200
        ];

        $validateService = new validateService();
        $result = $validateService->validateSetPost(json_encode($array));

        $this->assertNotEmpty($result);
        $this->assertJsonStringEqualsJsonString(json_encode($example) ,json_encode($result));

    }
}
