<?php

namespace App\Filament\Admin\Resources\Agents;

use App\Filament\Admin\Resources\Agents\Pages\CreateAgent;
use App\Filament\Admin\Resources\Agents\Pages\EditAgent;
use App\Filament\Admin\Resources\Agents\Pages\ListAgents;
use App\Filament\Admin\Resources\Agents\Pages\ViewAgent;
use App\Filament\Admin\Resources\Agents\Schemas\AgentForm;
use App\Filament\Admin\Resources\Agents\Schemas\AgentInfolist;
use App\Filament\Admin\Resources\Agents\Tables\AgentsTable;
use App\Models\Agent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;

use function __;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;

    protected static bool $isGloballySearchable = true;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getGlobalSearchResultUrl($record): string
    {
        return self::getUrl('view', ['record' => $record]);
    }

    public static function getModelLabel(): string
    {
        return __('Agent');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Agents');
    }

    public static function getNavigationLabel(): string
    {
        return __('Agents');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Helpdesk');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Cache::rememberForever('agents_count', fn () => Agent::query()->count());
    }

    public static function form(Schema $schema): Schema
    {
        return AgentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AgentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgents::route('/'),
            'create' => CreateAgent::route('/create'),
            'view' => ViewAgent::route('/{record}'),
            'edit' => EditAgent::route('/{record}/edit'),
        ];
    }
}
