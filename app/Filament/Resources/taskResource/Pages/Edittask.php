<?php

namespace App\Filament\Resources\taskResource\Pages;

use App\Filament\Resources\taskResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Edittask extends EditRecord
{
    protected static string $resource = taskResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
