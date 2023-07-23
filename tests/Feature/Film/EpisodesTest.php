<?php

namespace Tests\Feature\Film;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\FilmTestCase;

class EpisodesTest extends FilmTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_episodes(): void
    {
        $this->createAuthUser();
        $episodes = $this->createEpisodes(rand(5,9));
        $response = $this->getJson(route('episodes'))->assertOk();  // ->assertStatus(200)
        $this->assertSameSize($episodes, $response->decodeResponseJson()['data']);
        $this->assertEquals(count($episodes), count($response->decodeResponseJson()['data']));
    }
}
