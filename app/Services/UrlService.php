<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{
    public function create(array $data, int $userId): Url
    {
        $url = Url::query()->make($data);
        $url->user_id = $userId;
        $url->save();

        return $url;
    }

    public function read(int $id, int $userId): ?Url
    {
        return Url::query()->where("user_id", $userId)->findOrFail($id);
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
