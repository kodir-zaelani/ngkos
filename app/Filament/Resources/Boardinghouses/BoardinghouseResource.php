<?php

namespace App\Filament\Resources\Boardinghouses;

use App\Filament\Resources\Boardinghouses\Pages\CreateBoardinghouse;
use App\Filament\Resources\Boardinghouses\Pages\EditBoardinghouse;
use App\Filament\Resources\Boardinghouses\Pages\ListBoardinghouses;
use App\Filament\Resources\Boardinghouses\Pages\ViewBoardinghouse;
use App\Filament\Resources\Boardinghouses\Schemas\BoardinghouseForm;
use App\Filament\Resources\Boardinghouses\Schemas\BoardinghouseInfolist;
use App\Filament\Resources\Boardinghouses\Tables\BoardinghousesTable;
use App\Models\Boardinghouse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BoardinghouseResource extends Resource
{
    protected static ?string $model = Boardinghouse::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::HomeModern;

    protected static ?string $recordTitleAttribute = 'Boarding House';

    public static function form(Schema $schema): Schema
    {
        return BoardinghouseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BoardinghouseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BoardinghousesTable::configure($table);
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
            'index' => ListBoardinghouses::route('/'),
            'create' => CreateBoardinghouse::route('/create'),
            'view' => ViewBoardinghouse::route('/{record}'),
            'edit' => EditBoardinghouse::route('/{record}/edit'),
        ];
    }
}
