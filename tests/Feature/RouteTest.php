<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRouteReturns200AndCorrectContent()
    {
        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);

        $response->assertSee('Danh sách dự án');
    }
}
