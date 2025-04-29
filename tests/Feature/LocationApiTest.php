<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Feature tests for the Locations API endpoints.
 */
class LocationApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_locations_with_valid_api_key()
    {
        // Seed the database
        $this->seed();

        $response = $this->withHeaders([
            'X-API-KEY' => env('API_KEY', '123456'),
        ])->getJson('/api/locations');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['code', 'name', 'image', 'creationDate']
        ]);
    }

    /** @test */
    public function it_returns_unauthorized_without_api_key()
    {
        $response = $this->getJson('/api/locations');

        $response->assertStatus(401);
        $response->assertJson([
            'error' => 'Unauthorized. Invalid API key.',
        ]);
    }
}
