<?php

namespace Database\Seeders;

use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Url::query()->create([
                'user_id' => User::query()->first()->id,
                'name' => 'Google',
                'link' => "g{$i}",
                'clicks' => 0,
            ]);
        }
    }
}
