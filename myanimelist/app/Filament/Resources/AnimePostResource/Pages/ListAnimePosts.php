<?php

namespace App\Filament\Resources\AnimePostResource\Pages;

use App\Filament\Resources\AnimePostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnimePosts extends ListRecords
{
    protected static string $resource = AnimePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
