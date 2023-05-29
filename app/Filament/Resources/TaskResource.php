<?php

namespace App\Filament\Resources;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Filament\Resources\taskResource\Pages;
use App\Models\Task;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $slug = 'tasks';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function getModelLabel(): string
    {
        return __('filament.resources.task.labels.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.resources.task.labels.plural');
    }

    public static function getNavigationGroup(): string
    {
        return __('filament.navigation_groups.project_management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...self::simpleCreateForm()
            ]);
    }

    public static function simpleCreateForm(): array
    {
        return [
            TextInput::make('name')
                ->label(__('labels.name'))
                ->required(),

            TextInput::make('description')
                ->label(__('labels.description')),

            Select::make('priority')
                ->label(__('labels.priority'))
                ->options(TaskPriority::array())
                ->default(TaskPriority::NORMAL)
                ->required(),
            Select::make('status')
                ->label(__('labels.status'))
                ->options(TaskStatus::array())
                ->default(TaskStatus::OPEN)
                ->required(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label(__('labels.description'))
                    ->searchable(),

                BadgeColumn::make('status')
                    ->label(__('labels.status'))
                    ->enum(TaskStatus::array()),

                BadgeColumn::make('priority')
                    ->label(__('labels.priority'))
                    ->enum(TaskPriority::array())

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\Listtasks::route('/'),
            'create' => Pages\Createtask::route('/create'),
            'edit' => Pages\Edittask::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
