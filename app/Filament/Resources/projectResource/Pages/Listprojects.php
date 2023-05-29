<?php

namespace App\Filament\Resources\projectResource\Pages;

use App\Filament\Resources\projectResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listprojects extends ListRecords
{
    protected static string $resource = projectResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
