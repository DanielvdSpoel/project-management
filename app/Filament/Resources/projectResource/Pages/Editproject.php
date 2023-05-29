<?php

namespace App\Filament\Resources\projectResource\Pages;

use App\Filament\Resources\projectResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Editproject extends EditRecord
{
    protected static string $resource = projectResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
