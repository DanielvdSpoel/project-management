<?php

namespace App\Filament\Resources;

use App\Filament\RelationManagers\TasksRelationManager;
use App\Filament\Resources\projectResource\Pages;
use App\Models\project;
use App\Models\User;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $slug = 'projects';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function getModelLabel(): string
    {
        return __('filament.resources.project.labels.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.resources.project.labels.plural');
    }

    public static function getNavigationGroup(): string
    {
        return __('filament.navigation_groups.project_management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('labels.name'))
                    ->required(),

                Select::make('client_id')
                    ->label(__('labels.client'))
                    ->relationship('client', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('description')
                    ->label(__('labels.description')),

                Select::make('employees')
                    ->label(__('labels.employees'))
                    ->relationship('employees', 'name')
                    ->multiple()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('client.name')
                    ->label(__('labels.client'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')->words(25)
                    ->label(__('labels.description'))
                    ->placeholder(__('labels.no_description'))
                    ->searchable()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\Listprojects::route('/'),
            'create' => Pages\Createproject::route('/create'),
            'edit' => Pages\Editproject::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            TasksRelationManager::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
