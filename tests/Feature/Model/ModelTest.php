<?php

namespace Tests\Feature\Model;

use App\Models\Url;
use App\Models\User;
use Database\Seeders\UrlSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testModles(): void
    {
        $this->seed([UserSeeder::class, UrlSeeder::class]);

        $user = User::query()->first( );
        $urls = Url::query()->get()->all();
        $userUrls = $user->urls;

        for ($i = 0; $i < 10; $i++) {
            $this->assertEquals($urls[$i]->link, $userUrls[$i]->link);
        }
    }
}
