<?php

namespace Tests\Feature\Controllers;

use App\Models\Url;
use App\Models\User;
use Database\Seeders\UrlSeeder;
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

    public function testUpdate(): void
    {
        $this->seed([UserSeeder::class, UrlSeeder::class]);

        $user = User::query()->first();
        $url = Url::query()->first();

        $response = $this->actingAs($user)->put("/app/urls/$url->id", [
            "name" => "Laravel",
            "link" => "https://laravel.com/docs/11.x/validation#rule-unique",
            "short" => "laravel"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }

    public function testDelete(): void
    {
        $this->seed([UserSeeder::class, UrlSeeder::class]);

        $user = User::query()->first();
        $url = Url::query()->first();

        $response = $this->actingAs($user)->delete("/app/urls/$url->id");

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
        $this->assertCount(9, Url::query()->where('user_id', $user->id)->get()->all());
    }
}
