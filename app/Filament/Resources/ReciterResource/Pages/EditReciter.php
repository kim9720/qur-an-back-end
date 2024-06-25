<?php

namespace App\Filament\Resources\ReciterResource\Pages;

use App\Filament\Resources\ReciterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReciter extends EditRecord
{
    protected static string $resource = ReciterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
