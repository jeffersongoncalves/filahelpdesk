<?php

namespace App\Filament\Admin\Resources\Priorities;

use App\Filament\Admin\Resources\Priorities\Pages\ManagePriorities;
use App\Models\Priority;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;

class PriorityResource extends Resource
{
    protected static ?string $model = Priority::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowTopRightOnSquare;

    protected static bool $isGloballySearchable = true;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getGlobalSearchResultUrl($record): string
    {
        return self::getUrl('index', ['tableAction' => 'view', 'tableActionRecord' => $record]);
    }

    public static function getModelLabel(): string
    {
        return __('Priority');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Priorities');
    }

    public static function getNavigationLabel(): string
    {
        return __('Priorities');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Helpdesk');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string)Cache::rememberForever('priorities_count', fn() => Priority::query()->count());
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('name')
                    ->required(),
                ColorPicker::make('color')
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextEntry::make('name'),
                ColorEntry::make('color'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ColorColumn::make('color'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePriorities::route('/'),
        ];
    }
}
