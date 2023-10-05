<?php

namespace App\Providers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        TaskCollection::withoutWrapping();
        TaskResource::withoutWrapping();
        JsonResource::withoutWrapping();
    }
}
