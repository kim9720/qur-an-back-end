<?php

namespace App\Filament\Resources\QuranAudioResource\Pages;

use App\Filament\Resources\QuranAudioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuranAudio extends ListRecords
{
    protected static string $resource = QuranAudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
