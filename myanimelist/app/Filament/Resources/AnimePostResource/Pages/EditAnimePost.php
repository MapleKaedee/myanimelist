<?php

namespace App\Filament\Resources\AnimePostResource\Pages;

use App\Filament\Resources\AnimePostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnimePost extends EditRecord
{
    protected static string $resource = AnimePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
