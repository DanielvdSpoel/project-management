<?php

namespace App\Filament\RelationManagers;

use App\Filament\Resources\TaskResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('filament.resources.task.labels.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.resources.task.labels.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(TaskResource::simpleCreateForm());
    }

    public static function table(Table $table): Table
    {
        return TaskResource::table($table)
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
