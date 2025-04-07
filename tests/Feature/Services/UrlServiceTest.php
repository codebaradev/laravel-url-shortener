<?php

namespace Tests\Feature\Services;

use App\Models\Url;
use App\Models\User;
use App\Services\UrlService;
use Database\Seeders\UrlSeeder;
use Database\Seeders\UrlSeederSecond;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class UrlServiceTest extends TestCase
{
    private UrlService $urlService;
    /**
     * A basic feature test example.
     */

    public function setUp(): void
    {
        parent::setUp();
        $this->urlService = App::make(UrlService::class);
    }

    public function testCreate(): void
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->first();

        $data = [
            'name' => 'Test URL',
            'link' => 'https://example.com',
            'short' => 'a',
            'clicks' => 0,
        ];

        $url = $this->urlService->create($data, $user->id);
        $this->assertEquals($data['name'], $url->name);
        $this->assertEquals($data['link'], $url->link);
        $this->assertEquals($data['clicks'], $url->clicks);
    }

    public function testGet(): void
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->first();

        $data = [
            'name' => 'Test URL',
            'link' => 'https://example.com',
            'short' => 'a',
            'clicks' => 0,
        ];

        $url = $this->urlService->create($data, $user->id);
        $createdUrl = $this->urlService->get($url->id, $user->id);

        $this->assertEquals($createdUrl->user_id, $url->user_id);
        $this->assertEquals($createdUrl->name, $url->name);
        $this->assertEquals($createdUrl->link, $url->link);
        $this->assertEquals($createdUrl->clicks, $url->clicks);
    }

    public function testGetAll(): void
    {
        $this->seed([UserSeeder::class, UrlSeeder::class]);

        $user = User::query()->first();
        $urls = $this->urlService->getAll($user->id, null);

        foreach ($urls as $url) {
            $this->assertEquals($user->id, $url->user_id);
        }
    }

    public function testGetAllWithSearch(): void
    {
        $this->seed([UserSeeder::class, UrlSeeder::class, UrlSeederSecond::class]);

        $user = User::query()->first();
        $urls = $this->urlService->getAll($user->id, 'facebook');

        foreach ($urls as $url) {
            $this->assertEquals($user->id, $url->user_id);
            $this->assertEquals("Facebook", $url->name);
        }

        $this->assertCount(10, $urls);

    }

    public function testUpdate(): void
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->first();

        $data = [
            'name' => 'Test URL',
            'link' => 'https://example.com',
            'clicks' => 0,
            'short' => 'a',
        ];

        $url = $this->urlService->create($data, $user->id);

        $data = [
            'name' => 'Test URL Edited',
            'link' => 'https://example1.com',
            'short' => 'c',
            'clicks' => 1,
        ];

        $url = $this->urlService->update($data, $url->id, $user->id);

        $this->assertEquals($data['name'], $url->name);
        $this->assertEquals($data['link'], $url->link);
        $this->assertEquals($data['clicks'], $url->clicks);
    }

    public function testDelete(): void
    {
        $this->testCreate();

        $user = User::query()->first();

        $result = $this->urlService->delete(Url::query()->first()->id, $user->id);

        $this->assertTrue($result);
        $this->assertNull(Url::query()->first());
    }
}
