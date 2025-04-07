<?php

namespace Database\Seeders;

use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlSeederSecond extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Url::query()->create([
                'user_id' => User::query()->first()->id,
                'name' => 'Facebook',
                'link' => "https://www.facebook.com/",
                'short' => "f{$i}",
                'clicks' => 0,
            ]);
        }
    }
}
