<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Database\Seeders\UrlSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testDashboard(): void
    {
        $this->seed([UserSeeder::class, UrlSeeder::class]);

        $user = User::query()->first();
        $urls = $user->urls;

        $respoonse = $this->actingAs($user)->get('/app/dashboard');

        foreach ($urls as $url) {
            $respoonse->assertSeeText($url->name);
            $respoonse->assertSeeText($url->link);
            $respoonse->assertSeeText($url->short);
            $respoonse->assertSeeText($url->clicks);
        }
    }
}
