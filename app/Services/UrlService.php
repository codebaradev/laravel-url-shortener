<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{
    public function create(array $data, ?int $userId): Url
    {
        $url = Url::query()->make($data);
        $url->user_id = $userId;

        while (true) {
            $short = substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz0123456789-', 6)), 0, 6);
            if (!Url::query()->where('short', $short)->exists()) {
                $url->short = $short;
                break;
            }
        }

        $url->save();

        return $url;
    }

    public function get(int $id, int $userId): ?Url
    {
        return Url::query()->where("user_id", $userId)->findOrFail($id);
    }

    public function getByShort(string $short): ?Url
    {
        $url = Url::query()->where("short", $short)->first();

        if (!$url) {
            return null;
        } else {
            $url->clicks += 1;
            $url->save();

            return $url;
        }
    }

    public function getAll(int $userId, ?string $search): array
    {
        $urls = Url::query()->where("user_id", $userId);
        if ($search) {
            $urls->where(function ($query) use ($search) {
                $query->where("name", "LIKE", "%$search%")
                    ->orWhere("link", "LIKE", "%$search%")
                    ->orWhere("short", "LIKE", "%$search%");
            });
        }

        $urls->orderBy("created_at", "desc");

        return $urls->get()->all();
    }

    public function update(array $data, int $id, int $userId): ?Url
    {
        $url = Url::query()->where("user_id", $userId)->findOrFail($id);

        if ($url) {
            $url->update($data);
        }

        return $url;
    }

    public function delete(int $id, int $userId): bool
    {
        $url = Url::query()->where("user_id", $userId)->findOrFail($id);

        if ($url) {
            $url->delete();
            return true;
        } else {
            return false;
        }
    }
}
