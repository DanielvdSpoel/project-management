<?php

namespace App\Filament\Resources\taskResource\Pages;

use App\Filament\Resources\taskResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listtasks extends ListRecords
{
    protected static string $resource = taskResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
