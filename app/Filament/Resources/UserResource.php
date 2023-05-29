<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getModelLabel(): string
    {
        return __('filament.resources.user.labels.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.resources.user.labels.plural');
    }

    public static function getNavigationGroup(): string
    {
        return __('filament.navigation_groups.administration');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->label(__('labels.name')),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique()
                    ->label(__('labels.email')),
                TextInput::make('phone_number')
                    ->required()
                    ->label(__('labels.phone_number')),
                Select::make('roles')
                    ->label(__('labels.roles'))
                    ->searchable()
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload(),
                TextInput::make('password')
                    ->password()
                    ->confirmed()
                    ->label(__('labels.password'))
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->hint(__('filament.resources.user.password_hint')),
                TextInput::make('password_confirmation')
                    ->password()
                    ->label(__('labels.confirm_password')),
                Toggle::make('active')
                    ->label(__('labels.active'))
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.name'))
                    ->searchable()->sortable(),
                TextColumn::make('email')
                    ->label(__('labels.email'))
                    ->searchable()->sortable(),
                TagsColumn::make('roles')
                    ->label(__('labels.roles'))
                    ->getStateUsing(function ($record) {
                        return $record->roles->pluck('name')->toArray();
                    }),
                IconColumn::make('active')
                    ->label(__('labels.active'))
                    ->boolean()

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
}
