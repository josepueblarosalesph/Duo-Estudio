<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_home_page_returns_the_duo_estudio_landing(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Soluciones');
        $response->assertSee('DUO Estudio');
    }
}
