<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{
    public function create(array $data): Url
    {
        return Url::create($data);
    }

    public function read(int $id): ?Url
    {
        return Url::findOrFail($id);
    }

    public function update(array $data, int $id, ): Url
    {
        $url = Url::findOrFail($id);
        $url->update($data);
        return $url;
    }

    public function delete(int $id): bool
    {
        $url = Url::findOrFail($id);
        $url->delete();
        return true;
    }
}
