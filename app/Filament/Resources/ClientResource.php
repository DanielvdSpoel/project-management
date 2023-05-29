<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $slug = 'clients';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    public static function getModelLabel(): string
    {
        return __('filament.resources.client.labels.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.resources.client.labels.plural');
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
                    ->autofocus()
                    ->required(),

                TextInput::make('phone_number')
                    ->label(__('labels.phone_number')),

                Fieldset::make(__('labels.address_details'))
                    ->schema([
                        TextInput::make('street')
                            ->label(__('labels.street')),

                        TextInput::make('house_number')
                            ->label(__('labels.house_number'))
                            ->integer(),

                        TextInput::make('postal_code')
                            ->label(__('labels.postal_code')),

                        TextInput::make('city')
                            ->label(__('labels.city')),
                    ])
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
                TextColumn::make('phone_number')
                    ->label(__('labels.phone_number'))
                    ->searchable()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

}
