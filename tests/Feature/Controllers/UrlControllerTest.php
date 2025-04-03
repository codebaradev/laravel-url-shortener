<?php

namespace Tests\Feature\Controllers;

use App\Models\Url;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreate(): void
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->first();

        $response = $this->actingAs($user)->post('/app/urls', [
            "name" => "Google",
            "link" => "https://www.google.com/"
        ]);

        $url = Url::query()->first();

        $response->assertStatus(302);
        $this->assertEquals('Google', $url->name);
        $this->assertEquals('https://www.google.com/', $url->link);
    }
}
