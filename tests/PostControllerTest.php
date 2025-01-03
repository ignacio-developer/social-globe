<?php
require_once __DIR__ . '/../src/controllers/PostController.php';
require_once __DIR__ . '/../src/models/Post.php';

use PHPUnit\Framework\TestCase;

class PostControllerTest extends TestCase
{
    public function testCreatePost()
    {
        // Arrange
        $userId = 1;
        $content = "Test content";
        $expectedResult = true;

        $postMock = $this->createMock(Post::class);
        $postMock->expects($this->once())
                 ->method('createPost')
                 ->with($userId, $content)
                 ->willReturn($expectedResult);

        echo var_export($postMock, true);

        $controller = new PostController($postMock);

        // Act
        $result = $controller->createPost($userId, $content);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
