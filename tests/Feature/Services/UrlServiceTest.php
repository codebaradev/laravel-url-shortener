<?php

namespace Tests\Feature\Services;

use App\Models\Url;
use App\Models\User;
use App\Services\UrlService;
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
            'user_id' => $user->id,
            'name' => 'Test URL',
            'link' => 'https://example.com',
            'clicks' => 0,
        ];

        $url = $this->urlService->create($data);
        $this->assertEquals($data['user_id'], $url->user_id);
        $this->assertEquals($data['name'], $url->name);
        $this->assertEquals($data['link'], $url->link);
        $this->assertEquals($data['clicks'], $url->clicks);
    }

    public function testRead(): void
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->first();

        $data = [
            'user_id' => $user->id,
            'name' => 'Test URL',
            'link' => 'https://example.com',
            'clicks' => 0,
        ];

        $url = $this->urlService->create($data);
        $createdUrl = $this->urlService->read($url->id);

        $this->assertEquals($createdUrl->user_id, $url->user_id);
        $this->assertEquals($createdUrl->name, $url->name);
        $this->assertEquals($createdUrl->link, $url->link);
        $this->assertEquals($createdUrl->clicks, $url->clicks);
    }

    public function testUpdate(): void
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->first();

        $data = [
            'user_id' => $user->id,
            'name' => 'Test URL',
            'link' => 'https://example.com',
            'clicks' => 0,
        ];

        $url = $this->urlService->create($data);

        $data = [
            'user_id' => $user->id,
            'name' => 'Test URL Edited',
            'link' => 'https://example1.com',
            'clicks' => 1,
        ];

        $url = $this->urlService->update($data, $url->id);

        $this->assertEquals($data['user_id'], $url->user_id);
        $this->assertEquals($data['name'], $url->name);
        $this->assertEquals($data['link'], $url->link);
        $this->assertEquals($data['clicks'], $url->clicks);
    }

    public function testDelete(): void
    {
        $this->testCreate();

        $result = $this->urlService->delete(Url::query()->first()->id);

        $this->assertTrue($result);
        $this->assertNull(Url::query()->first());
    }
}
