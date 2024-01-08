<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\HomeController;

class HomeControllerTest extends TestCase
{
    public function testIndexReturnsView()
    {
        // Arrange
        $controller = new HomeController();

        // Act
        $response = $controller->index();

        // Assert
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('home', $response->name());
    }
}